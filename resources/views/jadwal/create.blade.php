@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('jadwal.store') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="">Mapel</label>
                            <input type="text" class="form-control" name="mapel" value="{{  old('mapel') }}"
                                aria-describedby="helpId">
                            @error('mapel')
                            <small id="helpId" class="form-text text-danger ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Hari</label>
                            <select class="form-control" name="" id="">
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-8">
                        <button class="btn btn-primary float-right" type="submit">Simpan</button>
                        <a class="btn btn-secondary float-right mr-2" href="{{ route('jadwal.index') }}"
                            type="submit">Batal</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
