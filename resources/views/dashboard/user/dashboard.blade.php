<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
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
      <h3>Dashboard Pengguna</h3>
      <hr>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="dashboard">Dashboard</a></li>
        
        <li><a href="profile">Maklumat Pengguna</a></li>

        <li><a href="questionList">Carian Soalan</a></li>

        
        <li><form action="{{ route('logout') }}" method="post">
       @csrf
       <button type="submit" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log keluar
        </button>
</form>
  </li>
      </ul><br>
    </div>

    <div class="col-lg-8" style="height: 50%px; width: 70%; margin:0px 0px;">
    <h4> Dewan Rakyat Tahun 2023<h4>
            <canvas id="userChart" class="rounded shadow"></canvas>
                  </div>

                  

                  <div class="col-lg-8" style="height: 40%px; width: 70%;margin:0px 0px;">
                  <h4> Dewan Negara Tahun 2023<h4>
            <canvas id="userChart2" class="rounded shadow"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- CHARTS -->
<script>
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
// The data for our dataset
        data: {
            labels:  {!!json_encode($chart['labels'])!!} ,
            datasets: {!!json_encode($chart['datasets'])!!}
        }, 

// Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    stacked: false,
                    ticks: {
                        beginAtZero: true,
                        stepSize:1
                    },
                    scaleLabel: {
                        display: true,
                    }
                }],
                xAxes: [{
                    stacked: false,
                    
                }],
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 10,
                    bottom: 10
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('userChart2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
// The data for our dataset
        data: {
            labels:  {!!json_encode($chart2['labels'])!!} ,
            datasets: {!!json_encode($chart2['datasets'])!!}
        }, 

// Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    stacked: false,
                    ticks: {
                        beginAtZero: true,
                        stepSize:1
                    },
                    scaleLabel: {
                        display: true,
                    }
                }],
                xAxes: [{
                    stacked: false,
                    
                }], 
            },
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    fontColor: '#122C4B',
                    fontFamily: "'Muli', sans-serif",
                    padding: 25,
                    boxWidth: 25,
                    fontSize: 14,
                }
            },
            layout: {
                padding: {
                    left: 10, 
                    right: 10,
                    top: 0,
                    bottom: 10
                }
            }
        }
    });
</script>

</body>
</html>
