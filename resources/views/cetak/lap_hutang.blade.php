<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Hutang PDF</title>
</head>
<body>
    <table style="width: 100%; font-size: 15px;">
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
    <h3 style="text-align: center;">LAPORAN HUTANG</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>Tanggal</th>
                <th>Kode Beli</th>
                <th>Supplier</th>
                <th>Tempo</th>
                <th>Jumlah</th>
                <th>Bayar</th>
                <th>Sisa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($debt as $item)

            <tr>
                {{-- <td>{{$loop->iteration}}</td> --}}
                <td>{{$item->debt_date}}</td>
                <td>{{$item->invoice}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->due_date}}</td>
                <td>Rp. {{number_format($item->total)}}</td>
                <td>Rp. {{number_format($item->payment)}}</td>
                <td>Rp. {{number_format($item->remainder)}}</td>
                <td>
                    @if ($item->status == 'not yet paid')
                        Belum Lunas
                    @elseif ($item->status == 'paid_off')
                        Lunas
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <table align="right" border="2" style="border-collapse: collapse; font-size:13px; margin-top:3px;">
        <tr>
            <td>  Total Hutang  </td>
            <td id="totally" > Rp. {{number_format($total_hutang)}} </td>
        </tr>
        <tr>
            <td>  Total Bayar  </td>
            <td id="totally"> Rp. {{number_format($total_bayar)}} </td>
        </tr>
        <tr>
            <td>  Sisa Hutang  </td>
            <td id="totally"> Rp. {{number_format($sisa_hutang)}} </td>
        </tr>
    </table>
</body>
</html>
