<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servis Diambil V.1</title>
    <style>

        .dotted {
            border: 1px dotted #292828; border-style: none none dotted; color: #fff; background-color: #fff;
        }
    </style>
</head>
<body>

<p style="text-align: center; font-size: 25px;"><b>{{$company->name}}</b></p>
<p style="text-align: center; font-size: 20px;">{{$company->telephone}}</p>
<p style="text-align: center; font-size: 20px;">{{$company->address}}</p>

<br><br>
<table style="width: 100%; font-size: 20px;">
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{$service->updated_at}}</td>
    </tr>
    <tr>
        <td>No. Nota</td>
        <td>:</td>
        <td>{{$service->transaction_code}}</td>
    </tr>
    <tr>
        <td>Tgl. Servis</td>
        <td>:</td>
        <td>{{$service->created_at}}</td>
    </tr>
    <tr>
        <td>Pelanggan</td>
        <td>:</td>
        <td>{{$service->_customer->name}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{$service->_customer->address}}</td>
    </tr>
    <tr>
        <td>Telephone</td>
        <td>:</td>
        <td>{{$service->_customer->telephone}}</td>
    </tr>
</table>
<hr class='dotted' />

<table style="width: 100%; font-size: 20px;">
    <tr>
        <td>Unit</td>
        <td>:</td>
        <td>{{$service->unit}}</td>
    </tr>
    <tr>
        <td>No. Seri</td>
        <td>:</td>
        <td>{{$service->serial_number}}</td>
    </tr>
    <tr>
        <td>Keluhan</td>
        <td>:</td>
        <td>{{$service->complient}}</td>
    </tr>
    <tr>
        <td>Kelengkapan</td>
        <td>:</td>
        <td>{{$service->completenes}}</td>
    </tr>
</table>

<hr class='dotted' />
@foreach ($service_detail as $item)
@if ($item->repaire_id == null)
<p style="font-size: 20px;">{{$item->qty}} X {{$item->_product->name}}</p>
@endif
@endforeach
@foreach ($service_detail as $item)
@if ($item->sparepart_id == null)
<p style="font-size: 20px;">1 X {{$item->_repaire->name}}</p>
@endif
@endforeach

    <table align="right" style="font-size: 20px;">
        <tr>
            <td>Diskon</td>
            <td>:</td>
            <td>Rp. {{number_format($service->discount)}}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>:</td>
            <td>Rp. {{number_format($service->total)}}</td>
        </tr>
        <tr>
            <td>Bayar</td>
            <td>:</td>
            <td>Rp. {{number_format($service->payment)}}</td>
        </tr>
        <tr>
            <td>@if ($service->payment_method == 'cash') Kembali @else Hutang @endif</td>
            <td>:</td>
            <td>Rp. {{number_format($service->cashback)}}</td>
        </tr>
    </table>
<hr class='dotted' />
<table style="font-size: 20px;">
    <tr>
        <td>Operator</td>
        <td>:</td>
        <td>{{$service->_user->name}}</td>
    </tr>
    <tr>
        <td>Teknisi</td>
        <td>:</td>
        <td>@if ($service->technician)
            {{$service->_teknisi->name}}
            @else
            -
            @endif
        </td>
    </tr>
</table>

<p style="text-align: center; font-size:20px;">{{$footer->value}}</p>

</body>
</html>
