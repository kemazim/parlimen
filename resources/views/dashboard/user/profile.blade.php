<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h4>Profile</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="dashboard">Home</a></li>
        <li class="active"><a href="profile">User Profile</a></li>

        <li><form action="{{ route('logout') }}" method="post">
       @csrf
       <button type="submit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
</form>
  </li>
      </ul><br>
    </div>

 <div class="col-sm-9">
              <h4>Maklumat {{Auth::user()->nama}}</h4>
            <hr>

            <table class="table">
                <tr>
                    <td>Nombor Kad Pengenalan</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Nombor telefon bimbit</td>
                    <td>Peranan</td>
                    <td>Status</td>
                    <td>Test</td>
                </tr>
                <tr>
                    <td>{{Auth::user()->nomborKadPengenalan}}</td>
                    <td>{{Auth::user()->nama}}</td>
                    <td>{{Auth::user()->email}}</td>
                    <td>{{Auth::user()->nomborTelefonBimbit}}</td>
                    <td>{{Auth::user()->perananString}}</td>
                    <td>{{Auth::user()->statusString}}</td>
                    <td>
                        </td>
                </tr>
            </div>   

            </div>         
            </div>   

</body>     
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>  