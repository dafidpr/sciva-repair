<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Servis Masuk V.1</title>
    <style>

        .dotted {
            border: 1px dotted #292828; border-style: none none dotted; color: #fff; background-color: #fff;
        }
    </style>
</head>
<body style="width: 76mm;">

<p style="text-align: center; font-size: 20px;"><b>{{$company->name}}</b></p>
<p style="text-align: center; font-size: 18px;">{{$company->telephone}}</p>
<p style="text-align: center; font-size: 15px;">{{$company->address}}</p>

<br>
<table style="width: 100%; font-size: 15px;">
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
        <td>{{ucfirst($service->_customer->name)}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ucfirst($service->_customer->address)}}</td>
    </tr>
    <tr>
        <td>Telephone</td>
        <td>:</td>
        <td>{{$service->_customer->telephone}}</td>
    </tr>
</table>
<hr class='dotted' />

<table style="width: 100%; font-size: 15px;">
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
<table style="font-size: 15px;">
    <tr>
        <td>Operator</td>
        <td>:</td>
        <td>{{ucfirst($service->_user->name)}}</td>
    </tr>
</table>

<center><p style="text-align: center; font-size:15px;">{!!$footer->value!!}</p></center>


<script>
window.print()
</script>
</body>
</html>
