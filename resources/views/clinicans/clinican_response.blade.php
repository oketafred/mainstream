@extends('clinicans.master')

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
                                         List of My Response</h4>
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
                                @forelse($responses as $response)
                                <a href="{{ route('clinican_response_detail', $response->submissions_id) }}" class="inbox_item unread">
                                    <div class="inbox-avatar"><img src="{{ asset('assets/dist/img/avatar.png') }}" class="border-green hidden-xs hidden-sm" alt="">
                                        <div class="inbox-avatar-text">
                                            <div class="avatar-name">{{ $response->patient_name }}</div>
                                            <div><small><span class="bg-green badge avatar-text">SOME LABEL</span><span><strong>Early access: </strong><span> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span></span></small></div>
                                        </div>
                                        <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                            <div class="date">Jan 17th</div>
                                            <div><small>#1</small></div>
                                        </div>
                                    </div>
                                </a>
                                @empty

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