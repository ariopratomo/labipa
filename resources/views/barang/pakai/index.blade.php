@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pemakaian Barang</h1>
        <a href="{{ route('pemakaian-barang.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-hijau shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Data Pakai Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Pakai</th>
                            <th>Pemakai</th>
                            <th>Status</th>
                            <th>Tgl Pakai</th>
                            <th>Tgl Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Datatables --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

@endsection

@push('style')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<link href="{{ asset('assets/vendor/datetimepicker/datetimepicker.css')}}" rel="stylesheet">
@endpush
@push('scripts')

<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<script src="{{ asset('assets/vendor/datetimepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datetimepicker/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datetimepicker/datetimepicker.js') }}"></script>

<script>
    // Call the dataTables jQuery plugin
$(document).ready(function() {

    let showTable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax:'{{ route('data.pakai') }}',
        columns:[
            {data: 'DT_RowIndex', orderable:false, searchable:false},
            {data: 'barang.nm_brg'},
            {data: 'jml_pakai'},
            {data: 'user.name'},
            {data: 'status'},
            {data: 'tgl_pakai'},
            {data: 'tgl_kembali'},
            {data: 'action'},
        ]
        });
});

</script>

@include('templates.partials.alerts')


@endpush
