<a href="javascript:void(0)" class="btn btn-success" data-target="#modelId" data-toggle="modal">Kembalikan</a>
<a href="javascript:void(0)" class="btn btn-danger delete" data-token="{{ csrf_token() }}"
    data-id="{{ $model->id }}">Hapus</a>
{{-- onclick="return confirm('Apakah anda yakin ?')" --}}

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role=" document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label> Tanggal Kembali</label>
                        <div class="input-group date" id="tgl_kembali" data-target-input="nearest">
                            <input type="text" name="tgl_kembali" class="form-control datetimepicker-input"
                                data-target="#tgl_kembali" />
                            <div class="input-group-append" data-target="#tgl_kembali" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('tgl_kembali')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
