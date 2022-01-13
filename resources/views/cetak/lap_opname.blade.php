<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Opname PDF</title>
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
    <h3 style="text-align: center;">LAPORAN OPNAME</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <table width="100%" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Barcode</th>
                <th width="20%">Item</th>
                <th>Stok</th>
                <th>Stok Nyata</th>
                <th>Selisih</th>
                <th>Nilai (Rp.)</th>
                <th width="40%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($opname as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->_product->barcode}}</td>
                <td>{{$item->_product->name}}</td>
                <td>{{$item->stock}}</td>
                <td>{{$item->real_stock}}</td>
                <td>{{$item->difference_stock}}</td>
                <td>{{number_format($item->value)}}</td>
                <td>{{$item->description}}</td>
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
