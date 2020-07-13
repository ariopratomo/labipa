@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Edit Barang</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.update',$barang) }}" method="post">
                @csrf
                @method("PUT")
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" class="form-control" name="nm_brg"
                                value="{{ $barang->nm_brg ?? old('nm_brg') }}" aria-describedby="helpId">
                            @error('nm_brg')
                            <small id="helpId" class="form-text text-danger ">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Barang</label>
                            <input type="number" class="form-control" name="jml_brg"
                                value="{{ $barang->jml_brg ?? old('jml_brg') }}" aria-describedby="helpId">
                            @error('jml_brg')
                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-8">
                        <button class="btn btn-hijau float-right" type="submit">Ubah</button>
                        <a class="btn btn-secondary float-right mr-2" href="{{ route('barang.index') }}"
                            type="submit">Batal</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
