<!DOCTYPE html>
<html>
<head>
    <title>POS (Point Of Sales) Version 1.0.0</title>
     <style>

        .dotted {
            border: 1px dotted #292828; border-style: none none dotted; color: #fff; background-color: #fff;
        }

        .foot_div p{
            line-height: 10px;
        }
    </style>
</head>
<body style="width: 76mm;">
<div id="wrapper">
<p style="text-align: center; font-size: 20px; line-height: 0.3em;"><b>{{strtoupper($company->name)}}</b></p>
<p style="text-align: center; font-size: 18px; line-height: 0.3em;">{{strtoupper($company->telephone)}}</p>
<p style="text-align: center; font-size: 15px; line-height: 0.3em;">{{strtoupper($company->address)}}</p>
<br>
<table style="font-size: 15px; width: 100%;">
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
        <td>{{ucfirst($sale->_customer->name)}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ucfirst($sale->_customer->address)}}</td>
    </tr>
    <tr>
        <td>Telephone</td>
        <td>:</td>
        <td>{{$sale->_customer->telephone}}</td>
    </tr>
</table>
<hr class='dotted' />
@foreach ($sale_detail as $item)
<div style="font-size: 15px;">
    <label for="">{{$item->_product->name}}</label>
    <table style="width: 80%;">
        <tr>
            <td style="width: 20%;">{{$item->quantity}}  X  </td>
            <td style="width: 30%;">Rp. {{number_format($item->total)}}</td>
            <td style="width: 30%;">Rp. {{number_format($item->sub_total)}}</td>
        </tr>
    </table>

</div>

@endforeach

    <table align="right" style="font-size: 15px;">
        <tr>
            <td>Diskon</td>
            <td>:</td>
            <td>Rp. {{number_format($sale->discount)}}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>:</td>
            <td>Rp. {{number_format($sale->total)}}</td>
        </tr>
        <tr>
            <td>Bayar</td>
            <td>:</td>
            <td>Rp. {{number_format($sale->payment)}}</td>
        </tr>
        <tr>
            <td>@if ($sale->method == 'cash') Kembali @else Hutang @endif</td>
            <td>:</td>
            <td>Rp. {{number_format($sale->cashback)}}</td>
        </tr>
    </table>
    <br><br><br><br><br>
<hr class='dotted' />
<table style="font-size: 15px;">
    <tr>
        <td>Operator</td>
        <td>:</td>
        <td>{{ucfirst($sale->_user->name)}}</td>
    </tr>
</table>

<center style=""><div class="foot_div" style="text-align: center; font-size: 15px;">{!!$footer->value!!}</div></center>

<script>
    window.print()
    </script>
</body>
</html>
