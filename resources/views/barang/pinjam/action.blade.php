@if (is_null($model->tgl_kembali))

<a href="javascript:void(0)" class="btn btn-success" data-target="#modelId{{ $model->id }}"
    data-toggle="modal">Kembalikan</a>


@else

<a href="javascript:void(0)" class="btn btn-info" data-id="{{ $model->id }}" data-target="#modelId"
    data-toggle="modal"><i class="fas fa-info-circle"></i></a>

@endif


{{-- <a href="javascript:void(0)" class="btn btn-danger delete" data-token="{{ csrf_token() }}"
data-id="{{ $model->id }}">Hapus</a> --}}
{{-- onclick="return confirm('Apakah anda yakin ?')" --}}

<!-- Modal -->
@include('barang.pinjam.modal.modal-kembali')
