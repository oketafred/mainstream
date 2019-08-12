@extends('admin.master')

@section('content')
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="mailbox">
					<div class="mailbox-header">
						<div class="row">
							<div class="col-xs-12">
								<div class="inbox-avatar">
									<div class="inbox-avatar-text hidden-xs hidden-sm">
										<div>
											<h4><i class="fa fa-list"></i>  
											List of Submissions Received</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mailbox-body">
						<div class="row m-0">
							<div class="col-xs-12 col-sm-12 col-md-12 p-0 inbox-mail">
								<div class="mailbox-content">
									@forelse($submissions as $submission)
									<a href="{{ route('submission_detail', $submission->id) }}" class="inbox_item unread">
										<div class="inbox-avatar"><img src="{{ asset('assets/dist/img/avatar.png') }}" class="border-green hidden-xs hidden-sm" alt="">
											<div class="inbox-avatar-text">
												<div class="avatar-name">{{ $submission->patient_name }}</div>
												<div><small><span class="bg-green badge avatar-text">Submitted</span></small></div>
											</div>
											<div class="inbox-date hidden-sm hidden-xs hidden-md">
												<div class="date">
													{{ $submission->created_at }}
												</div>
											</div>
										</div>
									</a>
									@empty
									<div class="text-center" style="margin: 20px 0px">
										<i class="fa fa-warning fa-5x"></i>
										<h4>You have no submissions available</h4>
									</div>
									@endforelse
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.content -->
</div>




<!--Modal Starts Here-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h1 class="modal-title">Modal title</h1>
			</div>
			<div class="modal-body">
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
					layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
					using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web
					page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web
					sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on
				purpose (injected humour and the like).</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<!--Modal Ends Here-->
@endsection