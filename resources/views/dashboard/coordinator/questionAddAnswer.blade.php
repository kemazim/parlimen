<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kemaskini Jawapan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
 .row.content {height: 1000px}
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
      <h3>Kemaskini &nbsp &nbsp &nbsp Jawapan </h3>
      <hr>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="/coordinator/dashboard">Dashboard</a></li>
        
        <li><a href="/coordinator/profile">Maklumat Pengguna</a></li>

        <li><a href="/coordinator/questionList">Carian Soalan</a></li>

        <li class="active"><a href="/coordinator/questionEdit">Kemaskini Jawapan</a></li>
        
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
    <form method="POST" action="{{ url('coordinator/questionSaveAnswer/'.$question->id) }}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
                      <label for="rujukan" class="col-md-4 col-form-label text-md-end">{{ __('Rujukan  :') }}</label>
                      <input type="text" name="rujukan" value="{{$question['rujukan']}}" readonly="readonly"> <br> <br>

                      <label for="soalan" class="col-md-4 col-form-label text-md-end">{{ __('Soalan  :') }}</label>
                      <textarea rows="5" name="soalan"  style="width:300px;height:200px">{{$question['soalan']}}</textarea>
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
                      
      <button class="btn btn-primary" type="submit" onclick="return confirm('Simpan kemaskini jawapan?')">Kemaskini Jawapan</button>
      <br><br>
    </div>
  </div>
</div>



</body>

</html>
