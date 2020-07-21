<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemakaian Barang</title>
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ public_path('assets/img/icon/favicon.ico') }}" />
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
    </style>
    <div class="card">
        <div class="row  ">
            <div class="col-1"><img src="{{ public_path('assets/img/logo.png') }}" alt="Logo" class="img-fluid"
                    width="75">
            </div>
            <div class="col-11 ">
                <div class="text-center mx-auto">
                    <h4>Laporan Pemakaian Barang</h4>
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
                <th>Jumlah Pakai</th>
                <th>Pemakai</th>
                <th>Status</th>
                <th>Tanggal Pakai</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>

        <tbody>
            @php $i=1 @endphp
            @foreach($barang as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{$item->barang->nm_brg}}</td>
                <td>{{$item->jml_pakai}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->tgl_pakai}}</td>
                <td>@if (!empty($item->tgl_kembali))
                    {{ $item->tgl_kembali}}
                    @else
                    -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>

    <div class="float-right">Tangerang, {{$tgl}}</div> <br><br>
    <div class="float-right">Petugas Laboratorium,</div> <br><br><br>
    <div class="float-right">{{ Auth::user()->name }}</div> <br><br>

</body>


</html>
