@extends('backpack::layout')

@section('content')
<div class="row">
<div class="col-md-14">
@include('vendor.backpack.base.widgets.smallBox')
    <div class="row">
      <div class="col-md-10">
      <div class="col-md-10">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Statistik Kendaraan</h2>
          </div>

          <div class="panel-body">
              <canvas id="chartKendaraan" width="600" height="250"></canvas>
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
        labels: {!! json_encode($merk) !!},
        datasets: [{
            label: 'Jumlah Kendaraan',
            data: {!! json_encode($kendaraan) !!},
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

    var ctx = document.getElementById("chartKendaraan").getContext("2d");

    var authorChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
    </script>
@endsection

