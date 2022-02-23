<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Laba Kotor PDF</title>
    <style>
        .page-break {
            page-break-after: always;
        }
        </style>
</head>
<body>
    <table style="width: 100%; font-size: 15px;">
        <tr>
            <td width="10%"><img src="{{public_path('tmp/asset/images/'. $company->logo)}}" width="60px" alt=""></td>
            <td>
                <p style="line-height: 0.3em;"><b>{{$company->name}}</b></p>
                <p style="line-height: 0.3em;">{{$company->address}}</p>
                <p style="line-height: 0.3em;">Phone : {{$company->telephone}} | Email : {{$company->email}}</p>
            </td>
        </tr>
    </table><hr style="border: 0; border-top: 4px double #8c8c8c;">
    <br>
    <h3 style="text-align: center;">LAPORAN LABA KOTOR</h3>
    <h4 style="text-align: center;">PERIODE {{$datefrom}} s/d {{$dateto}}</h4>
    <br>

    <?php $hpp2= 0; ?>
    @foreach ($sale as $item)
        <?php
        $a = $item->_product->purchase_price * $item->quantity;
        $hpp2 += $a;
        ?>
    @endforeach
    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
            <tr>
                <td colspan="3"><b>PENDAPATAN</b></td>
            </tr>
            <tr>
                <td>PENJUALAN</td>
                <td width="30%" style="text-align: right;">Rp. {{number_format($total)}}</td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td>SERVIS</td>
                <td style="text-align: right;">Rp. {{number_format($service)}} </td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td>PENDAPATAN LAIN-LAIN</td>
                <td width="30%" style="text-align: right;">Rp. {{number_format(($receivable + $other_in))}}</td>
                <td></td>
            </tr>
            <tr>
                <td><b>TOTAL PENDAPATAN</b></td>
                <td style="text-align: right;"><b> Rp. {{number_format($service+$total+$receivable+$other_in)}} </b></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3"><b>PENGELUARAN</b></td>
            </tr>
            <tr>
                <td>HARGA POKOK PENJUALAN</td>
                <td></td>
                <td width="30%" style="text-align: right;">Rp. {{number_format($hpp2)}} </td>
            </tr>
            <tr>
                <td>PEMBELIAN</td>
                <td></td>
                <td width="30%" style="text-align: right;">Rp. {{number_format($purchase)}} </td>
            </tr>
            <tr>
                <td>PENGELUARAN LAIN-LAIN</td>
                <td></td>
                <td width="30%" style="text-align: right;">Rp. {{number_format($debt+$other_ex)}} </td>
            </tr>
            <tr>
                <td><b>TOTAL PENGELUARAN</b></td>
                <td></td>
                <td style="text-align: right;"><b> Rp. {{number_format($hpp2+$debt+$other_ex+$purchase)}}  </b></td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="2"><b>LABA RUGI</b></td>
                <td style="text-align: right;"><b>Rp. {{number_format(($service+$total+$receivable+$other_in)-($hpp2+$debt+$other_ex+$purchase))}}</b></td>
            </tr>
    </table>

    <br><br>
    <div class="page-break"></div>

    <h3 style="text-align: center;">PENJUALAN</h3>
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
            <tr>
                <td colspan="7" style="text-align: center;"> <b> Total </b> </td>
                <td id="totally"><b> Rp. {{number_format($total)}} </b></td>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center;"> <b> HPP </b> </td>
                <td id="totally"><b> Rp. {{number_format($hpp)}} </b></td>
            </tr>
        </tbody>
    </table>
    <br><br>

    <h3 style="text-align: center;">SERVIS</h3>
    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Servis</th>
                <th>No Nota</th>
                <th>Diskon</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($service_detail as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->transaction_code}}</td>
                <td>Rp. {{number_format($item->discount)}}</td>
                <td>Rp. {{number_format($item->total)}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="4">Total</th>
                <th>Rp. {{number_format($service)}}</th>
            </tr>
        </tbody>
    </table>

    <br><br>

    <h3 style="text-align: center;">PENJUALAN</h3>
    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Qty</th>
                <th>Diskon</th>
                <th>SubTotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase_d as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->_product->name}}</td>
                <td>Rp. {{number_format($item->_product->purchase_price)}}</td>
                <td>Rp. {{number_format($item->_product->sale_price)}}</td>
                <td>{{number_format($item->quantity)}}</td>
                <td>Rp. {{number_format($item->discount)}}</td>
                <td>Rp. {{number_format($item->sub_total)}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7" style="text-align: center;"> <b> Total </b> </td>
                <td id="totally"><b> Rp. {{number_format($purchase)}} </b></td>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center;"> <b> HPP </b> </td>
                <td id="totally"><b> Rp. {{number_format($hpp)}} </b></td>
            </tr>
        </tbody>
    </table>
    <br><br>

    <h3 style="text-align: center;">PENDAPATAN LAIN-LAIN</h3>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th colspan="3">PIUTANG</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receivable_detail as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->payment_date}}</td>
                <td>Rp. {{number_format($item->nominal)}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total</th>
                <th>Rp. {{number_format($receivable)}}</th>
            </tr>
        </tbody>
    </table>

    <br>
    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th colspan="5">LAIN-LAIN</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Total</th>
                <th width="40%">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($other_in_d as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->date}}</td>
                <td>{{$item->cash_code}}</td>
                <td>Rp. {{number_format($item->nominal)}}</td>
                <td>{{$item->description}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="4">Total</th>
                <th>Rp. {{number_format($other_in)}}</th>
            </tr>
        </tbody>
    </table>

    <br><br>

    <h3 style="text-align: center;">PENGELUARAN LAIN-LAIN</h3>

    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th colspan="3">HUTANG</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($debt_detail as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->payment_date}}</td>
                <td>Rp. {{number_format($item->nominal)}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">Total</th>
                <th>Rp. {{number_format($debt)}}</th>
            </tr>
        </tbody>
    </table>

    <br>
    <table width="100%" id="stock" border="2" style="border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr>
                <th colspan="5">LAIN-LAIN</th>
            </tr>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Total</th>
                <th width="40%">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($other_ex_d as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->date}}</td>
                <td>{{$item->cash_code}}</td>
                <td>Rp. {{number_format($item->nominal)}}</td>
                <td>{{$item->description}}</td>
            </tr>
            @endforeach
            <tr>
                <th colspan="4">Total</th>
                <th>Rp. {{number_format($other_ex)}}</th>
            </tr>
        </tbody>
    </table>


</body>
</html>
