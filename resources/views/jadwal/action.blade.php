<a href="{{ route('barang.edit', $model) }}" class="btn btn-warning">Edit</a>
<a href="javascript:void(0)" class="btn btn-danger delete" data-token="{{ csrf_token() }}"
    data-id="{{ $model->id }}">Hapus</a>
{{-- onclick="return confirm('Apakah anda yakin ?')" --}}
