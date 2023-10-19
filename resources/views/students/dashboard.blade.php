<!DOCTYPE html>
<html lang="en">
    @include('config.head')

    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{url('index')}}" class="logo">
						<img src="{{asset('images/logo.png')}}" alt="Logo">
					</a>
					<a href="{{url('index')}}" class="logo logo-small">
						<img src="{{asset('images/logo.png')}}" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-align-left"></i>
				</a>
				<a class="mobile_btn" id="mobile_btn">
					<i class="fas fa-bars"></i>
				</a>
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
							<li class="active"> 
								<a href="{{url('students/index')}}"><i class="fa fa-th-large"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="{{url('students/new_applications')}}"><i class="fa fa-file"></i> <span>New Application</span></a>
							</li>
							
                            <li> 
								<a href="{{url('students/request_application')}}"><i class="fa fa-key"></i> <span>Request Application</span></a>
							</li>
							<li> 
								<a href="{{url('students/application')}}"><i class="fa fa-list"></i> <span>My Applications</span></a>
							</li>
							<li> 
								<a href="{{url('students/profile')}}"><i class="fa fa-user"></i> <span>Profile</span></a>
							</li>
					
							<li> 
								<a href="{{url('students/logout')}}"><i class="fa fa-cog"></i> <span>Logout</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">

                	<div class="page-header col-md-12">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active"><label style="font-weight: 900; color: #0f893b; font-size: 25px">BURSARY APPLICATION SYSTEM</label></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
						
							<!-- Revenue Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-12">
											<h5 class="font-weight-bold text-center" style="font-size: 30px"><span style="color: #0f893b">Recent</span> - <span style="color: orange">Applications</span></h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div>
								<div class="card-body">
									<div id="line_graph">
									
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-striped" id="sample">
										<thead>
											<tr>
												<td class="font-weight-bold text-center">#</td>
												<td class="font-weight-bold text-center">REF-NO.</td>
												<td class="font-weight-bold text-center">Applicant Name</td>
												<td class="font-weight-bold text-center">Date</td>
												<td class="font-weight-bold text-center">Status</td>
												<td class="font-weight-bold text-center">Actions</td>
											</tr>
										</thead>
										<tbody>
											@foreach($value as $item)
											<tr>
                                                
												<td>{{$item->id}}</td>
												<td>{{$item->reference_number}}</td>
												<td>{{$item->student_fullname}}</td>
												<td>{{$item->today_date}}</td>
												<td class="text-warning font-weight-bold">{{$item->status}}</td>
												<td class="text-center"><a href=""class="btn btn-primary" data-toggle="modal" data-target="#Edit">Edit</a></td>
						<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">EDIT APPLICATION</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form method="post" action="{{url('edit/')}}">
                                               @csrf
                                               <label class="font-weight-bold">Reference Number :</label>
                                            <input type="text" name="ref" class="form-control" id="" readonly value="">
                                           <label class="font-weight-bold">UPI/ADM/REG No :</label>
                                            <input type="text" name="upi_reg" class="form-control" id="" required value="">
                                            <label class="font-weight-bold">Fullname :</label> 
                                            <input type="text" name="name" class="form-control" id="" required value="">
											
                                            <label class="font-weight-bold">School type :</label> 
                                            <select name="school_type" id="" class="form-control">
												<option selected></option>
                                                <option>--select role--</option>
                                                <option>Primary School</option>
                                                <option>Secondary School</option>
												<option>University School</option>
                                             </select>
											 <label class="font-weight-bold">School name :</label> 
                                            <input type="text" name="school_name" class="form-control" id="" required value="">
											<label class="font-weight-bold">Location :</label> 
                                            <select name="location" id="" class="form-control" required>
												<option selected></option>
                                                <option>--select role--</option>
                                                <option>Jerusalem</option>
                                                <option>Munyaka</option>
												<option>Ziwa</option>
												<option>Ilula</option>
												<option>Block10</option>
												<option>Subaru</option>
												<option>Vet</option>
												<option class="">Langas</option>
                                             </select>
											 <label class="font-weight-bold">Bank name :</label> 
                                            <input type="text" name="bank" class="form-control" id="" value="moi">
											<label class="font-weight-bold">School Account no :</label> 
                                            <input type="number" name="account" class="form-control" id="" required value="}">
                                            <input type="submit" value="E D I T" name="edit" class="btn btn-success form-control mt-2">
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
										
											
                                           
											</tr>
                                             @endforeach
											 {{-- delete record --}}
											 
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