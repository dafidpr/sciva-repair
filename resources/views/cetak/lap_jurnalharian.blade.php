<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Laba Kotor PDF</title>
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
    <h3 style="text-align: center;">LAPORAN JURNAL HARIAN</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cash as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->date}}</td>
                <td>{{$item->description}}</td>
                <td>
                    @if ($item->source == 'expenditure')
                        Rp. {{number_format($item->nominal)}}
                    @elseif ($item->source == 'other_expenditure')
                        Rp. {{number_format($item->nominal)}}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($item->source == 'income')
                        Rp. {{number_format($item->nominal)}}
                    @elseif ($item->source == 'other_income')
                        Rp. {{number_format($item->nominal)}}
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: center;"><b>Total</b></td>
                <td><b>Rp. {{number_format(($debit + $debit2))}}</b></td>
                <td><b>Rp. {{number_format(($kredit + $kredit2))}}</b></td>
            </tr>
        </tbody>
    </table>


    <script>
        window.print()
        </script>
</body>
</html>
