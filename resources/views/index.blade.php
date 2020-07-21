@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        @role('admin')
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-primary text-uppercase mb-1">Laporan Barang
                            </div>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-primary" href="{{ route('laporan') }}"><i
                                    class="fas fa-print text-gray-300"></i>
                                Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-success text-uppercase mb-1">Laporan Pemakaian
                                Barang
                            </div>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-success" href="{{ route('laporan') }}"><i
                                    class="fas fa-print text-gray-300"></i>
                                Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class=" font-weight-bold text-info text-uppercase mb-1">Laporan Pemusnahan
                                Barang</div>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-info" href="{{ route('laporan') }}"><i
                                    class="fas fa-print text-gray-300"></i>
                                Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole

    </div>
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-success">Jadwal Lab</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>KELAS</th>
                        <th>MAPEL</th>
                        <th>JAM</th>
                        <th>HARI</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
@push('style')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@push('scripts')

<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {

    //#region  show table
    let showTable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax:'{{ route('data.jadwal') }}',
        columns:[
            {data: 'user.nip',},
            {data: 'kelas.kelas'},
            {data: 'mapel'},
            {data: 'jam'},
            {data: 'hari'},
        ]
    });
    //#endregion
    });

</script>


@endpush
