<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @for ($i = 0; $i < $jumlah; $i++)

    <div style="text-align: center;">
        <img style="width: 100%;" src="data:image/png;base64,{{DNS1D::getBarcodePNG($barcode, 'EAN5')}}" alt="barcode" />
        <span style="font-size: 20px;">{{$barcode}}</span>
    </div><br><br>
    @endfor
</body>
</html>
