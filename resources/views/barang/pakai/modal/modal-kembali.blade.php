<div class="modal fade" id="modelId{{ $model->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role=" document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mengembalikan Barang </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pemakaian-barang.update', $model) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="id_pakai" value="{{ $model->id}}">
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <div class="input-group date" id="tgl_kembali{{ $model->id }}" data-target-input="nearest">
                            <input type="text" name="tgl_kembali" class="form-control datetimepicker-input"
                                data-target="#tgl_kembali" />
                            <div class="input-group-append" data-target="#tgl_kembali{{ $model->id }}"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('tgl_kembali')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary return">Kembalikan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    console.log('{{ $model->id }}')
    $(function () {

        $('#tgl_kembali{{ $model->id }}').datetimepicker({
            locale: 'id',
            format: 'Y-MM-DD'
        });

    });
</script>
