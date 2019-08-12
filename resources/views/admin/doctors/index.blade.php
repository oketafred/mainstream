@extends('admin.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="header-icon">
      <i class="pe-7s-box1"></i>
    </div>
    <div class="header-title">
      <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>   
      <h1>Clinican</h1>
      <small>Clinican list</small>
      <ol class="breadcrumb hidden-xs">
        <li><a href="{{ route('admin_dashboard') }}"><i class="pe-7s-home"></i> Home</a></li>
        <li class="active">Clinican</li>
      </ol>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-bd">
          <div class="panel-heading">
            <div class="btn-group"> 
              <a class="btn btn-success" href="{{ route('create_clinican') }}"> <i class="fa fa-plus"></i> Add Clinican
              </a>  
            </div>        
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Picture</th>
                    <th>First Name</th>
                    <th>last Name</th>
                    <th>Specialist</th>
                    <th>Health Facility</th>
                    <th>Email</th>
                    <th>Telephone Phone</th>
                    <th>Created At </th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($clinicans as $clinican)
                  <tr >  
                   <td>
                     <label>{{ $clinican->id }}</label>   
                   </td>
                   <td><img src="{{ asset("clinican_photos/" . $clinican->photo) }}" class="img-circlew" alt="User Image" height="50" width="50"></td>
                   <td>{{ $clinican->first_name }}</td>
                   <td>{{ $clinican->last_name }}</td>
                   <td>{{ $clinican->specialist }}</td>
                   <td>{{ $clinican->name }}</td>
                   <td><a>{{ $clinican->email }}</a></td>
                   <td>{{ $clinican->telephone_number }}</td>
                   <td>{{ $clinican->created_at }}</td>
                   <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ordine"><i class="fa fa-trash-o"></i>Deactivate Account
                    </button>
                  </td>
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
<div id="ordine" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Update table</h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-bd lobidrag">
          <div class="panel-heading">
            <div class="btn-group"> 
              <a class="btn btn-primary" href="table.html"> <i class="fa fa-list"></i>  Doctor List </a>  
            </div>
          </div>
          <div class="panel-body">

            <form class="col-sm-12">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter First Name" required>
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Enter last Name" required>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter password" required>
              </div>
              <div class="form-group">
                <label>Designation</label>
                <input type="text" class="form-control" placeholder="Enter Designation" required>
              </div>

              <div class="form-group">
                <label>Department</label>
                <select class="form-control" name="select" size="1">
                  <option selected class="test">Neurology</option>
                  <option>Gynaecology</option>
                  <option>Microbiology</option>
                  <option>Pharmacy</option>
                  <option>Neonatal</option>
                </select>
              </div>

              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="number" class="form-control" placeholder="Enter Phone number" required>
              </div>
              <div class="form-group">
                <label>Mobile</label>
                <input type="number" class="form-control" placeholder="Enter Mobile" required>
              </div>

              <div class="form-group">
                <label>Picture upload</label>
                <input type="file" name="picture" id="picture">
                <input type="hidden" name="old_picture">
              </div>

              <div class="form-group">
                <label>Short Biography</label>
                <textarea id="some-textarea" class="form-control" rows="6" placeholder="Enter text ..."></textarea>
              </div>
              <div class="form-group">
                <label>Specialist</label>
                <input type="text" class="form-control" placeholder="Specialist" required>
              </div>
              <div class="form-group">
                <label>Date of Birth</label>
                <input name="date_of_birth" class="datepicker form-control hasDatepicker" type="text" placeholder="Date of Birth">
              </div>
              <div class="form-group">
                <label>Blood group</label>
                <select class="form-control">
                  <option>A+</option>
                  <option>AB+</option>
                  <option>O+</option>
                  <option>AB-</option>
                  <option>B+</option>
                  <option>A-</option>
                  <option>B-</option>
                  <option>O-</option>
                </select>
              </div>

              <div class="form-group">
               <label>Sex</label><br>
               <label class="radio-inline">
                 <input type="radio" name="sex" value="1" checked="checked">Male</label> 
                 <label class="radio-inline"><input type="radio" name="sex" value="0" >Female</label>                                     

               </div>
               <div class="form-check">
                <label>Status</label><br>
                <label class="radio-inline">
                 <input type="radio" name="status" value="1" checked="checked">Active</label>
                 <label class="radio-inline">
                  <input type="radio" name="status" value="0" >Inctive
                </label>
              </div>                                       

              <div class="reset button">
               <a href="#" class="btn btn-primary">Reset</a>
               <a href="#" class="btn btn-success">Save</a>
             </div>
           </form>
         </div>
       </div>

     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>

</div> <!-- /.content-wrapper -->
@endsection