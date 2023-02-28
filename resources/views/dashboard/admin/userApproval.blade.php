<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pendaftaran Pengguna</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="/css/app.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h3>Pendaftaran Pengguna</h3>
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
	</li>

    <li class="nav-item">
		<a class="nav-link" href="#"> Hubungi Kami </a>
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
       <h2><small>Sila Sahkan Pendaftaran Pengguna</small></h2>
      <hr>
            @if (session('status'))
                <h5 class="alert alert-success">{{ session('status') }}</h5>
            @endif

            <form action="" class="col-9">
              <div class="form-group">
                <input type="search" name="search" id="" class="form-control" placeholder="Sila isi nama untuk carian" />
          
            <button class="btn btn-primary">Carian</button>
            </div>
            </form> 

            <table class="table table-striped">
                <tr>
                <th>BIL.</th>
                    <th>Nombor Kad Pengenalan</th>
                    <th>Nama</th>
                    <th>Gred</th>
                    <th>Pejabat</th> 
                    <th>Status</th> 
                    <th>Tarikh Daftar</th> 
                    <th>Tindakan</th> 
                </tr>
                @if(!empty($users) && $users->count())
             @foreach($users as $user)
                <tr>
                <td scope="row">{{ $users->firstItem() + $loop->index }}</td>
                    <td>{{$user['nomborKadPengenalan']}}</td>
                    <td>{{$user['nama']}}</td>
                    <td>{{$user->gred->nama}}</td>
                    <td>{{$user->pejabat->nama}}</td>
                    <td>{{$user['statusString']}}</td>
                    <td>{{$user->created_at->format('d-m-Y')}}</td>
                    <td>
                    <a href="{{url('admin/userApproval/edit/'.$user->id)}}" class="btn btn-success"> Kemaskini</a>
                    </td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="10">Tiada data untuk dipaparkan.</td>
                </tr>
            @endif
</table>
{{ $users->links() }}
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