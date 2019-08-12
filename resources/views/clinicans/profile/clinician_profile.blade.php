@extends('clinicans.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon"><i class="pe-7s-user-female"></i></div>
		<div class="header-title">
			<form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>   
			<h1>Profile</h1>
			<small>Clinican User Profile</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i>Home</a></li>
				<li class="active">Profile</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<div class="card">
					<div class="card-header">
						<div class="card-header-headshot"></div>
					</div>
					<div class="card-content">
						<div class="card-content-member">
							<h4 class="m-t-0">{{ Sentinel::getUser()->last_name }} {{ Sentinel::getUser()->first_name }}</h4>
							<p class="m-0"><i class="fa fa-inbox"></i>{{ Sentinel::getUser()->email }}</p>
						</div>
						<div class="card-content-languages">
							<div class="card-content-languages-group">
								<div>
									<h4>Name:</h4>
								</div>
								<div>
									<ul>
										<li>{{ Sentinel::getUser()->last_name }} {{ Sentinel::getUser()->first_name }}
											<div class="fluency fluency-4"></div>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-content-languages-group">
								<div>
									<h4>Email:</h4>
								</div>
								<div>
									<ul>
										<li>{{ Sentinel::getUser()->email }}</li>
									</ul>
								</div>
							</div>
							<div class="card-content-languages-group">
								<div>
									<h4>Gender:</h4>
								</div>
								<div>
									<ul>
										<li>{{ Sentinel::getUser()->gender }}</li>
									</ul>
								</div>
							</div>
							<div class="card-content-languages-group">
								<div>
									<h4>Phone:</h4>
								</div>
								<div>
									<ul>
										<li>{{ Sentinel::getUser()->telephone_number }}</li>
									</ul>
								</div>
							</div>
							<div class="card-content-languages-group">
								<div>
									<h4>Address:</h4>
								</div>
								<div>
									<ul>
										<li>{{ Sentinel::getUser()->address }}</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-8">
				<div class="review-block">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="m-t-0"><i class="fa fa-lock"></i> Change Password</h3>
							<div class="review-block-title">
								<form action="{{ route('clinican.reset.password.complete') }}" method="POST">

									{{ csrf_field() }}
									<div class="form-group">
										<label for="old_password">Current Password</label>
										<input type="password" name="old_password" class="form-control" placeholder="Current Password">
									</div>
									<div class="form-group">
										<label for="new_password">New Password</label>
										<input type="password" name="password" class="form-control" placeholder="New Password">
									</div>
									<div class="form-group">
										<label for="password">Confirm Password</label>
										<input type="password" name="password confirmation" class="form-control" placeholder="Password Confirmation">
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">Update Info </button>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div> 
	</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
@endsection