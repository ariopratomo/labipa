<a href="javascript:void(0)" data-id="{{ $model->id }}" class="btn btn-warning" id="editKelas">Edit</a>
<a href="javascript:void(0)" class="btn btn-danger delete" data-token="{{ csrf_token() }}"
    data-id="{{ $model->id }}">Hapus</a>
{{-- onclick="return confirm('Apakah anda yakin ?')" --}}
