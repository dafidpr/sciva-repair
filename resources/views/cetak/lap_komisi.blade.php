<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan In/Out PDF</title>
</head>
<body>
    <table style="width: 100%; font-size: 15px;">
        <tr>
            <td width="60px"><img src="{{public_path('tmp/asset/images/'. $company->logo)}}" style="width: 60px;" alt=""></td>
            <td>
                <p style="line-height: 0.3em;"><b>{{$company->name}}</b></p>
                <p style="line-height: 0.3em;">{{$company->address}}</p>
                <p style="line-height: 0.3em;">Phone : {{$company->telephone}} | Email : {{$company->email}}</p>
            </td>
        </tr>
    </table><hr style="border: 0; border-top: 4px double #8c8c8c;">
    <br>
    <h3 style="text-align: center;">LAPORAN KOMISI KARYAWAN</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>No Nota</th>
                <th>Nama</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->_servis->transaction_code}}</td>
                <td>{{$item->_user->name}}</td>
                <td>Rp. {{number_format($item->total)}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align: center;"><b>Total Komisi</b></td>
                <td style="text-align: center;"><b>Rp. {{number_format($total)}}</b></td>
            </tr>
        </tbody>
    </table>


    <script>
        window.print()
        </script>
</body>
</html>
