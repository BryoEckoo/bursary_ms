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
								<a href="{{url('applications')}}"><i class="fa fa-file"></i> <span>Applications</span></a>
							</li>
							
							<li> 
								<a href="{{route('applicants')}}"><i class="fa fa-list"></i> <span>Applicants</span></a>
							</li>
							<li> 
								<a href="{{url('beneficiaries')}}"><i class="fa fa-users"></i> <span>Beneficiaries</span></a>
							</li>
							<li> 
								<a href="{{url('amount_reports')}}"><i class="fa fa-money-bill"></i> <span>Amount Reports</span></a>
							</li>
							<li > 
								<a href="{{url('reports')}}"><i class="fa fa-shopping-cart"></i> <span>Bursary Reports</span></a>
							</li>
						
							<li class="submenu active">
								<a href="{{url('index')}}"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li class="active"><a href="{{url('location_report')}}">Location Report</a></li>
									<li><a href="{{url('sub_location_report')}}">Sub-location Report</a></li>
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
									<li class="breadcrumb-item active font-weight-bold" style="text-transform: uppercase;">Location Reports</li>
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
						<div class="container col-md-8">
						
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
									<div id="line_graph">
										@if(session()->has('message'))
                                        <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('message')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                                 </button>
                                                 </div>
                                        @endif
									</div>
									<form action="{{url('print_location')}}" method="post">
                                        @csrf
                                        <label>Select Location :</label>
                                        <select name="location" id="" class="form-control">
											<option>-select location-</option>
                                            <option>Munyaka</option>
                                            <option>Ilula</option>
                                            <option>Marura</option>
                                            <option>Block 10</option>
                                            <option>Silas</option>
                                            <option>Jerusalem</option>
                                        </select>
                                        <input type="submit" value="PRINT" class="btn btn-warning mt-2">
                                    </form>
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