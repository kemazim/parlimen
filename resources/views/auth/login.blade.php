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
  padding: 12px 15px;
  margin: 15px 0;
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
  padding: 14px 0px;
  margin: 8px 0;
  border: 1px solid #000000;;
  cursor: pointer;
  width: 80%;
}
a{
    margin: 0px 10px;
    text-decoration:none;
}

form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  margin: 0 auto 100px;
  padding: 50px;
  text-align: center;
}

.row {
}

.container {
  padding: 16px;
  padding-top: 50px;
  text-align: center;
}

.card {
  position: relative;
  z-index: 2;
  background: #FFFFFF;
  max-width: 40%;
  margin: 0px auto 0px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

</style>
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

 
            <div class="card">

            <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        @if (session('error'))
             <h4 class="alert alert-danger">
            {{ session('error') }}
            </h4>
              @endif

              @error('password')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
              
                        <div class="text-center">
                  <img src="https://seeklogo.com/images/A/agensi-antidadah-kebangsaan-logo-F11C5219C0-seeklogo.com.png"
                    style="width: 185px;" alt="logo">
                </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Emel') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Sila isi emel anda" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Kata Kunci') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata kunci lebih dari 8 perkataan">

                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Log Masuk') }}
                                </button>
                                </div>
                     </div>

                     <div class="row mb-3">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa kata laluan') }}
                                    </a>
                                @endif
                                <a class="btn btn-link" href="{{ route('register') }}">{{ __('Pengguna baru') }}</a>
                                </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>

