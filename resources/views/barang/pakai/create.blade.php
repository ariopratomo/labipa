@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pinjam</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pemakaian-barang.store') }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <select class="form-control borrow" name="nm_brg" required="">
                                <option value="">-- Pilih barang --</option>
                                @foreach ($barang as $brg)
                                <option value="{{ $brg->id }}" data-jml="{{ $brg->jml_brg }}">{{ $brg->nm_brg }}
                                </option>
                                @endforeach
                            </select>
                            @error('nm_brg')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jumlah Pinjam <sup class="text-danger qty"></sup></label>
                            <input type="number" class="form-control" id="jml_pinjam" name="jml_pinjam"
                                value="{{ old('jml_pinjam') }}" required="">
                            @error('jml_pinjam')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Keterangan Pinjam</label>
                            <input type="text" name="ket_pinjam" class="form-control" placeholder="keterangan pinjam"
                                maxlength="200" required="">
                            @error('ket_pinjam')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label> Tanggal Pinjam</label>
                            <div class="input-group date" id="tgl_pinjam" data-target-input="nearest">
                                <input type="text" name="tgl_pinjam" class="form-control datetimepicker-input"
                                    data-target="#tgl_pinjam" required="" autocomplete="off" />
                                <div class="input-group-append">
                                    <div class="input-group-text" data-target="#tgl_pinjam"
                                        data-toggle="datetimepicker"><i class="fas fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('tgl_pinjam')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-8">
                        <button class="btn btn-primary float-right" type="submit">Simpan</button>
                        <a class="btn btn-secondary float-right mr-2" href="{{ route('pemakaian-barang.index') }}"
                            type="submit">Batal</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


@endsection
@push('style')
{{-- <link href="{{ secure_secure_asset('assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"
rel="stylesheet"> --}}
{{-- <link href="{{ secure_secure_asset('assets/vendor/select2/css/select2.min.css')}}" rel="stylesheet"> --}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ secure_secure_asset('assets/vendor/datetimepicker/datetimepicker.css')}}" rel="stylesheet">

@endpush
@push('scripts')
{{-- <script src="{{ secure_secure_asset('assets/vendor/select2/js/select2.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ secure_secure_asset('assets/vendor/datetimepicker/moment.min.js') }}"></script>
<script src="{{ secure_secure_asset('assets/vendor/datetimepicker/moment-with-locales.min.js') }}"></script>
<script src="{{ secure_secure_asset('assets/vendor/datetimepicker/datetimepicker.js') }}"></script>
<script>
    // $('.select2').find(':selected');
    $(function () {
                $('#tgl_pinjam').datetimepicker({
                    locale: 'id',
                    format: 'Y-MM-DD'
                });
            });

            $('select').change(function(){
                let max_pinjam =$(this).find(':selected').attr('data-jml')


                console.log(max_pinjam)
                $(".qty").html("");
                $("#jml_pinjam").attr("max",max_pinjam);
                $(".qty").append("maksimal "+max_pinjam);
            });

</script>

@endpush
