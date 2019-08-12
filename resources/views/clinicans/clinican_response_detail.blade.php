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
                            <div class="col-xs-4">
                                <div class="inbox-avatar"><img src="{{ asset('assets/dist/img/user2-160x160.png') }}" class="img-circle border-green" alt="">
                                    <div class="inbox-avatar-text hidden-xs hidden-sm">
                                        <div class="avatar-name">
                                           {{ Sentinel::getUser()->first_name }}
                                           {{ Sentinel::getUser()->last_name }}
                                       </div>
                                       <div><small>Clinican Account</small></div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-xs-8">
                            <div class="inbox-toolbar btn-toolbar">
                                <div class="btn-group">
                                    <a href="{{-- {{ route('patients') }} --}}" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mailbox-body">
                    <div class="row m-0">
                        <div class="col-xs-12 col-sm-12 col-md-12 p-0 inbox-mail">
                            <div class="inbox-avatar p-20 border-btm">
                                <img src="assets/dist/img/avatar5.png" class="border-green hidden-xs hidden-sm" alt="">
                                <div class="inbox-avatar-text">
                                    <div class="avatar-name"><strong>To: </strong> <em>Mainstream Biomedical Centre </em>
                                    </div>
                                    <div><small><strong>Patient Name: </strong> {{ $response_detail->patient_name }}</small></div>
                                </div>
                                <div class="inbox-date text-right hidden-xs hidden-sm">
                                    <div><span class="bg-red badge"><small>Submitted Successfully</small></span></div>
                                    <div><small>{!! $response_detail->created_at !!}</small></div>
                                </div>
                            </div>
                            <div class="inbox-mail-details p-20">
                                <p><strong>Hi Mainstream Biomedical Centre,</strong></p>
                                <p>
                                    Medical Lab Report - For 
                                    <span>{!! $response_detail->patient_name !!}</span>
                                </p>

                                <p>
                                    <a target="_blank" href="{{ route('clinican_response_detail', $response_detail->id) }}"  download="{{ $response_detail->report }}">
                                        <i class="fa fa-file-pdf-o fa-5x"></i>
                                        View Lab Report 
                                    </a>
                                </p>

                                <div><strong>Regards,</strong></div>
                                <div><strong>Mainstream Biomedical Centre</strong></div>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

@endsection