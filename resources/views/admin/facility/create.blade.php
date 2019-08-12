@extends('admin.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/parsley/parsley.css') }}">

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>   
            <h1>Health Facilities</h1>
            <small>Add Health Facility</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Facilities</li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="btn-group"> 
                          <a class="btn btn-primary" href="{{ route('facility_lists') }}"> <i class="fa fa-list"></i>  Health Facility List</a>  
                      </div>
                  </div>
                  <div class="panel-body">

                    <form action="{{ route('store_facility') }}" method="POST" data-parsley-validate>

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Health Facility Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Health Facility Name" required >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Health Facility Location</label>
                                <input type="text" name="location" class="form-control" placeholder="Enter Health Facility Location" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>District</label>
                                <input type="text" name="district" class="form-control" placeholder="Enter District" required>
                            </div>
                        </div>   

                        <div class="row">
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>

</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/parsley/parsley.min.js') }}"></script>
@endsection