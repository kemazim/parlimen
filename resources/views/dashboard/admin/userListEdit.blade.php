<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kemaskini Pengguna</title>
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
      <h3>Kemaskini Pengguna</h3>
      <hr>
      <nav class="sidebar card py-2 mb-4">
<ul class="nav flex-column" id="nav_accordion">

<li class="nav-item">
		<a class="nav-link" href="/admin/dashboard"> Dashboard </a>
	</li>
    
	<li class="nav-item has-submenu">
		<a class="nav-link" href="#"> Maklumat Pengguna  </a>
		<ul class="submenu collapse">
			<li><a class="nav-link" href="/admin/userList">Pengguna Aktif </a></li>
			<li><a class="nav-link" href="/admin/userApproval">Pengguna Tidak Aktif </a></li>
		</ul>
	</li>
	<li class="nav-item has-submenu">
		<a class="nav-link" href="#"> Soalan  </a>
		<ul class="submenu collapse">
			<li><a class="nav-link" href="/admin/questionList">Carian Soalan</a></li>
			<li><a class="nav-link" href="/admin/questionCreate">Tambah Soalan </a></li>
			<li><a class="nav-link" href="/admin/questionEdit">Kemaskini Soalan </a></li>
			<li><a class="nav-link" href="/admin/questionAnswerApproval">Kelulusan Soalan </a></li>
		</ul>
	</li>
  <li class="nav-item">
		<a class="nav-link" href="#"> Kemaskini </a>
        <ul class="submenu collapse">
			<li><a class="nav-link" href="/admin/parlimenList">Kemaskini Parlimen</a></li>
            <li><a class="nav-link" href="/admin/ybList">Kemaskini Yang Berhormat</a></li>
		</ul>
	</li>

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
    <h2><small> Kemaskini {{$user->nama}}  </small></h2>
      <hr>
    </div>

                    <form action="{{ url('admin/userListUpdateUser/'.$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="nomborKadPengenalan-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nombor kad pengenalan  :') }}</label>
                      <input type="text" name="nomborKadPengenalan" value="{{$user['nomborKadPengenalan']}}"> <br> <br>
                      <label for="nama-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nama :') }}</label>
                      <input type="text" name="nama" value="{{$user['nama']}}"><br> <br>
                      <label for="email-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>
                      <input type="text" name="email" value="{{$user['email']}}"> <br> <br>
                      <label for="nomborTelefonBimbit-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Nombor telefon bimbit :') }}</label>
                      <input type="text" name="nomborTelefonBimbit" value="{{$user['nomborTelefonBimbit']}}"> <br> <br>
                      <label for="peranan-confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Peranan :') }}</label>
                      <input type="text" name="peranan" value="{{$user['perananString']}}" readonly="readonly"> <br> <br>

                  
                        <label for="">Peranan sekarang</label>
                        <select class="form-select @error('peranan') is-invalid @enderror" name="peranan" id="peranan" value="{{$user['perananString']}}">
                        <option selected disabled>Sila Pilih Peranan</option>
                        <option value="1">Pengguna</option>
                        <option value="2">Penyelaras</option>
                        <option value="3">Pentadbir</option>
                            </select>
                            <br> <br>

                       
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Sila pastikan telah memilih peranan pengguna')">Kemaskini Pengguna</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
</script>
</body>     
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>  