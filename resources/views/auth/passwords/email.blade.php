<!DOCTYPE html>
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, height=device-height">
<style>
body {
    font-family: Arial;   
    background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
  width: 50%;
  padding: 12px 20px;
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
  padding: 14px 15px;
  margin: 8px 0;
  border: 1px solid #000000;;
  cursor: pointer;
  width: 50%;
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
    padding: 5px; 
}

a{
    margin: 0px 10px;
    text-decoration:none;
}

.container {
  width: 50%;
  padding: 25%;
  padding-top: 5%;
  text-align: center;
  position: center;
}

.card {
  position: relative;
  z-index: 2;
  background: #FFFFFF;
  max-width: 20%;
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


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">{{ __('Daftar Pengguna') }}</a>
                                </div>
                                </div>

                                <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Log Masuk') }}
                             </a>
                            </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

