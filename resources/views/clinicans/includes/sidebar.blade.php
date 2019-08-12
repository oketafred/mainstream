<aside class="main-sidebar">
  <!-- sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="image pull-left">
        <img src="{{ asset('assets/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <h4>Welcome</h4>
        <p>
          {{ Sentinel::getUser()->first_name }}
        </p>
      </div>
    </div>

    <!-- sidebar menu -->
    <ul class="sidebar-menu">
      <li class="@if(Request::is('clinican/patients')) active  @endif">
        <a href="{{ route('patients') }}"><i class="fa fa-user-circle"></i><span>Patients</span>
        </a>
      </li>

      <li class="@if(Request::is('clinican/clinican_submission')) active  @endif">
        <a href="{{ route('clinican_submission') }}"><i class="fa fa-hospital-o"></i><span>My Submissions</span>
        </a>
      </li>
      <li class="@if(Request::is('clinican/clinican_response')) active  @endif">
        <a href="{{ route('clinican_response') }}"><i class="fa fa-hospital-o"></i><span>My Response</span>
        </a>
      </li>

      <li class="@if(Request::is('clinican/profile')) active  @endif">
        <a href="{{ route('clinican_profile') }}">
         <i class="fa fa-user"></i><span> My Profile</span>
       </a>
     </li>
   </ul>
