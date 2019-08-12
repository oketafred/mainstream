<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mainstream Biomedical Centre - Admin Dashboard</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/ico/favicon.png') }}" type="image/x-icon">
   <!-- Start Global Mandatory Style
       =====================================================================-->
       <!-- jquery-ui css -->
       <link href="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"/>
       <!-- Bootstrap -->
       <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
       <!-- Bootstrap rtl -->
       <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
       <!-- Lobipanel css -->
       <link href="{{ asset('assets/plugins/lobipanel/lobipanel.min.css') }}" rel="stylesheet" type="text/css"/>
       <!-- Pace css -->
       <link href="{{ asset('assets/plugins/pace/flash.css') }}" rel="stylesheet" type="text/css"/>
       <!-- Font Awesome -->
       <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
       <!-- Pe-icon -->
       <link href="{{ asset('assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
       <!-- Themify icons -->
       <link href="{{ asset('assets/themify-icons/themify-icons.css') }}" rel="stylesheet" type="text/css"/>
        <!-- End Global Mandatory Style
            =====================================================================-->
        <!-- Start page Label Plugins
            =====================================================================-->
            <!-- Toastr css -->
            <link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css"/>
            <!-- Emojionearea -->
            <link href="{{ asset('assets/plugins/emojionearea/emojionearea.min.css') }}" rel="stylesheet" type="text/css"/>
            <!-- Monthly css -->
            <link href="{{ asset('assets/plugins/monthly/monthly.css') }}" rel="stylesheet" type="text/css"/>
        <!-- End page Label Plugins
            =====================================================================-->
        <!-- Start Theme Layout Style
            =====================================================================-->
            <!-- Theme style -->
            <link href="{{ asset('assets/dist/css/stylehealth.min.css') }}" rel="stylesheet" type="text/css"/>
            <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
            @yield('styles')
        <!-- End Theme Layout Style
            =====================================================================-->
        </head>
        <body class="hold-transition fixed sidebar-mini">
            <!-- Site wrapper -->
            <div class="wrapper">
                @include('admin.includes.navbar')
                <!-- =============================================== -->
                <!-- Left side column. contains the sidebar -->
                @include('admin.includes.sidebar')
            </div> <!-- /.sidebar -->
        </aside>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        @include('admin.includes.footer')
    </div> <!-- ./wrapper -->
    <!-- ./wrapper -->
         <!-- Start Core Plugins
            =====================================================================-->
            <!-- jQuery -->
            <script src="{{ asset('assets/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
            <!-- jquery-ui -->
            <script src="{{ asset('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}" type="text/javascript"></script>
            <!-- Bootstrap -->
            <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
            <!-- lobipanel -->
            <script src="{{ asset('assets/plugins/lobipanel/lobipanel.min.js') }}" type="text/javascript"></script>
            <!-- Pace js -->
            <script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
            <!-- SlimScroll -->
            <script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
            <!-- FastClick -->
            <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
            <!-- Hadmin frame -->
            <script src="{{ asset('assets/dist/js/custom1.js') }}" type="text/javascript"></script>
        <!-- End Core Plugins
            =====================================================================-->
        <!-- Start Page Lavel Plugins
            =====================================================================-->
            <!-- Toastr js -->
            <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
            <!-- Sparkline js -->
            <script src="{{ asset('assets/plugins/sparkline/sparkline.min.js') }}" type="text/javascript"></script>
            <!-- Data maps js -->
            <script src="{{ asset('assets/plugins/datamaps/d3.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/plugins/datamaps/topojson.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/plugins/datamaps/datamaps.all.min.js') }}" type="text/javascript"></script>
            <!-- Counter js -->
            <script src="{{ asset('assets/plugins/counterup/waypoints.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
            <!-- ChartJs JavaScript -->
            <script src="{{ asset('assets/plugins/chartJs/Chart.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/plugins/emojionearea/emojionearea.min.js') }}" type="text/javascript"></script>
            <!-- Monthly js -->
            <script src="{{ asset('assets/plugins/monthly/monthly.js') }}" type="text/javascript"></script>
            <!-- Data maps -->
            <script src="{{ asset('assets/plugins/datamaps/d3.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/plugins/datamaps/topojson.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/plugins/datamaps/datamaps.all.min.js') }}" type="text/javascript"></script>

        <!-- End Page Lavel Plugins
            =====================================================================-->
        <!-- Start Theme label Script
            =====================================================================-->
            <!-- Dashboard js -->
            <script src="{{ asset('assets/dist/js/custom.js') }}" type="text/javascript"></script>

            <!--Yield Script-->
            @yield('scripts')

        <!-- End Theme label Script
            =====================================================================-->
            <script>
                // "use strict"; // Start of use strict
                // notification
                setTimeout(function () {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 1000
                    };
                    /*toastr.success('Metromed Medical Centre', "Welcome {{ Sentinel::getUser()->last_name }} {{ Sentinel::getUser()->first_name }}");*/
                    
                    @if(session('success'))
                    toastr.success('{{session('success')}}');
                    @endif

                    @if(session('error'))
                    toastr.error('Metromed Medical Centre', '{{session('error')}}');
                    @endif

                }, 1300);

                //counter
                $('.count-number').counterUp({
                    delay: 50,
                    time: 2000
                });

                // Message
                $('.message_inner').slimScroll({
                    size: '3px',
                    height: '320px'
                });

                //emojionearea
                $(".emojionearea").emojioneArea({
                    pickerPosition: "top",
                    tonesStyle: "radio"
                });

                //monthly calender
                $('#m_calendar').monthly({
                    mode: 'event',
                    //jsonUrl: 'events.json',
                    //dataType: 'json'
                    xmlUrl: 'events.xml'
                });


            </script>

        </body>
        </html>
