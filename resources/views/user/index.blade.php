@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
        <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah User</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
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
//#region  show table
    let showTable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax:'{{ route('data.user') }}',
        columns:[
            {data: 'DT_RowIndex', orderable:false, searchable:false},
            {data: 'nip',},
            {data: 'name'},
            {data: 'email'},
            {data: 'role'},
            {data: 'action'}
        ]
    });
//#endregion


//#region  delete
    $('body').on('click', '.delete', function () {
        let Item_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "{{ route('users.store') }}"+'/'+Item_id,
            success: function (data) {
                showTable.draw();
                $.notify({ message: data.message },
                {
                    type: 'info',
                    z_index: 9999,
                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
//#endregion
//#region change role

    $('body').on('change','select',function(){
        let userid = $(this).data("id");
        let role = $(this).children("option:selected").val()
        $.ajax({
            url: "{{ route('users.store') }}"+'/'+userid,
            type:'POST',
            data:  $('#roleForm').serialize(),
            success: function(data) {
                console.log(data.success)
                showTable.draw();
                }
        });
    });
//#endregion

});
</script>
@include('templates.partials.alerts')


@endpush
