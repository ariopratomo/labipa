@if (is_null($model->tgl_kembali))

<a href="javascript:void(0)" class="btn btn-success btn-block mb-1" data-target="#modelId{{ $model->id }}"
    data-toggle="modal">Kembalikan</a>


<a href="{{ route('pemakaian-barang.edit', $model) }}" class="btn btn-warning">Edit</a>
<a href="javascript:void(0)" class="btn btn-danger delete" data-token="{{ csrf_token() }}"
    data-id="{{ $model->id }}">Hapus</a>
@else

<button type="button" class="btn btn-info btn-block" disabled><i class="fas fa-check"></i>Dikembalikan</button>

@endif




<!-- Modal -->
@include('barang.pakai.modal.modal-kembali')
