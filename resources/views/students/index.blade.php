{{-- <?php 
session_start();
$token = bin2hex(random_bytes(32)); // Generate a 32-byte token
$_SESSION['csrf_token'] = $token;

if(isset($_POST['continue'])){
    if (isset($_POST['csrf_token']) == $_SESSION['csrf_token']) {
    header("location:institution");
    }else{
        die("CSRF Token Validation Failed");
    }
}

?> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>
    <link href="{{asset('css/text.css')}}" rel="stylesheet">
    <title>Applicants index page</title>
</head>
<body>
    <div class="container-fluid" style="background-image: url('images/photo.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;background-attachment:fixed;opacity:0.8;height:auto">
        <div class="row mx-auto " id="header" >
            <img src="{{asset('images/logo.png')}}" alt="" srcset="" width="10%">
            <h5 class="mt-5 mx-5 font-weight-bold text-white" style="font-size: 30px">Bursary Management System</h5>
        </div>
        <div class="container">
    <div class="row">
		<div class="col-md-12 bg-light mt-5  py-2">
		<ul class="progressbar">
          <li class="active font-weight-bold" style="color:green">Stu-Details</li>
          <li  class="font-weight-bold" style="color:green">School-Information</li>
          <li  class="font-weight-bold" style="color:green">Bursary-details</li>
          <li class="font-weight-bold" style="color:green">Summary-Details</li>
        </ul>
		</div>
	</div>
</div>
<div class="column mt-5">
    <p class="font-weight-bold mx-4 text-white font-italic" style="font-size: 17px;">If you have registered before, no need to register again just request for a bursary <a href="{{url('request_bursary')}}" style="text-decoration: underline;color:yellow">Request a Bursary Here.</a></p>
    <p class="font-weight-bold mx-4 mt-3 text-white font-italic" style="font-size: 17px">You can also track your bursary request process <a href="{{route('track_process')}}" style="text-decoration: underline;color:yellow"> Track process Here.</a></p>
</div>
<div class="card mt-5">
    <div class="card-header">
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
            <span class="font-weight-bold">{{session()->get('message')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
        @endif
        @if(session()->has('success'))
        <p class="font-weight-bold text-success">{{session()->get('success')}}</p>
        @endif
        <h4 class="text-center font-weight-bold">Fill Your Details here</h4>
    </div>
    <div class="card-body">
        <form action="{{url('school_details')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label class="font-weight-bold">Enter First Name :</label>
                    <input type="text" name="first_name" class="form-control <?php echo ($errors->first('first_name')) ? 'border border-danger' : '';?>" placeholder="Enter your first name">
                    @if($errors->has('first_name'))
                    <span class="text-danger">{{$errors->first('first_name')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Enter Second Name :</label>
                    <input type="text" name="second_name" class="form-control <?php echo ($errors->first('second_name')) ? 'border border-danger' : '';?>" placeholder="Enter your second name">
                    @if($errors->has('second_name'))
                    <span class="text-danger">{{$errors->first('second_name')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Age :</label>
                    <select name="age" class="form-control <?php echo ($errors->first('age')) ? 'border border-danger' : '';?>">
                        <option value="">-select Age-</option>
                        <?php
    for ($i = 5; $i <= 25; $i++) {
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
            <div class="col-md-6">
                    <label class="font-weight-bold">Gender :</label>
                    <select name="gender" class="form-control <?php echo ($errors->first('gender')) ? 'border border-danger' : '';?>">
                        <option value="">-select gender-</option>
                        <option> Male</option> 
                        <option>Female</option>
                    </select>
                    @if($errors->has('gender'))
                    <span class="text-danger">{{$errors->first('gender')}}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Family Status :</label>
                    <select name="family_status" class="form-control <?php echo ($errors->first('family_status')) ? 'border border-danger' : '';?>">
                        <option value="">-select status-</option>
                        <option>Rich</option>
                        <option>Average</option>
                        <option>Poor</option>
                        <option>Other</option>
                    </select>
                    @if($errors->has('family_status'))
                    <span class="text-danger">{{$errors->first('family_status')}}</span>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
            <div class="col-md-4">
                    <label class="font-weight-bold">Enter Parent/Guardian Name :</label>
                    <input type="text" name="parent_guardian_name" class="form-control <?php echo ($errors->first('parent_guardian_name')) ? 'border border-danger' : '';?>" placeholder="Enter parent name">
                    @if($errors->has('parent_guardian_name'))
                    <span class="text-danger">{{$errors->first('parent_guardian_name')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Enter Phone No :</label>
                    <input type="number" name="phone" class="form-control <?php echo ($errors->first('phone')) ? 'border border-danger' : '';?>" placeholder="Enter phone number">
                    @if($errors->has('phone'))
                    <span class="text-danger">{{$errors->first('phone')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Occupation :</label>
                    <select name="occupation" class="form-control <?php echo ($errors->first('occupation')) ? 'border border-danger' : '';?>">
                        <option value="">-select occupation-</option>
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
                <div class="col-md-6">
                    <label class="font-weight-bold">Email :</label>
                    <input type="email" name="email" placeholder="Enter the parent email address" class="form-control" id="">
                    @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Id No :</label>
                    <input type="number" name="id_no" placeholder="Enter the parent id number" class="form-control" id="">
                    @if($errors->has('id_no'))
                    <span class="text-danger">{{$errors->first('id_no')}}</span>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <label class="font-weight-bold">County :</label>
                    <select name="county" class="form-control <?php echo ($errors->first('county')) ? 'border border-danger' : '';?>">
                        <option value="">-select county-</option>
                        <option>Uasin Gishu</option>
                    </select>
                    @if($errors->has('county'))
                    <span class="text-danger">{{$errors->first('county')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Ward :</label>
                    <select name="ward" class="form-control <?php echo ($errors->first('ward')) ? 'border border-danger' : '';?>">
                        <option value="">-select ward-</option>
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
                <div class="col-md-4">
                    <label class="font-weight-bold">Location :</label>
                    <select name="location" class="form-control <?php echo ($errors->first('location')) ? 'border border-danger' : '';?>">
                        <option value="">-select location-</option>
                        <option>Munyaka</option>
                        <option>Silas</option>
                        <option>Ilula</option>
                        <option>Block 10</option>
                    </select>
                    @if($errors->has('location'))
                    <span class="text-danger">{{$errors->first('location')}}</span>
                    @endif
                </div>
            </div>
            <input type="submit" name="continue" class="btn btn-primary mt-5 font-weight-bold" style="float: right;color:black" value="CONTINUE TO NEXT">
        </form>
    </div>
</div>
</div>

</body>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bootstrap/popper/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</html>