@extends('admin.master')

@section('styles')
<link href="{{ asset('assets/summernote/summernote.css') }}" rel="stylesheet">
@endsection

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
			<h1> Patient Profile</h1>
			<small> Patient Personal Details</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Patient</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-group" id="accordion">
					<!--        Bio Data            -->
					<div class="panel panel-success">
						<div class="panel-heading bg-success">
							<a data-toggle="collapse" data-parent="#accordion" href="#bio-data">
								<h3 class="panel-title text-white">Bio Data</h3>
							</a>
						</div>
						<div id="bio-data" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-3">
										<img src="{{ asset("uploads/user-images/" . $patient->avatar ) }}"
										class="img-responsive img-circle">
										<form method="post" class="" action="{{route('patient_avatar', $patient->id)}}" enctype="multipart/form-data">
											{{csrf_field()}}
											<div class="form-group">
												<label>Update Profile photo</label>
												<input type="file" name="avatar" class="form-control" required>
												<p class="text-muted">Formats: jpeg,jpg,bmp,png</p>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-primary">Upload</button>
											</div>
										</form>
									</div>
									<div class="col-lg-9" style="font-size: 15px;">
										<table class="table table-striped table-hover table-sm">
											<tbody>
												<tr>
													<th>Name</th>
													<td>{{$patient->last_name}} {{$patient->middle_name}} {{$patient->first_name}}</td>
													<th>Phone</th>
													<td>{{$patient->phone}}</td>
												</tr>
												<tr>
													<th>Age</th>
													<td>{{$patient->dob->age}}</td>
													<th>Email</th>
													<td>{{$patient->email}}</td>
												</tr>
												<tr>
													<th>Gender</th>
													<td>{{ucfirst($patient->gender)}}</td>
													<th>District</th>
													<td>{{$patient->district}}</td>
												</tr>
												<tr>
													<th>Marital Status</th>
													<td>{{ucfirst($patient->marital_status)}}</td>
													<th>Address</th>
													<td></td>
												</tr>
												<tr>
													<th>Patient ID</th>
													<td>{{$patient->patient_code}}</td>
												</tr>
												<tr>
													<th>NIN</th>
													<td>{{$patient->nid_number}}</td>
												</tr>
												<tr>
													<th>Passport</th>
													<td>{{$patient->passport_number}}</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--  Medical Records -->
					<div class="panel panel-success">
						<div class="panel-heading bg-success">
							<a data-toggle="collapse" class="" data-parent="#accordion" href="#vitals-data">
								<h3 class="panel-title text-white">Medical Records</h3>
							</a>
						</div>
						<div id="vitals-data" class="panel-collapse collapse">
							<div class="panel-body table-responsive">
								<div class="form-group">
									<!-- Modal Button -->
									<button class="btn btn-success md-trigger m-b-5 m-r-2" data-toggle="modal"
									data-target="#myModal" data-modal="add-vital-modal">Add
									Medical Record
								</button>
								<!-- /Modal Button -->
							</div>
							<table class="table table-condensed text-center">
								<thead>
									<tr>
										<th>Recorded</th>
										<th>Clincal Summary</th>
										<th>Macroscopic Appearance</th>
										<th>Microscopic Appearance</th>
										<th>Conclusion</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@forelse($treatments as $treatment)
									<tr>
										<td>{{ $treatment->recorded_at->diffForHumans() }}</td>
										<td>{{ substr($treatment->clinical_summary, 0, 100) }}</td>
										<td>{{ substr($treatment->macrosocopic_appearance, 0, 100) }}</td>
										<td>{{ substr($treatment->microsocopic_appearance, 0, 100) }}</td>
										<td>{{ substr($treatment->conclusion, 0, 100) }}</td>
										<td>{{-- <button class="btn btn-success md-trigger m-b-5 m-r-2"
											data-toggle="modal"
											data-target="#view_details_modal"
											data-modal="upload-documents-modal">View</button> --}}</td>
											<td><a href="{{ route('medical_report', $treatment->id) }}" target="_blank" class="btn btn-danger btn-sm">Print</a></td>
										</tr>
										@empty

										<tr>
											<td colspan="7" class="text-center">No Medical History Available</td>
										</tr>

										@endforelse
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="panel panel-success">
						<div class="panel-heading bg-success">
							<a data-toggle="collapse" data-parent="#accordion" href="#prescriptions-data">
								<h3 class="panel-title text-white">Documents</h3>
							</a>
						</div>
						<div id="prescriptions-data" class="panel-collapse collapse">
							<div class="box-body">
								<div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="form-group">
												<!-- Modal Button -->
												<button class="btn btn-success md-trigger m-b-5 m-r-2"
												data-toggle="modal"
												data-target="#upload-documents-modal"
												data-modal="upload-documents-modal"><i class="fa fa-plus"></i>
												Add New
											</button>
											<!-- /Modal Button -->
										</div>
									</div>
									<div class="panel-body">
										<table class="table">
											<tbody>
												@forelse($documents as $document)
												<tr>
													<td width="15%">{{$document->uploaded_at->toFormattedDateString()}}</td>
													<td class="text-left">{{$document->description}}</td>
													<td class="text-right">
														<button class="btn btn-info btn-sm" data-toggle="modal"
														data-target="#view_details_document"
														data-modal="view_details_document">
														<i class="fa fa-file"></i> View
													</button>
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="3">No documents</td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Upload Documents Modal-->
			<div class="modal md-modal md-effect-1" id="upload-documents-modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
								<h3 class="modal-title">Upload Documents</h3>
							</div>
							<div class="modal-body">
								<form action="{{route('documents')}}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<div class="row">
										<div class="form-group col-md-12">
											<input type="hidden" name="patient_id" value="{{$patient->patient_code}}">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-12">
											<label for="documents">Upload Documents</label>
											<input type="file" id="documents" class="form-control" name="documents[]" n
											multiple>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-12">
											<label for="description">Description</label>
											<textarea class="form-control" name="description"
											value="{{old('description')}}" cols="30" rows="5"
											placeholder="Upload Description"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-danger pull-left">Cancel</button>
											<button type="submit" class="btn btn-primary pull-right">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


				<!--View Documents-->
				<div class="modal md-modal md-effect-1" id="view_details_document">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
									<h3 class="modal-title">Patient Document</h3>
								</div>
								<div class="modal-body">
									<img src="{{  $document->path }}" width="100%" height="100%">
								</div>
							</div>
						</div>
					</div>

					<!--View Medical Details-->
					<div class="modal md-modal md-effect-1" id="view_details_modal">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
										<h3 class="modal-title">Medical Record</h3>
									</div>
									<div class="modal-body">
										<h4><strong>Clincal Summary</strong></h4>
										<h4><strong></strong></h4>
										<h4><strong>Microscopic Appearance</strong></h4>
										<h4><strong>Conclusion</strong></h4>
									</div>
								</div>
							</div>
						</div>

					</section> <!-- /.content -->

				</div>



				<!--Modal Starts Here-->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h1 class="modal-title">Pathology Report</h1>
							</div>
							<div class="modal-body">
								<form action="{{ route('records') }}" method="POST" data-parsley-validate>

									{{ csrf_field() }}

									<div class="row">
										<div class="form-group col-md-12">
											<input type="hidden" name="patient_id" value="{{$patient->id}}">
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
											<label for="nature_of_specimen">Nature of Specimen</label>
											<textarea id="summernote1" name="nature_of_specimen" class="form-control" placeholder="Nature of Specimen"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-12">
											<label for="clinical_summary">Clinical Summary</label>
											<textarea id="summernote1" name="clinical_summary" class="form-control" placeholder="Clinical Summary"></textarea>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
											<label for="full_name">Macrosocopic Appearance</label>
											<textarea id="summernote2" name="macrosocopic_appearance" class="form-control" placeholder="Enter Macrosocopic Appearance"></textarea>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
											<label for="full_name">Microsocopic Appearance</label>
											<textarea id="summernote3" name="microsocopic_appearance" class="form-control" placeholder="Enter Microsocopic Appearance">
											</textarea>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
											<label for="full_name">Conclusion</label>
											<textarea id="summernote3" name="conclusion" class="form-control" placeholder="Enter Conclusion">
											</textarea>
										</div>
									</div>

									<div class="modal-footer">
										<button type="submit" class="btn btn-success">Save changes</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				@endsection


				@section('scripts')

				<!--Summernote JS-->
				<script src="{{ asset('assets/summernote/summernote.js') }}"></script>

				<script>
					$(document).ready(function() {

        // Loading Summernote
        $('#summernote1').summernote({
        	toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']]
    ]
});

        $('#summernote2').summernote({
        	toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']]
    ]
});

        $('#summernote3').summernote({
        	toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']]
    ]
});

</script>
@endsection
