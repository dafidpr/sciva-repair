<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan KAS PDF</title>
</head>
<body>
    <table style="width: 100%; font-size: 15px;">
        <tr>
            <td width="10%"><img src="{{asset('tmp/asset/images/'. $company->logo)}}" width="90px" alt=""></td>
            <td>
                <p><b>{{$company->name}}</b></p>
                <p>{{$company->address}}</p>
                <p>Phone : {{$company->telephone}} | Email : {{$company->email}}</p>
            </td>
        </tr>
    </table><hr style="border: 0; border-top: 4px double #8c8c8c;">
    <br>
    <h3 style="text-align: center;">LAPORAN KAS</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>Tanggal</th>
                <th>User</th>
                <th>Jenis</th>
                <th width="20%">Nominal (Rp.)</th>
                <th width="40%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cash as $item)
            <tr>
                {{-- <td>{{$loop->iteration}}</td> --}}
                <td>{{$item->date}}</td>
                <td>{{$item->_user->name}}</td>
                <td>
                    @if ($item->source == 'income')
                        Pemasukan
                    @elseif ($item->source == 'expenditure')
                        Pengeluaran
                    @endif
                </td>
                <td>Rp. {{number_format($item->nominal)}}</td>
                <td>{{$item->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table align="right" border="2" style="border-collapse: collapse; font-size:13px; margin-top:3px;">
        <tr>
            <td>  Total Pemasukan  </td>
            <td id="totally" > Rp. {{number_format($pemasukan)}} </td>
        </tr>
        <tr>
            <td>  Total pengeluaran  </td>
            <td id="totally"> Rp. {{number_format($pengeluaran)}} </td>
        </tr>
        <tr>
            <td>  Sisa Saldo  </td>
            <td id="totally"> Rp. {{number_format($sisa)}} </td>
        </tr>
    </table>


    <script>
        window.print()
        </script>
</body>
</html>
