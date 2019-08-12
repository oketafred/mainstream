@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon">
			<i class="pe-7s-note2"></i>
		</div>
		<div class="header-title">   
			<h1>List of Treatments</h1>
			<small>Treatments</small>
			<ol class="breadcrumb hidden-xs">
				<li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
				<li class="active">Treatments</li>
			</ol>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-bd lobidrag">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Patient Code</th>
										<th>Patient Name</th>
										<th>Recorded At</th>
									</tr>
								</thead>
								<tbody>
									@forelse($treatments as $treatment)
									<tr >  
										<td>{{ $treatment->id }}</td>
										<td>{{ $treatment->patient->patient_code }}</td>
										<td>{{ $treatment->patient->last_name }} {{ $treatment->patient->middle_name }} {{ $treatment->patient->first_name }}</td>
										<td>{{ $treatment->created_at->diffForHumans() }}</td>
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

