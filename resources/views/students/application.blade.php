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
							<li > 
								<a href="{{url('students/index')}}"><i class="fa fa-th-large"></i> <span>Dashboard</span></a>
							</li>
							<li class="active"> 
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
											<h5 class="font-weight-bold text-center" style="font-size: 30px"><span style="color: #0f893b">New</span> - <span style="color: orange">Application</span></h5>
										</div>
										<div class="col-6">
											                                        
										</div>
									</div>						
								</div>
								<div class="card-body">
                                    <form action="{{url('submit_application')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header" id="head" style="background-color:#0f893b;color:white ">
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
                                            <h4 class="text-center font-weight-bold ">Fill Your Details here</h4>
                                        </div>
                                        <div class="card-body" style="background-color: ">
                                            
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Enter Full Name :</label>
                                                        <input type="text" name="fullname" class="form-control <?php echo ($errors->first('fullname')) ? 'border border-danger' : '';?> font-weight-bold" placeholder="Enter your first name" value="{{old('first_name')}}">
                                                        @if($errors->has('fullname'))
                                                        <span class="text-danger">{{$errors->first('fullname')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Gender :</label>
                                                        <select name="gender" class="form-control <?php echo ($errors->first('gender')) ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="" selected><?php echo(old('gender')) ? old('gender') : '-select gender-';?></option>
                                                            <option> Male</option> 
                                                            <option>Female</option>
                                                        </select>
                                                        @if($errors->has('gender'))
                                                        <span class="text-danger">{{$errors->first('gender')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Age :</label>
                                                        <select name="age" class="form-control <?php echo ($errors->first('age')) ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="" selected><?php echo(old('age')) ? old('age') : '-select age-';?></option>
                                                            <?php
                                        for ($i = 13; $i <= 27; $i++) {
                                            echo "<option value=\"$i\">$i</option>";
                                        }
                                        ?>
                                                        </select>
                                                        @if($errors->has('age'))
                                                        <span class="text-danger">{{$errors->first('age')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                <div class="col-md-4">
                                                        <label class="font-weight-bold">Enter Parent/Guardian Name :</label>
                                                        <input type="text" name="parent_guardian_name" value="{{old('parent_guardian_name')}}" class="form-control font-weight-bold <?php echo ($errors->first('parent_guardian_name')) ? 'border border-danger' : '';?>" placeholder="Enter parent name">
                                                        @if($errors->has('parent_guardian_name'))
                                                        <span class="text-danger">{{$errors->first('parent_guardian_name')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Enter Phone No :</label>
                                                        <input type="number" name="phone" class="form-control font-weight-bold <?php echo ($errors->first('phone')) ? 'border border-danger' : '';?>" placeholder="Enter phone number" value="{{old('phone')}}">
                                                        @if($errors->has('phone'))
                                                        <span class="text-danger">{{$errors->first('phone')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Occupation :</label>
                                                        <select name="occupation" class="form-control <?php echo ($errors->first('occupation')) ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="" selected><?php echo(old('occupation')) ? old('occupation') : '-select occupation-';?></option>
                                                            <option>Employed</option>
                                                            <option>Self-employed</option>
                                                            <option>Contract</option>
                                                            <option>Unemployed</option>
                                                            <option>Others</option>
                                                        </select>
                                                        @if($errors->has('occupation'))
                                                        <span class="text-danger">{{$errors->first('occupation')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Family Status :</label>
                                                        <select name="family_status" class="form-control <?php echo ($errors->first('family_status')) ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="" selected><?php echo(old('family_status')) ? old('family_status') : '-select status-';?></option>
                                                            <option>Rich</option>
                                                            <option>Average</option>
                                                            <option>Poor</option>
                                                            <option>Other</option>
                                                        </select>
                                                        @if($errors->has('family_status'))
                                                        <span class="text-danger">{{$errors->first('family_status')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Email :</label>
                                                        <input type="email" name="email" placeholder="Enter the parent email address" class="form-control font-weight-bold <?php echo ($errors->first('email')) ? 'border border-danger' : '';?>" id="" value="{{old('email')}}">
                                                        @if($errors->has('email'))
                                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="font-weight-bold">Id No :</label>
                                                        <input type="number" name="id_no" placeholder="Enter the parent id number" class="form-control font-weight-bold <?php echo ($errors->first('id_no')) ? 'border border-danger' : '';?>" id="" value="{{old('id_no')}}">
                                                        @if($errors->has('id_no'))
                                                        <span class="text-danger">{{$errors->first('id_no')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">County :</label>
                                                        <select name="county" class="form-control <?php echo ($errors->first('county')) ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="" selected><?php echo(old('county')) ? old('county') : '-select county-';?></option>
                                                            <option>Uasin Gishu</option>
                                                        </select>
                                                        @if($errors->has('county'))
                                                        <span class="text-danger">{{$errors->first('county')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">Ward :</label>
                                                        <select name="ward" class="form-control <?php echo ($errors->first('ward')) ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="" selected><?php echo(old('ward')) ? old('ward') : '-select ward-';?></option>
                                                            <option>Ziwa</option>
                                                            <option>Soy</option>
                                                            <option>Kipsomba</option>
                                                            <option>Kaptagat</option>
                                                            <option>Kapsoya</option>
                                                            <option>Moiben</option>
                                                        </select>
                                                        @if($errors->has('ward'))
                                                        <span class="text-danger">{{$errors->first('ward')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">Location :</label>
                                                        <select name="location" id="location" onchange="getSchools(this.value)" id="firstSelect" class="form-control <?php echo ($errors->first('location')) ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="" selected><?php echo(old('location')) ? old('location') : '-select location-';?></option>
                                                            <option>Munyaka</option>
                                                            <option>Silas</option>
                                                            <option>Ilula</option>
                                                            <option>Block 10</option>
                                                            <option>Marura</option>
                                                        </select>
                                                        @if($errors->has('location'))
                                                        <span class="text-danger">{{$errors->first('location')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">Sub-Location :</label>
                                                        <select name="sub_location" class="form-control <?php echo ($errors->first('sub_location')) ? 'border border-danger' : '';?> font-weight-bold">
                                                            <option value="" selected><?php echo(old('sub_location')) ? old('sub_location') : '-select sub-location-';?></option>
                                                            <option>Subaru</option>
                                                            <option>Bondeni</option>
                                                            <option>Kamkunji</option>
                                                            <option>Airstrip</option>
                                                        </select>
                                                        @if($errors->has('sub_location'))
                                                        <span class="text-danger">{{$errors->first('sub_location')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                    </div>
                                    <hr>
									<div class="card-header" id="head" style="background-color:#0f893b;color:white  ">
                                        <h4 class="text-center font-weight-bold ">Fill School Details here</h4>
                                    </div>
                                    <div class="card-body" style="background-color:">
                                            <div class="row">              
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold">Institution :</label>
                                                    <select name="school_type" class="form-control <?php echo ($errors->first('school_type')) ? 'border border-danger' : '';?>">
                                                        <option value="" selected><?php echo(old('school_type')) ? old('school_type') : '-select school-';?></option>
                                                        <option>Primary school</option>
                                                        <option>Secondary School</option>
                                                        <option>University/College/TVET</option>
                                                    </select>
                                                    @if($errors->has('school_type'))
                                                    <span class="text-danger">{{$errors->first('school_type')}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold">Enter UPI No/Adm No/Reg No :</label>
                                                    <input type="text" name="reg_no" class="form-control <?php echo ($errors->first('reg_no')) ? 'border border-danger' : '';?>" placeholder="Enter your upi/adm/reg no." value="{{old('reg_no')}}">
                                                    @if($errors->has('reg_no'))
                                                    <span class="text-danger">{{$errors->first('reg_no')}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="font-weight-bold">School name :</label>
                                                    <select name="school_name" id="school"  onchange="getSchool(this.value)" class="form-control <?php echo ($errors->first('school_name')) ? 'border border-danger' : '';?>">
                                                        <option selected value=""><?php echo(old('school_name')) ? old('school_name') : '-select school-';?></option>
                                                        <option>Umoja High</option>
                                                        <option>Kimumu Secondary School</option>
                                                        <option>UG High School</option>
                                                        <option>64 Secondary School</option>
                                                        <option>Central Secondary School</option>
                                                    </select>
                                                    {{-- <input type="text" class="form-control" name="school_name" placeholder="Enter achool name" value="{{old('school_name')}}"> --}}
                                                    @if($errors->has('school_name'))
                                                    <span class="text-danger">{{$errors->first('school_name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">Bank Name :</label>
                                                        <select name="bank_name" class="form-control <?php echo ($errors->first('bank_name')) ? 'border border-danger' : '';?>" id="">
                                                            <option value="">-select Bank-</option>
                                                            <option>National Bank</option>
                                                            <option>KCB Bank</option>
                                                            <option>Co-operative Bank</option>
                                                            <option>Family Bank</option>
                                                        </select>
                                                        @if($errors->has('bank_name'))
                                                    <span class="text-danger">{{$errors->first('bank_name')}}</span>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">Bank Acc-No :</label>
                                                        <input type="number" name="account_no" class="form-control <?php echo ($errors->first('account_no')) ? 'border border-danger' : '';?>" placeholder="Enter account number" id="" value="{{old('account_no')}}">
                                                        @if($errors->has('account_no'))
                                                    <span class="text-danger">{{$errors->first('account_no')}}</span>
                                                    @endif
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">School Admission Letter :</label>
                                                        <input type="file" name="adm_letter" class="form-control ">
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold">School Fees Structure Upload :</label>
                                                        <input type="file" name="fee_structure" class="form-control <?php echo ($errors->first('fee_structure')) ? 'border border-danger' : '';?>" placeholder="Choose a file" id="" value="{{old('fee_structure')}}">
                                                        @if($errors->has('fee_structure'))
                                                    <span class="text-danger">{{$errors->first('fee_structure')}}</span>
                                                    @endif
                                                    </div>
                                                </div>
                                                <input type="submit" name="apply" class="btn mt-5 font-weight-bold mb-4" style="float: right;color:white;background-color:#0f893b;" value="SUBMIT APPLICATION">
                                    </div>
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
    <script type="text/javascript">
function getSchools(location){
    let schoolDropDown = document.querySelector("#school");

    if(location.trim() === ""){
        schoolDropDown.disabled = true;
        schoolDropDown.selectedIndex = 0;
        return false;
    }
    //ajax request with fetch
    fetch("schools.json")
    .then(function(response){
        return response.json();
    })
    .then(function(data){
        let schools = data[location];
        let out = "";
        out+='<option value="">-Choose a location-</option>';
        for(let school of schools){
            out+='<option value="${school}">${school}</option>';
        }
        schoolDropDown.innerHTML = out;
        schoolDropDown.disabled = false;
        locationPlaceholder.innerHTML = location;
    });

}
        </script>
	
    {{-- <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script> --}}
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="{{asset('DataTables/DataTables-1.13.4/js/jquery.dataTables.js')}}"></script>
    <script>
    jQuery(document).ready(function($) {
        $('#sample').DataTable();
    } );


    // 
    $(document).ready(function() {
    // Get references to the first and second select elements
    var $firstSelect = $('#firstSelect');
    var $secondSelect = $('#secondSelect');

    // Data for the second select options based on the first select value
    var optionsData = {
        option1: ['Sub-Option 1.1', 'Sub-Option 1.2', 'Sub-Option 1.3'],
        option2: ['Sub-Option 2.1', 'Sub-Option 2.2', 'Sub-Option 2.3'],
        option3: ['Sub-Option 3.1', 'Sub-Option 3.2', 'Sub-Option 3.3'],
    };

    // Function to update the second select options based on the selected value in the first select
    function updateSecondSelect() {
        var selectedValue = $firstSelect.val();
        var options = optionsData[selectedValue] || [];

        // Clear existing options
        $secondSelect.empty();

        // Add new options
        for (var i = 0; i < options.length; i++) {
            $secondSelect.append($('<option>', {
                value: options[i],
                text: options[i]
            }));
        }
    }

    // Attach an event listener to the first select to trigger updates
    $firstSelect.on('change', updateSecondSelect);

    // Initialize the second select options
    updateSecondSelect();
});

    </script>
</html>