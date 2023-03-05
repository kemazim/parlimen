<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Jawapan</title>
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
      <h3>Tambah &nbsp &nbsp &nbsp Jawapan</h3>
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
      <h2><small>Sila Tambah Jawapan</small></h2>

      <div class="card">

<div class="card-body">
    <form method="POST" action="{{ url('admin/questionSaveAnswer/'.$question->id) }}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
                      <label for="rujukan" class="col-md-4 col-form-label text-md-end">{{ __('Rujukan  :') }}</label>
                      <input type="text" name="rujukan" value="{{$question['rujukan']}}" readonly="readonly"> <br> <br>

                      <label for="soalan" class="col-md-4 col-form-label text-md-end">{{ __('Soalan  :') }}</label>
                      <textarea rows="5" name="soalan"  style="width:300px;height:200px" readonly="readonly">{{$question['soalan']}}</textarea>
                      <br> <br>

                      <label for="jenisPertanyaan" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Pertanyaan  :') }}</label>
                      <input type="text" name="jenisPertanyaan"  value="{{$question->jenisPertanyaan->nama_jenis_pertanyaan}}" readonly="readonly">
                    <br> <br>
                     
                      <label for="parlimen" class="col-md-4 col-form-label text-md-end">{{ __('Parlimen :') }}</label>
                      <input type="text" name="parlimen" id="parlimen" value="{{$question->parlimen->nama}}" readonly="readonly">
                     <br> <br>

                      <label for="penggal" class="col-md-4 col-form-label text-md-end">{{ __('Penggal :') }}</label>
                      <input type="text" name="penggal" id="penggal" value="{{$question->penggal->nama}}" readonly="readonly"><br> <br>

                      <label for="mesyuarat" class="col-md-4 col-form-label text-md-end">{{ __('Mesyuarat :') }}</label>
                      <input type="text" name="mesyuarat" id="mesyuarat" value="{{$question->mesyuarat->nama}}" readonly="readonly"><br> <br>

                      <label for="tarikh" class="col-md-4 col-form-label text-md-end">{{ __('Tarikh:') }}</label>
                      <input type="text" name="tarikh"  value="{{$question['tarikh']}}" readonly="readonly"> <br> <br>

                      <label for="jawapanTeks" class="col-md-4 col-form-label text-md-end">{{ __('Jawapan Teks  :') }}</label>
                      <textarea rows="4" name="jawapanTeks"  style="width:300px;height:200px"  placeholder="Sila masukkan jawapan teks jika ada" value=""></textarea>
                     <br> <br>

                      <label for="jawapan" class="col-md-4 col-form-label text-md-end">{{ __('Jawapan dalam bentuk PDF:') }}</label>
                      <input type="file" name="jawapan" value=""> <br> <br>


                      <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="action" value="accept" onclick="return confirm('Sila pastikan jawapan telah ditambah')">&nbsp &nbsp &nbspTambah Jawapan&nbsp &nbsp &nbsp</button>
                        
                            <button type="submit" class="btn btn-primary" name="action" value="share" onclick="return confirm('Agih soalan kepada penyelaras?')">Agih kepada Penyelaras</button>
                          </div>
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
