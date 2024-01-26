<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Barang PDF</title>
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
    <h3 style="text-align: center;">DATA BARANG</h3>
    {{-- <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4> --}}
    <br>

    <table width="100%" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Barcode</th>
                <th width="20%">Item</th>
                <th>Stok Gudang</th>
                <th>Stok Nyata</th>
                <th width="40%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->barcode}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->stock}}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    <script>
        window.print()
        </script>
</body>
</html>
