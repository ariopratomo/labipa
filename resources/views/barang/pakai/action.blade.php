@if (is_null($model->tgl_kembali))

<a href="javascript:void(0)" class="btn btn-success" data-target="#modelId{{ $model->id }}"
    data-toggle="modal">Kembalikan</a>


@else

<button type="button" class="btn btn-info" disabled><i class="fas fa-check"></i></button>

@endif




<!-- Modal -->
@include('barang.pakai.modal.modal-kembali')
