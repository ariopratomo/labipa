@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Tambah Jadwal</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('jadwal.store') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="form-group">
                            <label>NIP Pengajar</label>
                            <select class="form-control" name="nip">
                                <option value="">Pilih NIP</option>
                                @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->nip }}</option>
                                @endforeach
                            </select>
                            @error('nip')
                            <small id="helpId" class="form-text text-danger ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mapel</label>
                            <input type="text" class="form-control" name="mapel" value="{{  old('mapel') }}"
                                aria-describedby="helpId">
                            @error('mapel')
                            <small id="helpId" class="form-text text-danger ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Hari</label>
                            <select class="form-control" name="hari">
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumat</option>
                            </select>
                            @error('hari')
                            <small id="helpId" class="form-text text-danger ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                            <small id="helpId" class="form-text text-danger ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" aria-describedby="helpId">
                            @error('keterangan')
                            <small id="helpId" class="form-text text-danger ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jam ke</label>
                            <input type="number" class="form-control" name="jam" aria-describedby="helpId">
                            @error('jam')
                            <small id="helpId" class="form-text text-danger ">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-8">
                        <button class="btn btn-hijau float-right" type="submit">Simpan</button>
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
