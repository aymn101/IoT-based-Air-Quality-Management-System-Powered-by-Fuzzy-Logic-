
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> 
    <title>Classroom 1</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> 

    <style>
        .text {
            text-align: center;
            margin-bottom: 34px;
            font-family: cursive;
            font-weight: bold;
            text-shadow: 2px 2px #fafafa;
        }
        body {
            background-color: #557270 !important;
        }
        .value-text {
            text-align: center;
            font-size: 30px;
        }
    </style>
</head>

<body>





    <section>
        <h1 class="text">Graph for Carbon dioxide</h1>
        <div class="container-fluid">
            <div class="dashboard">
                <div class="">
                    <div class="grid-item temp">
                        <div class="card">
                            <div class="custom-header card-header">CO2<span class="badge badge-info float-right"></span></div>
                            <div class="card-body value-text">Value = <span class="badge badge-info float-right" id="CO2_data"></span></div>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <canvas id="CO2graph" class="chartjs" style="position: relative; height:40vh; width:40vw"></canvas>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    setInterval(ajaxcall,5000);
    function  ajaxcall(){

    $.getJSON('/route/MQ135_route', function(blocksall){
        var datas = blocksall.blocks.map(Number);
        datas = datas.reverse();
        console.log(datas)

        var datasx = blocksall.blocks2.map(String);
        datasx = datasx.reverse();
        console.log(datasx)
        var HumidityValue = datas[datas.length - 1].toFixed(2);
        document.getElementById("CO2_data").innerHTML = HumidityValue;  //.style.color="green" //warna data
        document.getElementById("CO2_data").style.color = "#8f0b24";
        var chart = new Chart(document.getElementById('CO2graph'), //mesti sama dgn id
        {
            type: 'line',
            data: 
            {
                labels : datasx,
                datasets: 
                [{
                    label: 'CO2',
                    data: datas,
                    fill: false,
                    borderColor: '#FA255E',
                    backgroundcolor: 'rgb(255, 255, 0)',
                    tension: 0.1
                }]
            },
            options: {
                animation: {
                    duration: 100,
                    easing: 'easeOutBounce' //movement
                },
                scales: {
                    yAxes: [{
                        display: true,
                        stacked: true,
                        ticks: {
                            min: 0, //minimum value
                            max: 5000 //maximum value
                        }
                    }]
                }
            }
        }); 
    });
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
@endsection