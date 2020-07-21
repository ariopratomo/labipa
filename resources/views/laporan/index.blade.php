@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Laporan</h6>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="lapbarang-tab" data-toggle="tab" href="#lapbarang" role="tab"
                        aria-controls="lapbarang" aria-selected="true">Laporan Barang</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="lappakai-tab" data-toggle="tab" href="#lappakai" role="tab"
                        aria-controls="lappakai" aria-selected="false">Laporan Pemakaian Barang</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="lapmusnah-tab" data-toggle="tab" href="#lapmusnah" role="tab"
                        aria-controls="lapmusnah" aria-selected="false">Laporan Pemusnahan Barang</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="lapbarang" role="tabpanel" aria-labelledby="lapbarang-tab">
                    @include('laporan.tab.barang')
                </div>
                <div class="tab-pane fade" id="lappakai" role="tabpanel" aria-labelledby="lappakai-tab">
                    @include('laporan.tab.pakai')
                </div>
                <div class="tab-pane fade" id="lapmusnah" role="tabpanel" aria-labelledby="lapmusnah-tab">...</div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
