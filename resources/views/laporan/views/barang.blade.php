<!DOCTYPE html>
<html>

<head>
    <title>Laporan Barang</title>
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 12pt;
        }

        footer .pagenum:before {
            content: counter(page);
        }

        /* .page-break {
            page-break-after: always;
        } */
    </style>
    <div class="card">
        <div class="row  ">
            <div class="col-1"><img src="{{ public_path('assets/img/logo.png') }}" alt="Logo" class="img-fluid"
                    width="75">
            </div>
            <div class="col-11 ">
                <div class="text-center mx-auto">
                    <h4>Laporan Barang</h4>

                    <div>
                        <h5>LABORATORIUM IPA SMP ASYSYAKIRIN</h5>
                    </div>
                    <div>
                        <h6>Tahun {{ $tahun }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <hr style="border:2px solid">
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            @php $i=1 @endphp
            @foreach($barang as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$item->nm_brg}}</td>
                <td>{{$item->jml_brg}}</td>
            </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>

    <div class="float-right">Tangerang, {{$tgl}}</div> <br><br>
    <div class="float-right">Petugas Laboratorium,</div> <br><br><br>
    <div class="float-right">{{ Auth::user()->name }}</div> <br><br>
    <small class="fixed-bottom">dicetak_{{ $tglCetak }}</span>
</body>


</html>
