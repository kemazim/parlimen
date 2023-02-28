<!DOCTYPE html>
<html lang="en">
<head>
  <title>Maklumat Pengguna</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="/css/label.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h3>Maklumat &nbsp Pengguna</h3>
      <hr>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="dashboard">Dashboard</a></li>
        <li class="active"><a href="profile">Maklumat Pengguna</a></li>
        <li><a href="questionList">Carian Soalan</a></li>
        <li><a href="questionEdit">Kemaskini Jawapan</a></li>
        

        <li><form action="{{ route('logout') }}" method="post">
       @csrf
       <button type="submit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log keluar
        </button>
</form>

  </li>
      </ul><br>
    </div>

    <div class="col-sm-9">
 <h2><small>Profil {{Auth::user()->nama}}</small></h2>
      <hr>
     
            @if (session('status'))
                <h5 class="alert alert-success">{{ session('status') }}</h5>
            @endif

            <label for="nomborKadPengenalan-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nombor kad pengenalan  :') }}</label>
                      <input type="text" name="nomborKadPengenalan" value="{{Auth::user()->nomborKadPengenalan}}" readonly="readonly"> <br> <br>
                      <label for="nama-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nama :') }}</label>
                      <input type="text" name="nama" value="{{Auth::user()->nama}}" readonly="readonly"><br> <br>
                      <label for="email-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>
                      <input type="text" name="email" value="{{Auth::user()->email}}" readonly="readonly"> <br> <br>
                      <label for="nomborTelefonBimbit-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nombor telefon bimbit :') }}</label>
                      <input type="text" name="nomborTelefonBimbit" value="{{Auth::user()->nomborTelefonBimbit}}" readonly="readonly"> <br> <br>
                      <label for="peranan-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Peranan :') }}</label>
                      <input type="text" name="peranan" value="{{Auth::user()->perananString}}" readonly="readonly"> <br> <br>

                      <div class="form-group mb-3">
                     <a href="{{url('coordinator/editProfile/'.Auth::user()->id)}}" class="btn btn-primary"> Kemaskini Profil </a>
                     </div>

      
            </div>   

            </div>         
            </div>   

</body>     
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>  