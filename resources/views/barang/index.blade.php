@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang</h1>
        <a href="{{ route('barang.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Barang</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

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
@endpush
@push('scripts')

<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>

<script>
    // Call the dataTables jQuery plugin
$(document).ready(function() {

    let showTable = $('#dataTable').DataTable({
            processing: true,
                serverSide: true,
                fixedHeader: true,
                ajax:'{{ route('data.barang') }}',
                columns:[
                    {data: 'DT_RowIndex', orderable:false, searchable:false},
                    {data: 'nm_brg'},
                    {data: 'jml_brg'},
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

});
</script>
@include('templates.partials.alerts')


@endpush
