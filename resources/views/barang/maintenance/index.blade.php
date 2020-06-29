@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pinjam Barang</h1>
        <a href="{{ route('pinjam-barang.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pinjam Barang</h6>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Pinjam</th>
                            <th>Peminjam</th>
                            <th>Status</th>
                            <th>Tgl Pinjam</th>
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
        ajax:'{{ route('data.pinjam') }}',
        columns:[
            {data: 'DT_RowIndex', orderable:false, searchable:false},
            {data: 'nm_brg'},
            {data: 'jml_pinjam'},
            {data: 'peminjam'},
            {data: 'status'},
            {data: 'tgl_pinjam'},
            {data: 'tgl_kembali'},
            {data: 'action'},
        ]
        });

    $('body').on('click', '.delete', function () {

        let Item_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
            url: "{{ route('barang.store') }}"+'/'+Item_id,
            success: function (data) {
                showTable.draw();
                $.notify({
                    message: 'Data barang berhasil dihapus'
                    },{
                        type: 'info',
                        z_index: 9999,
                    });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    $('#tgl_kembali').datetimepicker({
        locale: 'id',
        format: 'Y-MM-DD hh:mm'
    });

});
</script>
@include('templates.partials.alerts')


@endpush
