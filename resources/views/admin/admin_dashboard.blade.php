@extends('admin.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <div class="header-icon">
        <i class="fa fa-tachometer"></i>
    </div>
    <div class="header-title">
        <h1> Dashboard</h1>
        <small> Admin Dashboard</small>
        <ol class="breadcrumb hidden-xs">
            <li><a href="index-2.html"><i class="pe-7s-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="panel panel-bd">
                <a href="{{ route('facility_lists') }}">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">{{ $health_facilities_count }}</span></h2>
                            <div class="small">Health Facilities</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="panel panel-bd">
                <a href="{{ route('clinican_lists') }}">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">{{ $clinicans_count }}</span></h2>
                            <div class="small">Total Clinicans</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="panel panel-bd">
                <a href="{{ route('patients.list') }}">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">{{ $patients_count }}</span></h2>
                            <div class="small">Total Patients</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="panel panel-bd">
                <a href="{{ route('treatment_lists') }}">
                    <div class="panel-body">
                        <div class="statistic-box">
                            <h2><span class="count-number">{{ $treatments_count }}</span></h2>
                            <div class="small">Total Treatments</div>
                            <div class="sparkline4"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Bar Chart -->
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Total Health Facility against Total Clinicans</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <canvas id="barChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <!-- Radar Chart -->
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Total Patients against Total Treatments</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <canvas id="radarChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div> <!-- /.row -->

</section> <!-- /.content -->

</div>
@endsection

@section('scripts')
<script>
        //Pie Chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($first_pie_chart['groups']) !!},
                datasets: [{
                    label: '# of Votes',
                    data: {!! json_encode($first_pie_chart['data']) !!},
                    backgroundColor: [
                    '#ffc107',
                    '#3f9788'
                    ],
                    borderColor: [
                    '#ffc107',
                    '#3f9788'
                    ],
                    borderWidth: 1
                }]
            },
            options: {}
        });
      //radar chart
      // var ctx = document.getElementById("radarChart");
      var ctx = document.getElementById('radarChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($second_pie_chart['groups']) !!},
            datasets: [{
                label: '# of Votes',
                data: {!! json_encode($second_pie_chart['data']) !!},
                backgroundColor: [
                '#007bff',
                '#dc3545'
                ],
                borderColor: [
                '#007bff',
                '#dc3545'
                ],
                borderWidth: 1
            }]
        },
        options: {}
    });
</script>
@endsection
