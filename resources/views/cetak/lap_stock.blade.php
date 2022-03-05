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
    <h3 style="text-align: center;">LAPORAN STOK</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Barcode</th>
                <th width="20%">Item</th>
                <th>Jumlah</th>
                <th width="10%">Nilai (Rp.)</th>
                <th width="15%">Jenis</th>
                <th width="40%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->_product->barcode}}</td>
                <td>{{$item->_product->name}}</td>
                <td>{{$item->total}}</td>
                <td>Rp. {{number_format($item->value)}}</td>
                <td>
                    @if ($item->type == 'in')
                        Stok Masuk
                    @elseif ($item->type == 'out')
                        Stok Keluar
                    @endif
                </td>
                <td>{{$item->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table align="right" border="2" style="border-collapse: collapse; font-size:13px; margin-top:3px;">
        @if ($tipe == 'all')
        <tr>
            <td>  Total Nilai Masuk  </td>
            <td id="totally" > Rp. {{number_format($nilai_in)}} </td>
        </tr>
        <tr>
            <td>  Total Nilai Keluar  </td>
            <td id="totally"> Rp. {{number_format($nilai_out)}} </td>
        </tr>
        @else
        <tr>
            <td>  Total Nilai  </td>
            <td id="totally"> Rp. {{number_format($nilai_in)}} </td>
        </tr>
        @endif
    </table>


    <script>
        window.print()
        </script>
</body>
</html>
