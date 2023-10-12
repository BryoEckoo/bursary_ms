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
            @include('config.sidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">

                	<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<!--<h3 class="page-title">Welcome Admin!</h3>-->
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="row">
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
					</div>


					<div class="row">
						<div class="col-md-12">
						
							<!-- Revenue Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-6">
											<h5 class="card-title">Recent Applications</h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div>
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
												<td class="font-weight-bold text-center">REF-NO.</td>
												<td class="font-weight-bold text-center">Applicant Name</td>
												<td class="font-weight-bold text-center">Location</td>
												<td class="font-weight-bold text-center">Status</td>
												<td class="font-weight-bold text-center">Actions</td>
											</tr>
										</thead>
										{{-- @foreach($stues as $stu)
											<label class="font-weight-bold">Parent Name :</label> 
                                            <input type="text" name="parent_name" class="form-control" id="" required value="{{$stu->parent_guardian_name}}">
											<label class="font-weight-bold">Parent Email :</label> 
                                            <input type="email" name="parent_email" class="form-control" id="" required value="{{$stu->parent_email}}">
											<label class="font-weight-bold">Parent Phone :</label> 
                                            <input type="text" name="parent_phone" class="form-control" id="" required value="{{$stu->phone}}">
											<label class="font-weight-bold">Family Status :</label> 
                                            <select name="family_status" id="" class="form-control" required>
												<option selected>{{$stu->family_status}}</option>
                                                <option>--select role--</option>
                                                <option>Very Rich</option>
                                                <option>Rich</option>
												<option>Poor</option>
												<option>Average</option>
                                             </select>
											 @endforeach --}}
										<tbody>
											@foreach($apps as $val)
											<tr>
												<td>{{$val->id}}</td>
												<td>{{$val->reference_number}}</td>
												<td>{{$val->student_fullname}}</td>
												<td>{{$val->location}}</td>
												<td class="text-warning font-weight-bold">{{$val->status}}</td>
												<td class="text-center"><a href=""class="btn btn-primary" data-toggle="modal" data-target="#Edit{{$val->student_fullname}}">Edit</a>
													<div class="modal fade" id="Edit{{$val->student_fullname}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                           <h4 class="text-center">EDIT APPLICATION</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form method="post" action="{{url('edit/'.$val->reference_number)}}">
                                               @csrf
                                               <label class="font-weight-bold">Reference Number :</label>
                                            <input type="text" name="ref" class="form-control" id="" readonly value="{{$val->reference_number}}">
                                           <label class="font-weight-bold">UPI/ADM/REG No :</label>
                                            <input type="text" name="upi_reg" class="form-control" id="" required value="{{$val->adm_upi_reg_no}}">
                                            <label class="font-weight-bold">Fullname :</label> 
                                            <input type="text" name="name" class="form-control" id="" required value="{{$val->student_fullname}}">
											
                                            <label class="font-weight-bold">School type :</label> 
                                            <select name="school_type" id="" class="form-control">
												<option selected>{{$val->school_type}}</option>
                                                <option>--select role--</option>
                                                <option>Primary School</option>
                                                <option>Secondary School</option>
												<option>University School</option>
                                             </select>
											 <label class="font-weight-bold">School name :</label> 
                                            <input type="text" name="school_name" class="form-control" id="" required value="{{$val->school_name}}">
											<label class="font-weight-bold">Location :</label> 
                                            <select name="location" id="" class="form-control" required>
												<option selected>{{$val->location}}</option>
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
                                            <input type="number" name="account" class="form-control" id="" required value="{{$val->account_no}}">
                                            <input type="submit" value="E D I T" name="edit" class="btn btn-success form-control mt-2">
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
												<a href="" data-toggle="modal" data-target="#Modal{{$val->id}}" class="btn btn-danger">Delete</a>
												<a href="" data-toggle="modal" data-target="#Approve{{$val->id}}" class="btn btn-success">Approve</a>
											{{-- approve record --}}
											<div id="Approve{{$val->id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<form method="post" action="{{url('approve_application/'.$val->id)}}">
														@csrf
														<!-- Modal content-->
														<div class="modal-content">
									
															<div class="modal-header" style="background: #398AD7; color: #fff;">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Approve</h4>
															</div>
									
															<div class="modal-body">
																<p>
																	<div class="alert alert-warning">Are you Sure you want Approve.... <strong>omaa{{$val->reference_number}}?</strong></p>
																</div>
																<div class="modal-footer">
																	<button type="submit" name="approve" class="btn btn-success">YES</button>
																	<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
																</div>
															</div>
													</form>
													</div>
												</div>
											</td>
											</tr>
											 {{-- delete record --}}
											 <div id="Modal{{$val->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <form method="post" action="{{url('delete_application/'.$val->id)}}">
                                                        @csrf
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                    
                                                            <div class="modal-header" style="background: #398AD7; color: #fff;">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Delete</h4>
                                                            </div>
                                    
                                                            <div class="modal-body">
                                                                <p>
                                                                    <div class="alert alert-danger">Are you Sure you want Delete.... <strong>{{$val->reference_number}}?</strong></p>
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