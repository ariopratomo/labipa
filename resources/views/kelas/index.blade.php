@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelas</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm " id="addKelas" data-toggle="modal"
            data-target="#modalCreate"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kelas</button>
    </div>
    @include('kelas.modal.create')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
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
                    ajax:'{{ route('data.kelas') }}',
                    columns:[
                        {data: 'DT_RowIndex', orderable:false, searchable:false},
                        {data: 'kelas'},
                        {data: 'action'},
                    ]
        });
    //#endregion

    //#region delete data
        $('body').on('click', '.delete', function () {

            let kelasId = $(this).data("id");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                url: "{{ route('kelas.store') }}"+'/'+kelasId,
                success: function (data) {
                    showTable.draw();
                    $.notify({
                        message: data.success
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
    //#endregion

//#region updateOrCreate
        $('#addKelas').click(function () {
            $('#simpan').val("add-kelas");
            $('#kelasId').val('');
            $('#productForm').trigger("reset");
            $('.modal-title').html("Tambah Kelas Baru");
            $('#modal').modal('show');
        });

        $('body').on('click', '#editKelas', function () {
            var kelasId = $(this).data('id');
            $.get("{{ route('kelas.index') }}" +'/' + kelasId +'/edit', function (data) {
                $('.modal-title').html("Edit " + data.kelas);
                $('#simpan').val("edit-user");
                $('#modal').modal('show');
                $('#kelasId').val(data.id);
                $('#kelas').val(data.kelas);
            })
        });

        $("#kelas").keydown(function(e){
            if(e.which === 13){
                $("#simpan").click();
                return false;
            }
        });

        $("#simpan").click(function(e){
            e.preventDefault();
            $(this).html('Menyimpan..');
            ajaxCreateOrUpdate()
        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

        function ajaxCreateOrUpdate(){
            $.ajax({
                url: "{{ route('kelas.store') }}",
                type:'POST',
                data:  $('#formKelas').serialize(),
                success: function(data) {
                    $('#simpan').html('Simpan');
                    $('#formKelas').trigger("reset");
                    if($.isEmptyObject(data.error)){
                        $('#modal').modal('hide');
                        showTable.draw();
                        $.notify({
                            message: data.success
                        },{
                            type: 'info',
                            z_index: 9999,
                        });
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
        }
//#endregion

    });
</script>
@include('templates.partials.alerts')


@endpush
