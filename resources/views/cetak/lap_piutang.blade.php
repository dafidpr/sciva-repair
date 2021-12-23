<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Piutang PDF</title>
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
    <h3 style="text-align: center;">LAPORAN PIUTANG</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>Tanggal</th>
                <th>Kode Jual</th>
                <th>Pelanggan</th>
                <th>Tempo</th>
                <th>Jumlah</th>
                <th>Bayar</th>
                <th>Sisa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receivable as $item)

            <tr>
                {{-- <td>{{$loop->iteration}}</td> --}}
                <td>{{$item->receivable_date}}</td>
                <td>{{$item->invoice}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->due_date}}</td>
                <td>Rp. {{number_format($item->total)}}</td>
                <td>Rp. {{number_format($item->payment)}}</td>
                <td>Rp. {{number_format($item->remainder)}}</td>
                <td>
                    @if ($item->status == 'not yet paid')
                        Belum Lunas
                    @elseif ($item->status == 'paid off')
                        Lunas
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>Tanggal</th>
                <th>Kode Servis</th>
                <th>Pelanggan</th>
                <th>Tempo</th>
                <th>Jumlah</th>
                <th>Bayar</th>
                <th>Sisa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receivable2 as $item)

            <tr>
                {{-- <td>{{$loop->iteration}}</td> --}}
                <td>{{$item->receivable_date}}</td>
                <td>{{$item->transaction_code}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->due_date}}</td>
                <td>Rp. {{number_format($item->total)}}</td>
                <td>Rp. {{number_format($item->payment)}}</td>
                <td>Rp. {{number_format($item->remainder)}}</td>
                <td>
                    @if ($item->status == 'not yet paid')
                        Belum Lunas
                    @elseif ($item->status == 'paid off')
                        Lunas
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



    <table align="right" border="2" style="border-collapse: collapse; font-size:13px; margin-top:3px;">
        <tr>
            <td>  Total Piutang  </td>
            <td id="totally" > Rp. {{number_format($total_piutang + $total_piutang2)}} </td>
        </tr>
        <tr>
            <td>  Total Bayar  </td>
            <td id="totally"> Rp. {{number_format($total_bayar + $total_bayar2)}} </td>
        </tr>
        <tr>
            <td>  Sisa Piutang  </td>
            <td id="totally"> Rp. {{number_format($sisa_piutang + $sisa_piutang2)}} </td>
        </tr>
    </table>
</body>
</html>
