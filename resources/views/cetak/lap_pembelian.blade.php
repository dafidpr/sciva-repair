<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pembelian PDF</title>
</head>
<body>
    <table style="width: 100%;">
        <tr>
            <td width="10%"><img src="{{public_path('tmp/asset/images/'. $company->logo)}}" width="90px" alt=""></td>
            <td>
                <p><b>{{$company->name}}</b></p>
                <p>{{$company->address}}</p>
                <p>Phone : {{$company->telephone}} | Email : {{$company->email}}</p>
            </td>
        </tr>
    </table><hr style="border: 0; border-top: 4px double #8c8c8c;">
    <br>
    <h2 style="text-align: center;">LAPORAN PEMBELIAN</h2>
    <h3 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h3>
    <br>
    @foreach ($purchase as $item)

    <table width="100%">
        <tr>
            <td>
                <table>
                    <tr>
                        <td>INVOICE</td>
                        <td>:</td>
                        <td>{{$item->invoice}}</td>
                    </tr>
                    <tr>
                        <td>WAKTU</td>
                        <td>:</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td>KASIR</td>
                        <td>:</td>
                        <td>{{$item->_user->name}}</td>
                    </tr>
                    <tr>
                        <td>SUPPLIER</td>
                        <td>:</td>
                        <td>{{$item->_supplier->name}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table><br>
    <?php $detail = \App\Models\Purchase_detail::where('purchase_id', $item->id)->get(); ?>
    <table width="100%" border="2" style="border-collapse: collapse;">
        <tr>
            <th>Barcode</th>
            <th>Item</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Qty</th>
            <th>subtotal</th>
        </tr>
        @foreach ($detail as $dt)

        <tr>
            <td>{{$dt->_product->barcode}}</td>
            <td>{{$dt->_product->name}}</td>
            <td>Rp. {{number_format($dt->selling_price)}}</td>
            <td>Rp. {{number_format($dt->purchase_price)}}</td>
            <td>{{$dt->quantity}}</td>
            <td>Rp. {{number_format($dt->sub_total)}}</td>
        </tr>
        @endforeach
    </table>
    <table align="right" border="2" style="border-collapse: collapse; margin-top: 3px;">
        <tr>
            <td>Diskon</td>
            <td>Rp. {{number_format($item->discount)}}</td>
        </tr>
        <tr>
            <td>Grand Total</td>
            <td>Rp. {{number_format($item->total)}}</td>
        </tr>
    </table>
    <br>
    @endforeach


    <script>
        window.print()
        </script>
</body>
</html>
