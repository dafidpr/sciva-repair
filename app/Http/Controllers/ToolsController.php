<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Receivable;
use App\Models\Sale;
use App\Models\Transaction_service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'product' => Product::all()
        ];

        return view('tools.generatebarcode', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak(Request $request)
    {
        //
        $data = [
            'barcode' => $request->barcode,
            'name' => $request->name_product,
            'id' => $request->id_product,
            'jumlah' => $request->jumlah,
        ];

        // return view('cetak.barcode', $data);
        $pdf = PDF::loadView('cetak.barcode', $data)->setPaper('letter');
        return $pdf->stream('PDF-Pembelian');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateBarcode(Request $request)
    {
        //
        Product::where('id', $request->id)->update([
            'barcode' => $request->barcode
        ]);

        return redirect()->back()->with('berhasil', 'Barcode telah berhasil anda update!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generate($id)
    {
        //
        $aaa = \DNS1D::getBarcodeHTML($id, 'EAN13');;

        return json_encode($aaa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteServisRange(Request $request)
    {
        //
        Transaction_service::where('status', 'take')->whereBetween('service_date', [$request->from, $request->to])->delete();

        return redirect()->back()->with('berhasil', 'Data telah dihapus sesuai tanggal yang anda tentukan!!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSale(Request $request)
    {
        //
        Sale::whereBetween('date', [$request->from, $request->to])->delete();

        return redirect()->back()->with('berhasil', 'Data penjualan telah dihapus sesuai range tanggal yang anda tentukan!!');
    }


    public function deletePurchase(Request $request)
    {
        //
        Purchase::whereBetween('created_at', [$request->from, $request->to])->delete();

        return redirect()->back()->with('berhasil', 'Data penjualan telah dihapus sesuai range tanggal yang anda tentukan!!');
    }

    public function deleteDebt(Request $request)
    {
        //
        Debt::where('status', 'paid_off')->whereBetween('debt_date', [$request->from, $request->to])->delete();

        return redirect()->back()->with('berhasil', 'Data penjualan telah dihapus sesuai range tanggal yang anda tentukan!!');
    }
    public function deleteReceivable(Request $request)
    {
        //
        Receivable::where('status', 'paid off')->whereBetween('created_at', [$request->from, $request->to])->delete();

        return redirect()->back()->with('berhasil', 'Data penjualan telah dihapus sesuai range tanggal yang anda tentukan!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function backupDatabase()
    {
        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';


        $queryTables = DB::select(DB::raw('SHOW TABLES'));
        foreach ($queryTables as $table) {
            foreach ($table as $tName) {
                $tables[] = $tName;
            }
        }
        // $tables  = array("users","products","categories"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }

        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }
}
