<!DOCTYPE html>
<html>
<head>
    <title>POS (Point Of Sales) Version 1.0.0</title>
     <style>

        .dotted {
            border: 1px dotted #292828; border-style: none none dotted; color: #fff; background-color: #fff;
        }
    </style>
</head>
<body>
<div id="wrapper">
<p style="text-align: center; font-size: 25px;"><b>{{$company->name}}</b></p>
<p style="text-align: center; font-size: 20px;">{{$company->telephone}}</p>
<p style="text-align: center; font-size: 20px;">{{$company->address}}</p>
<br><br>
<table style="font-size: 20px; width: 40%;">
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{$sale->created_at}}</td>
    </tr>
    <tr>
        <td>No. Nota</td>
        <td>:</td>
        <td>{{$sale->invoice}}</td>
    </tr>
    <tr>
        <td>Pelanggan</td>
        <td>:</td>
        <td>{{$sale->_customer->name}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{$sale->_customer->address}}</td>
    </tr>
    <tr>
        <td>Telephone</td>
        <td>:</td>
        <td>{{$sale->_customer->telephone}}</td>
    </tr>
</table>
<hr class='dotted' />
@foreach ($sale_detail as $item)
<div style="font-size: 20px;">
    <label for="">{{$item->_product->name}}</label>
    <table style="100%">
        <tr>
            <td>{{$item->quantity}}</td>
            <td>{{$item->total}}</td>
            <td>{{$item->sub_total}}</td>
        </tr>
    </table>

</div>

@endforeach

    <table align="right" style="font-size: 20px;">
        <tr>
            <td>Diskon</td>
            <td>:</td>
            <td>{{$sale->discount}}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>:</td>
            <td>{{$sale->total}}</td>
        </tr>
        <tr>
            <td>Bayar</td>
            <td>:</td>
            <td>{{$sale->payment}}</td>
        </tr>
        <tr>
            <td>Kembali</td>
            <td>:</td>
            <td>{{$sale->cashback}}</td>
        </tr>
    </table>
<hr class='dotted' />
<table style="font-size: 20px;">
    <tr>
        <td>Operator</td>
        <td>:</td>
        <td>{{$sale->_user->name}}</td>
    </tr>
</table>

<p style="text-align: center; font-size: 20px;">{{$footer->value}}</p>
</body>
</html>
