@php
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barcode Supply In</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {
            .no-print {
                display: none;
            }

            body {
                margin: 10mm;
            }
        }

        .barcode-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            page-break-inside: avoid;
        }

        .barcode-box img {
            width: 100%;
            max-width: 250px;
            height: auto;
        }

        .barcode-code {
            font-size: 12px;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Barcode untuk Supply In #{{ $supplyIn->id }}</h2>

        <div class="row">
            @foreach($supplyIn->barcodes as $barcode)
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="barcode-box">
                        <img src="data:image/png;base64,{{ base64_encode($generator->getBarcode($barcode->code, $generator::TYPE_CODE_128)) }}">
                        <div class="barcode-code">{{ $barcode->code }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
