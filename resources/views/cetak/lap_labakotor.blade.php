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
            <td width="10%"><img src="{{public_path('tmp/asset/images/'. $company->logo)}}" width="90px" alt=""></td>
            <td>
                <p style="line-height: 0.5em;"><b>{{$company->name}}</b></p>
                <p style="line-height: 0.5em;">{{$company->address}}</p>
                <p style="line-height: 0.5em;">Phone : {{$company->telephone}} | Email : {{$company->email}}</p>
            </td>
        </tr>
    </table><hr style="border: 0; border-top: 4px double #8c8c8c;">
    <br>
    <h3 style="text-align: center;">LAPORAN LABA KOTOR</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>HPP</th>
                <th>Penjualan</th>
                <th>Qty</th>
                <th>Diskon</th>
                <th>SubTotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $hpp= 0; ?>
            @foreach ($sale as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->_product->name}}</td>
                <td>Rp. {{number_format($item->_product->purchase_price)}}</td>
                <td>Rp. {{number_format($item->total)}}</td>
                <td>{{number_format($item->quantity)}}</td>
                <td>Rp. {{number_format($item->discount)}}</td>
                <td>Rp. {{number_format($item->sub_total)}}</td>
                <?php
                    $a = $item->_product->purchase_price * $item->quantity;
                    $hpp += $a;
                ?>
            </tr>
            @endforeach
        </tbody>
    </table>


    <table align="right" border="2" style="border-collapse: collapse; font-size:13px; margin-top:3px;">
        <tr>
            <td>  Total  </td>
            <td id="totally" > Rp. {{number_format($total)}} </td>
        </tr>
        <tr>
            <td>  HPP  </td>
            <td id="totally"> Rp. {{number_format($hpp)}} </td>
        </tr>
        <tr>
            <td>  Laba  </td>
            <td id="totally"> Rp. {{number_format($total -
            $hpp)}} </td>
        </tr>
    </table>

    <script>
        window.print()
        </script>
</body>
</html>
