@extends('templates.default')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="text-center text-success mb-2">
        <h5> @foreach (Auth::user()->getRoleNames() as $role)
            {{ $role }}
            @endforeach : {{ Auth::user()->email }}</h5>
    </div>
    <div class="card">
        <div class="card-body px-5">
            <form action="{{ route('profile.update',Auth::user()->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                    <div class="col-sm-7">
                        <input type="text" name="nip" class="form-control" id="nip" value="{{ Auth::user()->nip }}">
                        @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6"><small>(Opsional)</small></div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label ">Password</label>

                    <div class="col-sm-7">
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
                    <label for="password-confirm" class="col-sm-4 col-form-label ">Konfirmasi
                        Password</label>

                    <div class="col-sm-7">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-6"><button type="submit" class="btn btn-primary float-right">
                            Simpan
                        </button></div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
@push('scripts')

<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
@include('templates.partials.alerts')


@endpush
