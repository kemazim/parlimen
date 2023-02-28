<!DOCTYPE html>
<html lang="en">
<head>
  <title>Carian Soalan</title>
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
      <h3>Carian &nbsp &nbsp &nbsp &nbsp Soalan </h3>
      <hr>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="dashboard">Dashboard</a></li>
        
        <li><a href="profile">Maklumat Pengguna</a></li>

        <li class="active"><a href="questionList">Carian Soalan</a></li>

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
      <h2><small>Senarai Soalan</small></h2>
      <hr>
      @if (session('status'))
                <h5 class="alert alert-success">{{ session('status') }}</h5>
            @endif

                  <form action="" class="col-9">
              <div class="form-group">
                <input type="search" name="search" id="" class="form-control" placeholder="Sila isi katakunci" />
          
            <button class="btn btn-primary"> &nbsp Carian &nbsp </button>
            </div>
            </form> 

            <table class="table table-striped">
                <tr>
                <th>BIL.</th>
                    <th>Rujukan</th> 
                    <th>Yang Berhormat</th>
                    <th>Tarikh</th> 
                    <th>Jenis Pertanyaan</th>
                    <th>Soalan</th> 
                    <th>Jawapan</th> 
                    <th>Tindakan</th>
                </tr>
                @if(!empty($questions) && $questions->count())
             @foreach($questions as $question)
                <tr> 
                <td scope="row">{{ $questions->firstItem() + $loop->index }}</td>
                    <td>{{$question['rujukan']}}</td>
                    <td>{{$question->yangBerhormat->nama}}</td>
                    <td>{{$question['tarikh']}}</td>
                    <td>{{$question->jenisPertanyaan->nama_jenis_pertanyaan}}</td>
                    <td>{{$question['soalan']}}</td>
                    <td>{{$question['jawapanTeks']}}</td>
                    <td>
                    @if (empty($question->jawapan))
                    <button disabled>Tiada paparan PDF</button>
                    @else
                    <a href="{{url('coordinator/viewJawapan',$question->id)}}" class="btn btn-success">&nbsp &nbsp Papar &nbsp &nbsp</a></td>
                    @endif
                  </tr>
  @endforeach  
  @else
                <tr>
                    <td colspan="10">Tiada Data Untuk Dipaparkan.</td>
                </tr>
            @endif
</table>
<div class="text-center">
{{ $questions->links() }}
</div>


    </div> 
  </div>
</div>

</body>
</html>
