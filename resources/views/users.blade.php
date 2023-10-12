<!DOCTYPE html>
<html lang="en">
    @include('config.head')

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				@include('config.header')
                        </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul >
							<li class="menu-title"> 
								<!--<span>Main Menu</span>-->
							</li>
							<li > 
								<a href="{{url('index')}}"><i class="fa fa-th-large"></i> <span>Dashboard</span></a>
							</li>
							<li > 
								<a href="{{url('applications')}}"><i class="fa fa-users"></i> <span>Applications</span></a>
							</li>
							
							<li> 
								<a href="{{route('applicants')}}"><i class="fa fa-map-marker-alt"></i> <span>Applicants</span></a>
							</li>
						
							<li > 
								<a href="{{url('reports')}}"><i class="fa fa-shopping-cart"></i> <span>Bursary Reports</span></a>
							</li>
						
							<li class="submenu">
								<a href="{{url('index')}}"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('location_report')}}">Location Report</a></li>
									<li><a href="{{url('sub_location_report')}}">Sub-location Report</a></li>
								</ul>
							</li>
				
							<li class="active"> 
								<a href="{{url('users')}}"><i class="fa fa-user"></i> <span>Users</span></a>
							</li>
							<li> 
								<a href="{{url('settings')}}"><i class="fa fa-cog"></i> <span>settings</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper mt-5">
			
                <div class="content container-fluid">

                	<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active font-weight-bold" style="text-transform: uppercase;">Users</li>
								</ul>
							</div>
						</div>
					</div>
					
					{{-- <div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-one">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fa fa-users"></i>
										</div>
										<div class="db-info">
											<h3>
												{{$staff}}
											</h3>
											<h6>Staff</h6>
										</div>										
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-two">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fa fa-user"></i>
										</div>
										<div class="db-info">
											<h3>
										{{$student}}
											</h3>
											<h6>Students</h6>
										</div>										
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-three">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fa fa-receipt"></i>
										</div>
										<div class="db-info">
											<h3>
												{{$application}}
											</h3>
											<h6>Today's Applications</h6>
										</div>										
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-four">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fa fa-window-close"></i>
										</div>
										<div class="db-info">
											<h3>
												
											</h3>
											<h6>Today's Rollout</h6>
										</div>										
									</div>
								</div>
							</div>
						</div>
					</div> --}}


					<div class="row">
						<div class="container col-md-10">
                            {{-- succes message --}}
                            @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                <span class="font-weight-bold">{{session()->get('message')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                     </button>
                                     </div>
                            @endif
                            {{--  --}}
                              {{-- error message --}}
                              @if(session()->has('error'))
                              <div class="alert alert-danger alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                  <span class="font-weight-bold">{{session()->get('error')}}</span>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                       </div>
                              @endif
                              {{--  --}}
                            <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#New">Add New User</a>
                            <div class="modal fade" id="New" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">Add New USer</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form method="post" action="{{url('add_user')}}">
                                               @csrf
                                               <label class="font-weight-bold">Enter Fullname :</label>
                                            <input type="text" name="name" class="form-control" id="" required >
                                           <label class="font-weight-bold">Enter Email :</label>
                                            <input type="email" name="email" class="form-control" id="" required >
                                            <label class="font-weight-bold">Enter Phone :</label> 
                                            <input type="number" name="phone" class="form-control" id="" required >
                                            <label class="font-weight-bold">Select Role :</label> 
                                            <select name="role" id="" class="form-control" required>
                                                <option>--select role--</option>
                                                <option>Admin</option>
                                                <option>Ass_admin</option>
                                             </select>
                                            <input type="submit" value="A D D" name="add" class="btn btn-success form-control mt-2">
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- Revenue Chart -->
							{{-- <div class="card card-chart"> --}}
								<div class="card-body">
									<div id="line_graph">
									</div>
									<div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Fullname</td>
                                                    <td>Email</td>
                                                    <td>Actions</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($value as $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->fullname}}</td>
                                                    <td>{{$data->email}}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{$data->id}}">EDIT</a></div>
                                                         <!-- edit user modal -->
     <div class="modal fade" id="Modal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                <h4 class="text-center">Edit User Details</h4>
             </div>
             <div class="modal-body">
                <form method="post" action="{{url('edit_user/'.$data->id)}}">
                    @csrf
                    <label class="font-weight-bold">Enter Fullname :</label>
                 <input type="text" name="name" class="form-control" id="" required value="{{$data->fullname}}">
                <label class="font-weight-bold">Enter Email :</label>
                 <input type="email" name="email" class="form-control" id="" required value="{{$data->email}}">
                 <label class="font-weight-bold">Enter Phone :</label>
                 <input type="number" name="phone" class="form-control" id="" required value="{{$data->phone}}">
                 <label class="font-weight-bold">Enter Role :</label>
                 <select name="role" id="" class="form-control" required>
                    <option  selected>{{$data->role}}</option>
                    <option>--select role--</option>
                    <option>Admin</option>
                    <option>Ass_admin</option>
                 </select>
                 <input type="submit" value="E D I T" name="edit" class="btn btn-success form-control mt-2">
                </form>
             </div>
         </div>
     </div>
 </div>
                                                    <div class="col-md-6"><a href="" class="btn btn-secondary"  data-toggle="modal" data-target="#Change{{$data->id}}">Change Password</a></div></div></td>
                                                </tr>
                                                                                                     <!-- edit user modal -->
     <div class="modal fade" id="Change{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="text-center">Change Password</h4>
                </div>
                <div class="modal-body">
                   <form method="post" action="{{url('change_password/'.$data->id)}}">
                       @csrf
                       <label class="font-weight-bold">Enter Current Password :</label>
                    <input type="password" name="current_pass" class="form-control" id="" required>
                   <label class="font-weight-bold">Enter New Password :</label>
                    <input type="password" name="new_pass" class="form-control" id="" required>
                    <label class="font-weight-bold">Re-Enter New Password :</label>
                    <input type="password" name="re_pass" class="form-control" id="" required>
                    <input type="submit" value="R E S E T" name="reset" class="btn btn-success form-control mt-2">
                   </form>
                </div>
            </div>
        </div>
    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
								</div>
							{{-- </div> --}}
							<!-- /Revenue Chart -->
							
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Wrapper -->

			
        </div>
		<!-- /Main Wrapper -->
		@include('config.scripts')
    </body>
	
    {{-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script> --}}
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="{{asset('DataTables/DataTables-1.13.4/js/jquery.dataTables.js')}}"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );
    </script>
</html>