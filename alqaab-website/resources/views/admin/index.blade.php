@extends('layouts.admin')
@section('styles')
<!-- PLUGINS STYLES-->
<link href="./assets/vendors/morris.js/morris.css" rel="stylesheet" />
<!-- THEME STYLES-->
<link href="assets/css/main.min.css" rel="stylesheet" />
<!-- PAGE LEVEL STYLES-->
@endsection
@section('content')
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['count_post'] }}</h2>
                    <div class="m-b-5">Posts </div><i class="fa fa-book widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['count_page'] }}</h2>
                    <div class="m-b-5">Pages</div><i class="fa fa-file widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">{{ $data['count_user'] }}</h2>
                    <div class="m-b-5">{{ __('Users') }}</div><i class="fa fa-users widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">@php echo date("Y-m-d") @endphp</h2>
                    <div class="m-b-5">Date</div><i class="fa fa-calendar widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>-{{ __(date("l")) }}</small></div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Bar Chart</div>
                </div>
                <div class="ibox-body">
                    <div>
                        <canvas id="bar_chart_2" style="height:390px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    @if($all_view['setting']->site_name)
                    <div class="ibox-title">Chart</div>
                    @endif

                </div>
                <div class="ibox-body">
                    <div>
                        <canvas id="doughnut_chart" style="height:200px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- PAGE LEVEL PLUGINS-->
<script src="{{ asset('assets/cms/vendors/chart.js/dist/Chart.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/cms/js/scripts/charts_morris_demo.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/cms/vendors/morris.js/morris.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/cms/vendors/raphael/raphael.min.js')}}" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{ asset('assets/cms/js/app.min.js')}}" type="text/javascript"></script>
<script>
    // doughnut chart example

    var doughnutData = {
        labels: ["Posts", "Pages", "Users", "Demand Courses", "Quiz Practice", "Interview Question"],
        datasets: [{
            data: [<?php echo json_encode($data['count_post'], JSON_NUMERIC_CHECK); ?>,
                <?php echo json_encode($data['count_page'], JSON_NUMERIC_CHECK); ?>,
                <?php echo json_encode($data['count_user'], JSON_NUMERIC_CHECK); ?>,
            ],

            backgroundColor: ["#2ecc71", "#23b7e5", "#f39c12", "#3498db", "#bdc3c7", "#1abc9c"]
        }]
    };

    var doughnutOptions = {
        responsive: true
    };

    var ctx4 = document.getElementById("doughnut_chart").getContext("2d");
    new Chart(ctx4, {
        type: 'doughnut',
        data: doughnutData,
        options: doughnutOptions
    });
 // Bar Chart example
    var barData = {
        labels: ["Sunday", "Munday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        datasets: [{
                label: "Data 1",
                backgroundColor: 'green',
                data: [45, 80, 58, 74, 54, 59, 40]
            },
            {
                label: "Data 2",
                backgroundColor: '#1e81b0',
                borderColor: "#fff",
                data: [29, 48, 40, 19, 78, 31, 85]
            }
        ]
    };
    var barOptions = {
        responsive: true,
        maintainAspectRatio: false
    };

    var ctx = document.getElementById("bar_chart_2").getContext("2d");
    new Chart(ctx, {
        type: 'bar',
        data: barData,
        options: barOptions
    });
</script>
@endsection