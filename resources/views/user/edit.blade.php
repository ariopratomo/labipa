@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah User</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update',$user) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ $user->name ?? old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nip" class="col-md-4 col-form-label text-md-right">NIP</label>

                    <div class="col-md-6">
                        <input id="nip" type="number" class="form-control @error('nip') is-invalid @enderror" name="nip"
                            value="{{ $user->nip ??  old('nip') }}" autocomplete="nip">

                        @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email ?? old('email') }}" autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6"><small>(Opsional)</small></div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi
                        Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">Role</label>
                    <div class="col-md-6">
                        <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>

                            @foreach ($role as $row)
                            <option value="{{ $row->id }}" @foreach ($user->getRoleNames() as $role)
                                @if ( $row->name === $role)
                                selected @endif
                                @endforeach>
                                {{ $row->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <p class="text-danger">{{ $errors->first('role') }}</p>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary float-right">
                            Simpan
                        </button>
                        <a class="btn btn-secondary float-right mr-2" href="{{ route('users.index') }}"
                            type="submit">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
