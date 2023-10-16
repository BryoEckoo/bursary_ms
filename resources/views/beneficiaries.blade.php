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

							<li class="active"> 
								<a href="{{url('beneficiaries')}}"><i class="fa fa-users"></i> <span>Beneficiaries</span></a>
							</li>
						
							<li> 
								<a href="{{url('reports')}}"><i class="fa fa-shopping-cart"></i> <span>Bursary Reports</span></a>
							</li>
						
							<li class="submenu">
								<a href="{{url('index')}}"><i class="fa fa-file"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="{{url('location_report')}}">Location Report</a></li>
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
									<li class="breadcrumb-item active">Beneficiaries List Documents</li>
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
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#New">Add New Beneficiary Document</a>
                            <div class="modal fade" id="New" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">Upload New Beneficiary Document</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form method="post" action="{{url('upload')}}" enctype="multipart/form-data">
                                               @csrf
                                               <label class="font-weight-bold">Enter Document Name :</label>
                                            <input type="text" name="document_name" placeholder="Enter the document name" class="form-control" id="" required >
                                            @if($errors->has('document_name'))
                                            <span class="text-danger">{{$errors->first('document_name')}}</span><br>
                                            @endif
                                           <label class="font-weight-bold">select Document :</label>
                                            <input type="file" name="document" class="form-control" id="" placeholder="choose a document" required >
                                            @if($errors->has('document'))
                                            <span class="text-danger">{{$errors->first('document')}}</span><br>
                                            @endif
                                            <input type="submit" value="U P L O A D" name="upload" class="btn btn-success form-control mt-2">
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
										@if(session()->has('success'))
                                        <div class="alert alert-success alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                                            <span class="font-weight-bold">{{session()->get('success')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                                 </button>
                                                 </div>
                                        @endif
                                        
                                    </div>
									<div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="sample">
                                        <thead>
                                            <tr>
                                                <td class="font-weight-bold text-center">#</td>
                                                <td class="font-weight-bold text-center">Document Name</td>
                                                <td class="font-weight-bold text-center">Document</td>
                                                <td class="font-weight-bold text-center">Updated at</td>
                                                <td class="font-weight-bold text-center">Uploaded By</td>
                                                <td class="font-weight-bold text-center">Actions</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                           @foreach($value as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->document_name}}</td>
                                                <td>{{$data->document}}</td>
                                                <td>{{$data->updated_at}}</td>
                                                <td>{{$data->uploaded_by}}</td>
                                                <td class="">
                                                    <div class="row justify-content-around">
														<div class="col-md-6">
                                                    <a href="{{url('download/'.$data->document)}}" class="btn btn-warning">DOWNLOAD</a>
														</div>
														<div class="col-md-6">
                                                    <a href="" class="btn btn-secondary">View</a>
														</div>
                                                    </div>
                                                </td>
                                            </tr>
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
