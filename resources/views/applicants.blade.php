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
							
							<li class="active"> 
								<a href="{{url('applicants')}}"><i class="fa fa-map-marker-alt"></i> <span>Applicants</span></a>
							</li>
						
							<li> 
								<a href="{{url('reports')}}"><i class="fa fa-shopping-cart"></i> <span>Bursary Reports</span></a>
							</li>
						
							<li class="submenu">
								<a href="{{url('index')}}"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('term_report')}}">Term Report</a></li>
									<li><a href="{{url('yearly_report')}}">Yearly Report</a></li>
								</ul>
							</li>
				
							<li> 
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
            <div class="page-wrapper">
			
                <div class="content container-fluid">

                	<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Applicants</li>
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
						<div class="col-md-12">
						
							<!-- Revenue Chart -->
							<div class="card card-chart">
								{{-- <div class="card-header">
									<div class="row align-items-center">
										<div class="col-6">
											<h5 class="card-title">Recent Applicants</h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div> --}}
								<div class="card-body">
									<div id="line_graph"></div>
									<div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="sample">
                                        <thead>
                                            <tr>
                                                <td class="font-weight-bold text-center">#</td>
                                                <td class="font-weight-bold text-center">Full Name</td>
                                                <td class="font-weight-bold text-center">Age</td>
                                                <td class="font-weight-bold text-center">School Type</td>
                                                <td class="font-weight-bold text-center">County</td>
                                                <td class="font-weight-bold text-center">Location</td>
                                                <td class="font-weight-bold text-center">Sub-location</td>
                                                <td class="font-weight-bold text-center">Actions</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($data as $val)
                                            <tr>
                                                <td>{{$val->id}}</td>
                                                <td>{{$val->student_fullname}}</td>
                                                <td>{{$val->age}}</td>
                                                <td>{{$val->school_level}}</td>
                                                <td>{{$val->county}}</td>
                                                <td>{{$val->location}}</td>
                                                <td class="text-warning font-weight-bold">{{$val->sub_location}}</td>
                                                <td class="text-center"><a href="{{url('edit/'.$val->id)}}"class="btn btn-primary">Edit</a>
                                                <a href="" data-toggle="modal" data-target="#Modal" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <div id="Modal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <form method="POSt">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                    
                                                            <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Delete</h4>
                                                            </div>
                                    
                                                            <div class="modal-body">
                                                                <input type="hidden" name="deleteid" value="">
                                                                <input type="hidden" name="email" value="">
                                                                <p>
                                                                    <div class="alert alert-danger">Are you Sure you want Delete <strong>?</strong></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="delete_acc" class="btn btn-danger">YES</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                        
                                        </table>
                                    </div>
								</div>
							</div>
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
