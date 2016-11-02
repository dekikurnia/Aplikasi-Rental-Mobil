@extends('backpack::layout')

@section('content')
    <div class="row">
      <div class="col-md-12">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Dashboard</h2>
          </div>

          <div class="panel-body">
              Selamat datang di Menu Admin. Silahkan pilih menu administrasi yang diinginkan.
              <hr>
              <h4>Statistik Merk</h4>
              <canvas id="chartMerk" width="400" height="150"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('after_scripts')
    <script src="/js/Chart.min.js"></script>
    <script>
    var data = {
        labels: {!! json_encode($type) !!},
        datasets: [{
            label: 'Jumlah Merk',
            data: {!! json_encode($merk) !!},
            backgroundColor: "rgba(49, 152, 255, 0.9)",
            borderColor: "black",
        }]
    };

    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    stepSize: 1
                }
            }]
        }
    };

    var ctx = document.getElementById("chartMerk").getContext("2d");

    var authorChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
    </script>
@endsection

