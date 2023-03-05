<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Yang Berhormat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
 .row.content {height: 1100px}
 /* Set gray background color and 100% height */
 .sidenav {
   background-color: #333;
   height: 100%;
 }
 .sidenav a{
   color: white;
 }
 .sidenav a:hover {
background-color: white;
color:black;
}
h3{
   color: white;
 } 
    
    /* Set black background color, white text and some padding */
    input[type=text] {
    width: 30%;  
    padding: 5px 16px;
    margin: 5px 0;
    display: inline-block;
    border: 1.5px solid #ccc;
    box-sizing: border-box;
    align: center;
    }

    label {
    width: 40%;  
    padding: 5px 16px;
    margin: 5px 0;
    display: inline-block;
    box-sizing: border-box;
    align: center;
    }
  
    .form-select {
    width:30%;
    box-sizing: border-box;
    align: center;
    }
    
    .btn {
    padding: 5px 22px; /* Add some padding */
    margin: 5px;
    align:center;
    cursor: pointer; /* Add a pointer cursor on mouse-over */
    }

    
  </style>
</head>
<body>


<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h3>Tambah Yang Berhormat</h3>
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
      <h2><small>Sila Isi Maklumat Yang Berhormat</small></h2>
      <hr>
      @if (session('status'))
                <h5 class="alert alert-success">{{ session('status') }}</h5>
            @endif
      <div class="card">

<div class="card-body">
    <form method="POST" action="ybSave"  enctype="multipart/form-data">
        @csrf
                      <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama Yang Berhormat  :') }}</label>
                      <input type="text" name="nama" placeholder="Sila isi nama Yang Berhormat" value=""> <br> <br>

                      <label for="nama_parlimen" class="col-md-4 col-form-label text-md-end">{{ __('Nama Parlimen :') }}</label>
                      <input type="text" name="nama_parlimen" placeholder="Sila isi nama Parlimen" value=""></textarea>
                     <br> <br>

                     
                      
                      <br><br>
      <button type="submit" class="btn btn-primary"> Tambah Yang Berhormat</button>
      <br><br>
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
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>  
