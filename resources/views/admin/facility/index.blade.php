@extends('admin.master')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-box1"></i>
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
			<small>Health Facilities List</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Facilities</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-bd">
					<div class="panel-heading">
						<div class="btn-group"> 
							<a class="btn btn-success" href="{{ route('create_facility') }}"> <i class="fa fa-plus"></i>  Add Health Facility</a>  
						</div>
					</div>
					<div class="panel-body">

						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Health Facilty Name</th>
										<th>Location</th>
										<th>District</th>
										<th>Added_At</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($health_facilities as $health_facility)
									<tr >
										<td>
											<label>{{ $health_facility->id }}</label>   
										</td>
										<td>{{ $health_facility->name }}</td>
										<td>{{ $health_facility->location }}</td>
										<td>{{ $health_facility->district }}</td>
										<td>{{ $health_facility->created_at->diffForHumans() }}</td>
										<td>
											<button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
										</td>
									</tr>
									@empty
									
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
@endsection