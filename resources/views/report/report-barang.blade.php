<!DOCTYPE html>
<html>

<head>
    <title>Laporan Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <div class="row">
        <div class="col-3"><img src="{{ public_path('assets/img/logo.png') }}" alt="Logo" class="img-fluid" width="200">
        </div>
        <div class="col-9">
            <h4>Laporan Barang</h4>
            <div>
                <h5>LABORATORIUM IPA SMP ASYSYAKIRIN</h5>
            </div>
            <div>
                <h6>Tahun 2020</h6>
            </div>
        </div>
    </div>


    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
            </tr>
        </thead>
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
    </table>

    <div class="float-right">Tangerang, @php
        now()
        @endphp</div>

</body>

</html>
