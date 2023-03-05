<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Soalan</title>
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
      <h3>Tambah &nbsp &nbsp &nbsp&nbsp &nbsp Soalan</h3>
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
      <h2><small>Sila Isi Maklumat Soalan</small></h2>
      @if (session('status'))
                <h5 class="alert alert-success">{{ session('status') }}</h5>
            @endif
      <div class="card">

<div class="card-body">
    <form method="POST" action="questionSave"  enctype="multipart/form-data">
        @csrf
                      <label for="rujukan" class="col-md-4 col-form-label text-md-end">{{ __('Rujukan  :') }}</label>
                      <input type="text" name="rujukan" placeholder="Sila isi nombor rujukan" value=""> <br> <br>

                      <label for="soalan" class="col-md-4 col-form-label text-md-end">{{ __('Soalan  :') }}</label>
                      <textarea rows="4" name="soalan"  style="width:300px;height:200px"  placeholder="Sila terangkan soalan" value=""></textarea>
                     <br> <br>

                      <label for="jenisPertanyaan" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Pertanyaan  :') }}</label>
                      <select class="form-select form-select-lg mb-3 form-control" name="jenisPertanyaan" id="jenisPertanyaan">
                        <option selected disabled>Sila Pilih Jenis Pertanyaan</option>
                        @foreach ($jenisPertanyaan as $jenisPertanyaan)
                      <option value="{{ $jenisPertanyaan->id }}">{{ $jenisPertanyaan->nama_jenis_pertanyaan }}</option>
                      @endforeach
                      </select><br> <br>

                        <label for="jenisDewan" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Dewan  :') }}</label>
                      <select class="form-select form-select-lg mb-3 form-control" name="jenisDewan" id="jenisDewan">
                        <option selected disabled>Sila Pilih Jenis Dewan</option>
                        @foreach ($jenisDewan as $jenisDewan)
                      <option value="{{ $jenisDewan->id }}">{{ $jenisDewan->nama_jenis_dewan }}</option>
                      @endforeach
                      </select><br> <br>

                        <label for="yangBerhormat" class="col-md-4 col-form-label text-md-end">{{ __('Yang Berhormat(YB) :') }}</label>
                      <select class="form-select form-select-lg mb-3 form-control" name="yangBerhormat" id="yangBerhormat">
                      <option selected disabled>Sila Pilih Yang Berhormat</option>
                      @foreach ($yangBerhormat as $yangBerhormat)
                      <option value="{{ $yangBerhormat->id }}">{{ $yangBerhormat->nama }}</option>
                      @endforeach
                      </select><br> <br>

                      <label for="sidang" class="col-md-4 col-form-label text-md-end">{{ __('Sidang :') }}</label>
                      <select class="form-select form-select-lg mb-3 form-control" name="sidang" id="sidang">
                      <option selected disabled>Sila Pilih Sidang</option>
                      @foreach ($sidang as $sidang)
                      <option value="{{ $sidang->id }}">{{ $sidang->nama }}</option>
                      @endforeach
                      </select><br> <br>

                      
                      <label for="parlimen" class="col-md-4 col-form-label text-md-end">{{ __('Parlimen :') }}</label>
                      <select class="form-select form-select-lg mb-3 form-control" name="parlimen" id="parlimen">
                      <option selected disabled>Sila Pilih Parlimen</option>
                      @foreach ($parlimen as $parlimen)
                      <option value="{{ $parlimen->id }}">{{ $parlimen->nama }}</option>
                      @endforeach
                      </select><br> <br>

                      <label for="penggal" class="col-md-4 col-form-label text-md-end">{{ __('Penggal :') }}</label>
                      <select class="form-select form-select-lg mb-3 form-control" name="penggal" id="penggal">
                      <option selected disabled>Sila Pilih Penggal</option>
                      @foreach ($penggal as $penggal)
                      <option value="{{ $penggal->id }}">{{ $penggal->nama }}</option>
                      @endforeach
                      </select><br> <br>

                      <label for="mesyuarat" class="col-md-4 col-form-label text-md-end">{{ __('Mesyuarat :') }}</label>
                      <select class="form-select form-select-lg mb-3 form-control" name="mesyuarat" id="mesyuarat">
                      <option selected disabled>Sila Pilih Mesyuarat</option>
                      @foreach ($mesyuarat as $mesyuarat)
                      <option value="{{ $mesyuarat->id }}">{{ $mesyuarat->nama }}</option>
                      @endforeach
                      </select><br> <br>

                      <label for="tarikh" class="col-md-4 col-form-label text-md-end">{{ __('Tarikh:') }}</label>
                      <input type="date" name="tarikh" value=""> <br> <br>
                           
                      
                      <br><br>
      <button type="submit" class="btn btn-primary"> Tambah Soalan</button>
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
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>  
