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
        <label style="font-size: 13px;">{{$barcode}}</label><br>
        <img style="width: 25%;" src="data:image/png;base64,{{DNS1D::getBarcodePNG($barcode, 'EAN13')}}" alt="barcode" />
    </div><br>
    @endfor

    <script>
        window.print()
        </script>
</body>
</html>
