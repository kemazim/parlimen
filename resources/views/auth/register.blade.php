<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial;   
    background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
  width: 80%;  
  padding: 12px 20px;
  margin: 5px 0;
  display: inline-block;
  border: 2px solid #ccc;
  box-sizing: border-box;
  align: center;
}

/* Set a style for all buttons */
button {
    background-color: #008CBA;
  font-size:15px;
  color: white;
  padding: 14px 15px;
  margin: 8px 0;
  border: 1px solid #000000;;
  cursor: pointer;
  width: 80%;
}

form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  margin: 0 auto 100px;
  padding: 50px;
  text-align: center;
}

select {
  background-color: transparent;
  padding: 12px 20px;
  margin: 5px 0;
  width: 80%;
  font-size: 16px;
}

.container {
  padding: 16px;
  padding-top: 50px;
  text-align: center;
}
a{
    margin: 0px 10px;
    text-decoration:none;
}

.card {
  position: relative;
  z-index: 2;
  background: #FFFFFF;
  max-width: 40%;
  margin: 0 auto 100px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

</style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div>
        @error('nomborKadPengenalan')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div>
        @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div>
        @error('nomborTelefonBimbit')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div>
        @error('password')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

        <div>
        @error('peranan')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>

            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center">
                  <img src="https://seeklogo.com/images/A/agensi-antidadah-kebangsaan-logo-F11C5219C0-seeklogo.com.png"
                    style="width: 100px;" alt="logo">
                </div>


                <!-- Nombor kad pengenalan -->

                <div class="row mb-3">
                            <label for="nomborKadPengenalan" class="col-md-4 col-form-label text-md-end">{{ __('Nombor Kad Pengenalan') }}</label>

                            <div class="col-md-6">
                                <input id="nomborKadPengenalan" type="text" class="form-control @error('nomborKadPengenalan') is-invalid @enderror" name="nomborKadPengenalan" value="{{ old('nomborKadPengenalan') }}" required autocomplete="nomborKadPengenalan" placeholder="Sila isi tanpa '-' " autofocus>
                            </div>
                        </div>

<!-- Nama -->
                     <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" placeholder="Sila isi nama penuh">
                            </div>
                        </div> 
                        <br> 
 


<!-- Gred --> 
<div class="form-group row">
    <label for="gred_id" class="col-md-4 col-form-label text-md-right">{{ __('Gred') }}</label>

    <div class="col-md-6">
        <select id="gred_id" class="form-control @error('gred_id') is-invalid @enderror" name="gred_id" required>
            <option value="">Sila Pilih Gred</option>
            @foreach ($gred as $id => $nama)
                <option value="{{ $id }}" {{ old('gred_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
            @endforeach
        </select>
<!-- Pejabat--> 
<div class="form-group row">
    <label for="pejabat_id" class="col-md-4 col-form-label text-md-right">{{ __('Pejabat') }}</label>

    <div class="col-md-6">
        <select id="pejabat_id" class="form-control @error('pejabat_id') is-invalid @enderror" name="pejabat_id" required>
            <option value="">Sila Pilih Pejabat</option>
            @foreach ($pejabat as $id => $nama)
                <option value="{{ $id }}" {{ old('pejabat_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
            @endforeach
        </select>
<!-- No tel Pejabat--> 
<div class="row mb-3">
                            <label for="noTelPej" class="col-md-4 col-form-label text-md-end">{{ __('Nombor Telefon Pejabat') }}</label>

                            <div class="col-md-6">
                                <input id="noTelPej" type="text" class="form-control @error('noTelPej') is-invalid @enderror" name="noTelPej" value="{{ old('noTelPej') }}" required autocomplete="noTelPej" placeholder="Sila isi tanpa '-'">
                            </div>
                        </div>

  <!-- Email Address -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Sila isi emel">
                            </div>
                        </div>

<!-- Nombor telefon bimbit --> 

                        <div class="row mb-3">
                            <label for="nomborTelefonBimbit" class="col-md-4 col-form-label text-md-end">{{ __('Nombor Telefon Bimbit') }}</label>

                            <div class="col-md-6">
                                <input id="nomborTelefonBimbit" type="text" class="form-control @error('nomborTelefonBimbit') is-invalid @enderror" name="nomborTelefonBimbit" value="{{ old('nomborTelefonBimbit') }}" required autocomplete="nomborTelefonBimbit" placeholder="Sila isi tanpa '-'">
                            </div>
                        </div>
<!-- Password -->


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Kata Laluan') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Kata laluan mestilah lebih dari 8 perkataan">
                            </div>
                        </div>

<!-- Confirm Password -->                        
                        <div class="row mb-3">
                            <label for="password-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Sahkan Kata Laluan') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Sila sahkan kata laluan" required />
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar Masuk') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Log Masuk') }}
                </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
