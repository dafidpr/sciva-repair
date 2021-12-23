<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Purchase;
use App\Models\Receivable;
use App\Models\Sale;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSale()
    {
        //
        $data = [
            'sale' => Sale::onlyTrashed()->get()
        ];
        return view('restore.penjualan', $data);
    }
    public function indexPurchase()
    {
        //
        $data = [
            'purchase' => Purchase::onlyTrashed()->get()
        ];
        return view('restore.pembelian', $data);
    }
    public function indexDebt()
    {
        //
        $data = [
            'debt' => Debt::onlyTrashed()->get()
        ];
        return view('restore.hutang', $data);
    }
    public function indexReceivable()
    {
        //
        $data = [
            'receivable' => Receivable::onlyTrashed()->get()
        ];
        return view('restore.piutang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forceDeleteSale($id = null)
    {
        //
        if ($id != null) {

            Sale::onlyTrashed()->where('id', $id)->forceDelete();
        } else {
            Sale::onlyTrashed()->forceDelete();
        }

        return redirect()->back();
    }
    public function forceDeletePurchase($id = null)
    {
        //
        if ($id != null) {

            Purchase::onlyTrashed()->where('id', $id)->forceDelete();
        } else {
            Purchase::onlyTrashed()->forceDelete();
        }

        return redirect()->back();
    }
    public function forceDeleteDebt($id = null)
    {
        //
        if ($id != null) {

            Debt::onlyTrashed()->where('id', $id)->forceDelete();
        } else {
            Debt::onlyTrashed()->forceDelete();
        }

        return redirect()->back();
    }
    public function forceDeleteReceivable($id = null)
    {
        //
        if ($id != null) {

            Receivable::onlyTrashed()->where('id', $id)->forceDelete();
        } else {
            Receivable::onlyTrashed()->forceDelete();
        }

        return redirect()->back();
    }






    public function forceRestoreSale($id = null)
    {
        //
        if ($id != null) {

            Sale::onlyTrashed()->where('id', $id)->restore();
        } else {
            Sale::onlyTrashed()->restore();
        }

        return redirect()->back();
    }
    public function forceRestorePurchase($id = null)
    {
        //
        if ($id != null) {

            Purchase::onlyTrashed()->where('id', $id)->restore();
        } else {
            Purchase::onlyTrashed()->restore();
        }

        return redirect()->back();
    }
    public function forceRestoreDebt($id = null)
    {
        //
        if ($id != null) {

            Debt::onlyTrashed()->where('id', $id)->restore();
        } else {
            Debt::onlyTrashed()->restore();
        }

        return redirect()->back();
    }
    public function forceRestoreReceivable($id = null)
    {
        //
        if ($id != null) {

            Receivable::onlyTrashed()->where('id', $id)->restore();
        } else {
            Receivable::onlyTrashed()->restore();
        }

        return redirect()->back();
    }
}
