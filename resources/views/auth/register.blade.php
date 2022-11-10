@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

    <!-- Nombor kad pengenalan -->

                        <div class="row mb-3">
                            <label for="nomborKadPengenalan" class="col-md-4 col-form-label text-md-end">{{ __('Nombor Kad Pengenalan') }}</label>

                            <div class="col-md-6">
                                <input id="nomborKadPengenalan" type="text" class="form-control @error('nomborKadPengenalan') is-invalid @enderror" name="nomborKadPengenalan" value="{{ old('nomborKadPengenalan') }}" required autocomplete="nomborKadPengenalan" autofocus>

                                @error('nomborKadPengenalan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

     <!-- Nama -->
                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama">

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

  <!-- Email Address -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

<!-- Nombor telefon bimbit -->

                        <div class="row mb-3">
                            <label for="nomborTelefonBimbit" class="col-md-4 col-form-label text-md-end">{{ __('Nombor Telefon Bimbit') }}</label>

                            <div class="col-md-6">
                                <input id="nomborTelefonBimbit" type="text" class="form-control @error('nomborTelefonBimbit') is-invalid @enderror" name="nomborTelefonBimbit" value="{{ old('nomborTelefonBimbit') }}" required autocomplete="nomborTelefonBimbit">

                                @error('nomborTelefonBimbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

<!-- Peranan -->
                        <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-select @error('peranan') is-invalid @enderror" name="peranan" id="peranan">
                        <option selected disabled>Sila Pilih Peranan</option>
                        <option value="1">Pengguna</option>
                        <option value="2">Pennyelaras</option>
                        <option value="3">Pentadbir</option>
                            </select>
                    
                            </div>

<!-- Password -->


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>
                        </div>

<!-- Confirm Password -->                        
                        <div class="row mb-3">
                            <label for="password-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" required />
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
