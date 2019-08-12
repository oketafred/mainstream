@extends('admin.master')

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
                                <div class="inbox-avatar"><img src="{{ asset('assets/dist/img/user2-160x160.png') }}" class="img-circle border-green" alt="">
                                    <div class="inbox-avatar-text hidden-xs hidden-sm">
                                        <div class="avatar-name">
                                           {{ Sentinel::getUser()->first_name }}
                                           {{ Sentinel::getUser()->last_name }}
                                       </div>
                                       <div><small>Admin Account</small></div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-xs-8">
                            <div class="inbox-toolbar btn-toolbar">
                                <div class="btn-group">
                                    <a href="{{ route('admin_dashboard') }}" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
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
                                    <div class="avatar-name"><strong>Medical </strong>
                                        Submissions From - <em>{{ $submission_detail->health_unit }} </em>
                                    </div>
                                    <div><small><strong>Patient Name: </strong>  {{ $submission_detail->patient_name }} </small></div>
                                </div>
                                <div class="inbox-date text-right hidden-xs hidden-sm">
                                    <div>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                            Send Lab Report
                                        </button>
                                    </div>
                                    <div><small> {{ $submission_detail->created_at }} </small></div>
                                </div>
                            </div>
                            <div class="inbox-mail-details p-20">
                                <p><strong>Hi Mainstream Biomedical Centre,</strong></p>
                                <p><span>{!! $submission_detail->nature_of_specimen !!}</span></p>

                                <div><strong>Regards,</strong></div>
                                <div><strong>{{ $submission_detail->user->first_name }} {{ $submission_detail->user->last_name }}</strong></div>
                                <hr>

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
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Send Lab Report</h1>
            </div>
            <div class="modal-body">
                <form action="{{ route('send_report') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="submission_id" value="{{ $submission_detail->id }}" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">

                            <label for="lab_report">Lab Report</label>
                            <input type="file" name="report" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Send Report</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!--Print Model-->
<div id="printThis">
    <div id="myModalPrint" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <!-- Modal Content: begins -->
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="gridSystemModalLabel">Your Headings</h4>
              </div>

              <!-- Modal Body -->  
              <div class="modal-body">
                <div class="body-message">
                  <h4>Any Heading</h4>
                  <p>And a paragraph with a full sentence or something else...</p>
              </div>
          </div>

          <!-- Modal Footer -->
          <div class="modal-footer">
           <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
           <button id="btnPrint" type="button" class="btn btn-default">Print</button>
       </div>

   </div>
   <!-- Modal Content: ends -->

</div>
</div>
</div>

<!--/Print Model-->

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


        // JavaScript for Print Preview
        document.getElementById("btnPrint").onclick = function () {
            printElement(document.getElementById("printThis"));
        }

        function printElement(elem) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            window.print();
        }

    });

</script>
@endsection