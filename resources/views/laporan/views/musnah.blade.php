<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemusnahan Barang</title>
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

        .ttd {
            bottom: 0
        }
    </style>
    <div class="card">
        <div class="row  ">
            <div class="col-1"><img src="{{ public_path('assets/img/logo.png') }}" alt="Logo" class="img-fluid"
                    width="75">
            </div>
            <div class="col-11 ">
                <div class="text-center mx-auto">
                    <h4>Laporan Pemusnahan Barang</h4>
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
    <h6>{{ $filter }}</h6>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Musnah</th>
                <th>Keterangan</th>
                <th>Tanggal Musnah</th>
            </tr>
        </thead>
        <tbody>

        <tbody>
            @php $i=1 @endphp
            @foreach($barang as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$item->barang->nm_brg}}</td>
                <td>{{$item->jml_musnah}}</td>
                <td>{{$item->keterangan}}</td>
                <td>{{$item->tgl_musnah}}</td>
            </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
    <div class="ttd">

        <div class="float-right">Tangerang, {{$tgl}}</div> <br><br>
        <div class="float-right">Petugas Laboratorium,</div> <br><br><br>
        <div class="float-right">{{ Auth::user()->name }}</div>
        <small class="fixed-bottom">dicetak_{{ $tglCetak }}</span>
    </div>

</body>


</html>
