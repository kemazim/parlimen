<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kemaskini Profil</title>
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
      <h3>Kemaskini  &nbsp &nbsp Profil</h3>
      <hr>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="/user/dashboard">Dashboard</a></li>
        <li class="active"><a href="/user/profile">Maklumat Pengguna</a></li>
        <li><a href="/user/questionList">Carian Soalan</a></li>
        

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
    <h2><small> Kemaskini Profil {{Auth::user()->nama}} </small></h2>
      <hr>
    </div>
 
                    <form action="{{ url('user/updateProfile/'.Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
            
                      <label for="nama-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nama :') }}</label>
                      <input type="text" name="nama" value="{{$user['nama']}}"><br> <br>
                      <label for="nomborTelefonBimbit-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nombor telefon bimbit :') }}</label>
                      <input type="text" name="nomborTelefonBimbit" value="{{$user['nomborTelefonBimbit']}}"> <br> <br>



                       
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Kemaskini Profil?')">Kemaskini Profil</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
