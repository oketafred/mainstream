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
        <p>{{ Sentinel::getUser()->last_name }} {{ Sentinel::getUser()->first_name }}</p>
      </div>
    </div>

    <!-- sidebar menu -->
    <ul class="sidebar-menu">
      <li class="@if(Request::is('admin/admin_dashboard')) active  @endif">
        <a href="{{ route('admin_dashboard') }}"><i class="fa fa-hospital-o"></i><span>Dashboard</span>
        </a>
      </li>

      <li class="@if(Request::is('admin/admin_response')) active  @endif">
        <a href="{{ route('admin_response') }}">
          <i class="fa fa-user-times"></i><span>Submissions</span>
        </a>
      </li>

      <li class="@if(Request::is('admin/patients_list')) active  @endif">
        <a href="{{ route('patients.list') }}">
          <i class="fa fa-hospital-o"></i><span>Patients</span>
        </a>
      </li>

      <li class="@if(Request::is('admin/treatment_lists')) active  @endif">
        <a href="{{ route('treatment_lists') }}">
          <i class="fa fa-user"></i><span>Treatment Lists</span>
        </a>
      </li>
      <li class="@if(Request::is('admin/create_facility') || Request::is('admin/facility_lists')) active  @endif">
        <a href="#">
          <i class="fa fa-building-o"></i><span>Health Facilities</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('create_facility') }}">Add Health Facility</a></li>
          <li><a href="{{ route('facility_lists') }}">Health Facility List</a></li>
        </ul>
      </li>

      <li class="@if(Request::is('admin/create_clinican') || Request::is('admin/clinican_lists')) active  @endif">
        <a href="#">
          <i class="fa fa-user-md"></i><span>Clinican</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('create_clinican') }}">Add Clinican</a></li>
          <li><a href="{{ route('clinican_lists') }}">Clinican list</a></li>

        </ul>
      </li>
              {{-- <li class="treeview">
                  <a href="#">
                      <i class="fa fa-sitemap"></i><span>Department</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="add-department.html">Add Department</a></li>
                      <li><a href="dep-list.html">Department list</a></li>
                  </ul>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-list-alt"></i> <span>Schedule</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="add-schedule.html">Add schedule</a></li>
                      <li><a href="sch-list.html">schedule list</a></li>

                  </ul>
                </li> --}}
                <li class="@if(Request::is('admin/profile')) active  @endif">
                  <a href="{{ route('admin_profile') }}">
                   <i class="fa fa-gear"></i><span> My Profile</span>
                 </a>
               </li>
             </ul>
