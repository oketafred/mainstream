@extends('admin.master')

@section('styles')

<link rel="stylesheet" href="{{ asset('assets/plugins/parsley/parsley.css') }}">

<style>
	.required-field{
		color: red !important;
	}
	.parsley-required {
		display: none;
	}
</style>
@endsection

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon">
			<i class="fa fa-list"></i>
		</div>
		<div class="header-title">
			<h1> Patients</h1>
			<small>List of Patient</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Patients</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">

		<div class="row">
			<div class="panel panel-bd">
				<div class="panel-heading">
					<div class="panel-title">
						<div class="btn-group">
							<button class="btn btn-success md-trigger m-b-5 m-r-2" data-toggle="modal"
							data-target="#add-patient-modal"><i
							class="fa fa-plus"></i> Add patient
						</button>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<form action="{{ route('patient.search') }}" method="POST" data-parsley-validate>

					{{ csrf_field() }}

					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">Search Term</span>
							<input type="text" name="searchTerm" class="form-control" required style="height: 50px;">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="col-sm-2">

							<div class="button-group">
								<button type="button" class="btn btn-secondary btn-lg dropdown-toggle"
								data-toggle="dropdown"><span class="fa fa-search"></span> Filter By <span
								class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="javascript:void(0)" class="small" data-value="nid_number"
										tabIndex="-1">
										<input class="w-15 h-15" type="checkbox" name="filters[nid_number]"
										@if(isset($filters['nid_number'])) checked @endif/>
										&nbsp;<span class="font-size-15">NIN Number</span></a></li>
										<li><a href="javascript:void(0)" class="small" data-value="email"
											tabIndex="-1"><input type="checkbox" class="w-15 h-15" name="filters[email]"
											@if(isset($filters['email'])) checked @endif/>&nbsp;<span
											class="font-size-15">Email Address</span></a></li>
											<li><a href="javascript:void(0)" class="small" data-value="first_name"
												tabIndex="-1"><input type="checkbox" class="w-15 h-15"
												name="filters[first_name]"
												@if(isset($filters['first_name'])) checked @endif/>&nbsp;<span
												class="font-size-15">First Name</span></a></li>
												<li><a href="javascript:void(0)" class="small" data-value="last_name" tabIndex="-1"><input
													type="checkbox" class="w-15 h-15" name="filters[last_name]"
													@if(isset($filters['last_name']))checked @endif/>&nbsp;<span
													class="font-size-15">Last Name</span></a></li>
													<li><a href="javascript:void(0)" class="small" data-value="phone"
														tabIndex="-1"><input type="checkbox" class="w-15 h-15" name="filters[phone]"
														@if(isset($filters['phone']))checked @endif/>&nbsp;<span
														class="font-size-15">Phone Number</span></a></li>
														<li><a href="javascript:void(0)" class="small" data-value="passport_number"
															tabIndex="-1"><input type="checkbox" class="w-15 h-15"
															name="filters[passport_number]"
															@if(isset($filters['passport_number']))checked @endif/>&nbsp;<span
															class="font-size-15">Passport Number</span></a></li>
														</ul>
													</div>
												</div>
											</div>
											<div class="col-sm-2" id="action-btn">
												<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
											</div>
										</form>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="panel panel-bd">
									<div class="panel-body">
										<div class="col-sm-12">
											<table class="table">
												<thead>
													<tr>
														<th>Patient ID</th>
														<th>Name</th>
														<th>Gender</th>
														<th>Birth Date</th>
														<th>Age</th>
														<th>Phone</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@forelse($patients as $patient)
													<tr>
														<td>{{ $patient->patient_code }}</td>
														<td>{{ $patient->first_name }} {{ $patient->middle_name }} {{ $patient->last_name }}</td>
														<td>{{ ucfirst($patient->gender) }}</td>
														<td>{{ $patient->dob->toFormattedDateString() }}</td>
														<td>{{ $patient->age() }}</td>
														<td>{{ $patient->phone }}</td>
														<td><a href="{{ route('patient.show', $patient->patient_code) }}" class="btn btn-success btn-sm"> <i class="fa fa-info"></i> View</a></td>
													</tr>

													@empty

													<tr>
														<td colspan="7" class="text-center">
															<i class="fa fa-info-circle fa-5x"></i>
															<h4>No Patient Available</h4>
														</td>
													</tr>
													@endforelse
												</tbody>
											</table>
										</div>
									</div>
								</div>

							</div>



						</section> <!-- /.content -->

					</div>


					<!--Add Patient Modal-->
					<!-- Modal -->
					<div class="modal fade" id="add-patient-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
										<h1 class="modal-title">Patient Registration Form</h1>
									</div>
									<form action="{{ route('patient.add') }}" method="POST">
										<div class="modal-body">

											{{ csrf_field() }}

											<div class="row">
												<div class="form-group col-md-4">
													<label for="first_name">First Name</label> <span
													class="required-field">*</span>
													<input class="form-control" placeholder="Enter First Name" required="required" name="first_name" type="text" id="first_name">
												</div>
												<div class="form-group col-md-4">
													<label for="middle_name">Middle Name</label>
													<input class="form-control" placeholder="Enter Middle Name" name="middle_name" type="text" id="middle_name">
												</div>
												<div class="form-group col-md-4">
													<label for="last_name">Last Name</label> <span
													class="required-field">*</span>
													<input class="form-control" placeholder="Enter Last Name" required="required" name="last_name" type="text" id="last_name">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-4">
													<label for="gender">Gender</label> <span class="required-field">*</span>
													<select class="form-control" required="required" id="gender" name="gender"><option selected="selected" value="">Select Gender</option><option value="male">Male</option><option value="female">Female</option></select>
												</div>
												<div class="form-group col-md-4">
													<label for="dob">Date of Birth</label> <span
													class="required-field">*</span>
													<input class="form-control" placeholder="Y-m-d" required="required" name="dob" type="date" id="dob">
												</div>
												<div class="form-group col-md-4">
													<label for="blood_group">Blood Group</label>
													<select class="form-control" id="blood_group" name="blood_group"><option selected="selected" value="">Select Blood Group</option><option value="A+">A+</option><option value="A-">A-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="B+">B+</option><option value="B-">B-</option><option value="O+">O+</option><option value="O-">O-</option></select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-4">
													<label for="nid_number">NIN Number</label>
													<input class="form-control" placeholder="ID Number" name="nid_number" type="text" id="nid_number">
												</div>
												<div class="form-group col-md-4">
													<label for="passport_number">Passport Number</label>
													<input class="form-control" placeholder="Passport Number" name="passport_number" type="text" id="passport_number">
												</div>
												<div class="form-group col-md-4">
													<label for="marital_status">Marital Status</label> <span
													class="required-field">*</span>
													<select class="form-control" required="required" id="marital_status" name="marital_status"><option selected="selected" value="">Marital Status</option><option value="single">Single</option><option value="married">Married</option><option value="divorced">Divorced</option><option value="separated">Separated</option><option value="widow">Widow</option><option value="widower">Widower</option></select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-4">
													<label for="phone">Phone Number</label>
													<input class="form-control" placeholder="Phone Number" name="phone" type="text" id="phone">
												</div>
												<div class="form-group col-md-4">
													<label for="email">Email Address</label>
													<input class="form-control" placeholder="Email Address" name="email" type="email" id="email">
												</div>
												<div class="form-group col-md-4">
													<label for="nationality">Nationality</label> <span
													class="required-field">*</span>
													<input class="form-control" placeholder="Nationality" required="required" name="nationality" type="text" id="nationality">
												</div>
											</div>

											<div class="row">
												<div class="form-group col-md-3">
													<label for="phone">Village/Zone</label>
													<span
													class="required-field">*</span>
													<input class="form-control" placeholder="Village/Zone" name="village_zone" type="text">
												</div>
												<div class="form-group col-md-3">
													<label for="email">Parish</label>
													<span
													class="required-field">*</span>
													<input class="form-control" placeholder="Parish" name="parish" type="text">
												</div>
												<div class="form-group col-md-3">
													<label for="nationality">Sub-County</label> <span
													class="required-field">*</span>
													<input class="form-control" placeholder="Sub-County" required name="subcounty" type="text">
												</div>
												<div class="form-group col-md-3">
													<label for="nationality">District</label> <span
													class="required-field">*</span>
													<input class="form-control" placeholder="District" required name="district" type="text">
												</div>
											</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary pull-right">Create Patient</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						@endsection

						@section('scripts')
						<script src="{{ asset('assets/plugins/parsley/parsley.min.js') }}"></script>
						@endsection