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
            <h1>Clinican</h1>
            <small>Add Clinican</small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">Clinican</li>
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
                            <a class="btn btn-primary" href="{{ route('clinican_lists') }}"> <i class="fa fa-list"></i>  Clinican List </a>  
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('store_clinican') }}" method="POST" class="col-sm-12" enctype="multipart/form-data" data-parsley-validate>
                            {{ csrf_field() }}
                            <div class="col-sm-6 form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Enter firstname" name="first_name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter Lastname" name="last_name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="address" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Telephone Number</label>
                                <input type="number" class="form-control" placeholder="Enter Mobile" name="telephone_number" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Health Facility</label>
                                <select name="health_facility_id" class="form-control" required>
                                    <option value="">Select Facilty</option>
                                    @foreach($health_facilities as $health_facility)
                                    <option value="{{ $health_facility->id }}">{{ $health_facility->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Specialist</label>
                                <input type="text" class="form-control" placeholder="Specialist" name="specialist" required>
                            </div>

                            <div class="col-sm-4 form-group">
                                <label >Picture upload</label>
                                <input type="file" name="photo" id="picture" required>
                            </div> 
                            <div class="col-sm-2 form-group">
                                <label>Sex</label><br>
                                <label class="radio-inline">
                                    <input type="radio" required name="gender" value="Male">Male</label> 
                                    <label class="radio-inline"><input type="radio" name="gender" required value="Female" >Female</label>
                                </div> 
                                <div class="col-sm-12 form-group">
                                    <label>Short Biography</label>
                                    <textarea id="some-textarea" class="form-control" rows="3" placeholder="Enter text ..." name="biography"></textarea>
                                </div>  
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-plus"></i>
                                    Add Clinican</button>
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