@extends('clinicans.master')

@section('styles')
<link href="{{ asset('assets/summernote/summernote.css') }}" rel="stylesheet">

<!-- Datepicker -->
<link href='{{ asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}' rel='stylesheet' type='text/css'>

<!--Parlsey CSS-->
<link rel="stylesheet" href="{{ asset('assets/parlsey/parlsey.min.css') }}">

@endsection

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
                                <div class="inbox-avatar">
                                    <div class="inbox-avatar-text hidden-xs hidden-sm">
                                        <div>
                                         <h4><i class="fa fa-list"></i>  
                                         List of My Medical Submissions</h4>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-xs-8">
                            <div class="inbox-toolbar btn-toolbar">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <span class="fa fa-pencil-square-o"></span>
                                        New Submission
                                    </button>

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
                                <a href="{{ route('clinican_submission_detail', $submission->id) }}" class="inbox_item unread">
                                    <div class="inbox-avatar"><img src="{{ asset('assets/dist/img/avatar.png') }}" class="border-green hidden-xs hidden-sm" alt="">
                                        <div class="inbox-avatar-text">
                                            <div class="avatar-name">{{ $submission->patient_name }}</div>
                                            <div><small><span class="bg-green badge avatar-text">Success</span></small></div>
                                        </div>
                                        <div class="inbox-date hidden-sm hidden-xs hidden-md">
                                            <div class="date">{{ $submission->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <div class="text-center" style="margin: 20px 0px">
                                    <i class="fa fa-warning fa-5x"></i>
                                    <h4>You have no submissions at the moment</h4>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">New Case Submission</h1>
            </div>
            <div class="modal-body">
                <form action="{{ route('store_clinican_submission') }}" method="POST" data-parsley-validate>

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="full_name">Name of the Patient</label>
                            <input type="text" name="patient_name" class="form-control" placeholder="Enter Name of the Patient" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phy_surg">Phys/Surg</label>
                            <input type="text" name="phy_surg" class="form-control" placeholder="Enter Phy/Surg" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="age">Age</label>
                            <input type="number" name="patient_age" class="form-control" min="1" placeholder="Enter Age" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="patient_number">Patient Number</label>
                            <input type="text" name="patient_number" class="form-control" placeholder="Patient Number" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="health_unit">Health Unit</label>
                            <input type="text" name="health_unit" class="form-control" readonly value="{{ $health_facility->name }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="village_zone">Village/Zone</label>
                            <input type="text" name="village_zone" class="form-control" placeholder="Enter Village/Zone" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="parish">Parish</label>
                            <input type="text" name="parish" class="form-control" placeholder="Enter Parish" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="sub_county">Sub-County</label>
                            <input type="text" name="sub_county" class="form-control" placeholder="Enter Sub-County" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="district">District</label>
                            <input type="text" name="district" class="form-control" placeholder="Enter District" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="nature_specimen">Nature of Specimen</label>
                            <textarea id="summernote" required type="text" name="nature_specimen" class="form-control" placeholder="Enter Nature of Specimen"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="date_of_request">Date of Request</label>
                            <input type="date" id="datepicker12" name="date_of_request" class="form-control" placeholder="Click to Choose Date" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_of_reciept">Date of Reciept</label>
                            <input type="date" id="datepickerw2" name="date_of_reciept" class="form-control" placeholder="Click to Choose Date" required>
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
</div>

<!--Modal Ends Here-->

@endsection

@section('scripts')

<!--Summernote JS-->
<script src="{{ asset('assets/summernote/summernote.js') }}"></script>
<!--DatePicker JS-->
<script src='{{ asset('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}' type='text/javascript'></script>
<!--Parlsey JS-->
<script src="{{ asset('assets/parlsey/parlsey.min.js') }}"></script>

<script>
    $(document).ready(function() {

        // Loading Summernote
        $('#summernote').summernote();

        // Loading Date Picker
        $('#datepicker1').datepicker({
            "format": "dd-mm-yy"
        }); 
        $('#datepicker2').datepicker({
            "format": "dd-mm-yy"
        }); 
    });

</script>
@endsection