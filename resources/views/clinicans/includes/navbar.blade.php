<header class="main-header">
    <a href="index-2.html" class="logo"> <!-- Logo -->
        <span class="logo-mini">
            <!--<b>A</b>H-admin-->
            <img src="{{ asset('assets/dist/img/mini-logo.png') }}" alt="">MBC
        </span>
        <span class="logo-lg">
            <!--<b>Admin</b>H-admin-->
            <img src="{{ asset('assets/dist/img/logo4.png') }}" alt="">MBC
        </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top ">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-tasks"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- user -->
                <li class="dropdown dropdown-user admin-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="user-image">
                         <span class="text-white">Welcome, {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }} &nbsp;&nbsp;</span>
                         <img src="{{ asset('assets/dist/img/avatar4.png') }}" class="img-circle" height="40" width="40" alt="User Image">
                     </div>
                 </a>
                 <ul class="dropdown-menu">
                    <li><a href="profile.html"><i class="fa fa-user"></i> My Profile</a></li>
                    <li><a href="javascript:void(0)" onclick="document.getElementById('form-logout').submit()"><i class="fa fa-sign-out"></i> Logout</a></li>
                    <form action="{{ route('logout') }}" method="POST" id="form-logout">

                      {{ csrf_field() }}

                  </form>

              </ul>
          </li>
      </ul>
  </div>
</nav>
</header>
