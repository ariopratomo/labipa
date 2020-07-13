<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form id="formKelas">
                    @csrf
                    <div class="alert alert-success d-none" id="msg_div">
                        <span id="res_message"></span>
                    </div>
                    <input type="hidden" name="kelasId" id="kelasId">
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" class="form-control" name="kelas" id="kelas" aria-describedby="helpId"
                            placeholder="Masukkan nama kelas" autofocus>
                        <span class="text-danger p-1">{{ $errors->first('title') }}</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" id="simpan" class="btn btn-hijau">Simpan</button>
            </div>
        </div>
    </div>
</div>


{{-- <script>
    $(document).ready(function() {
        $("#send_form").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var kelas = $("input[name='kelas']").val();

            $.ajax({
                url: "/kelas/create",
                type:'POST',
                data: {_token:_token, kelas:kelas, body:body},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
</script> --}}
