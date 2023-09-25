<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>
    <link href="{{asset('css/text.css')}}" rel="stylesheet">
    <title>Institution page</title>
</head>
<body>
    <div class="container-fluid" style="background-image: url('images/photo.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;background-attachment:fixed;opacity:0.8;auto">
        <div class="row mx-auto " id="header" >
            <img src="{{asset('images/logo.png')}}" alt="" srcset="" width="10%">
            <h5 class="mt-5 mx-5 font-weight-bold text-white" style="font-size: 30px">Bursary Management System</h5>
        </div>
        <div class="container-fluid">
    <div class="row">
		<div class="col-md-12 bg-light mt-5  py-2">
		<ul class="progressbar">
          <li class="active font-weight-bold" style="font-size: 15px;color:green">Student Details</li>
          <li class="active font-weight-bold" style="font-size: 15px;color:green">School/Institution Information</li>
          <li class="font-weight-bold" style="font-size: 15px;color:green">Bursary details</li>
          <li class="font-weight-bold" style="font-size: 15px;color:green">Summary/Confirm Details</li>
        </ul>
		</div>
	</div>
</div>
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-center font-weight-bold">Fill School Details here</h4>
    </div>
    <div class="card-body">
        <form action="{{route('bursary')}}" method="post">
            @csrf
            @method('post')
            <div class="row">              
                <div class="col-md-4">
                    <label class="font-weight-bold">Institution :</label>
                    <select name="school_type" class="form-control">
                        <option value="">-select school-</option>
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
                    <input type="text" name="reg_no" class="form-control" placeholder="Enter your upi/adm/reg no.">
                    @if($errors->has('reg_no'))
                    <span class="text-danger">{{$errors->first('reg_no')}}</span>
                    @endif
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">School name :</label>
                    <input type="text" class="form-control" name="school_name" placeholder="Enter achool name">
                    @if($errors->has('school_name'))
                    <span class="text-danger">{{$errors->first('school_name')}}</span>
                    @endif
                </div>
            </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label class="font-weight-bold">Bank Name :</label>
                        <input type="text" name="bank_name" class="form-control" placeholder="Enter bank name" id="">
                        @if($errors->has('bank_name'))
                    <span class="text-danger">{{$errors->first('bank_name')}}</span>
                    @endif
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">Bank Acc-No :</label>
                        <input type="number" name="account_no" class="form-control" placeholder="Enter account number" id="">
                        @if($errors->has('account_no'))
                    <span class="text-danger">{{$errors->first('account_no')}}</span>
                    @endif
                    </div>
                </div>
            
            <input type="hidden" name="first_name" class="form-control" placeholder="" id="" value="{{$data['first_name']}}">
            <input type="hidden" name="second_name" class="form-control" placeholder="" id="" value="{{$data['second_name']}}">
            <input type="hidden" name="age" class="form-control" placeholder="" id="" value="{{$data['age']}}">
            <input type="hidden" name="gender" class="form-control" placeholder="" id="" value="{{$data['gender']}}">
            <input type="hidden" name="parent_guardian_name" class="form-control" placeholder="" id="" value="{{$data['parent_guardian_name']}}">
            <input type="hidden" name="family_status" class="form-control" placeholder="" id="" value="{{$data['family_status']}}">
            <input type="hidden" name="phone" class="form-control" placeholder="" id="" value="{{$data['phone']}}">
            <input type="hidden" name="occupation" class="form-control" placeholder="" id="" value="{{$data['occupation']}}">
            <input type="hidden" name="county" class="form-control" placeholder="" id="" value="{{$data['county']}}">
            <input type="hidden" name="ward" class="form-control" placeholder="" id="" value="{{$data['ward']}}">
            <input type="hidden" name="location" class="form-control" placeholder="" id="" value="{{$data['location']}}">
            <input type="hidden" name="fullname" class="form-control" placeholder="" id="" value="{{$data['fullname']}}">

            <!-- <div class="row mt-4">
            <div class="col-md-6">
                    <label class="font-weight-bold">Gender :</label>
                    <select name="gender" class="form-control">
                        <option value="">-select gender-</option>
                        <option> Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Family Status :</label>
                    <select name="family_status" class="form-control">
                        <option value="">-select status-</option>
                        <option>Rich</option>
                        <option>Average</option>
                        <option>Poor</option>
                        <option>Other</option>
                    </select>
                </div>
            </div> -->
            <!-- <div class="row mt-4">
            <div class="col-md-6">
                    <label class="font-weight-bold">Enter Parent/Guardian Name :</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter parent name">
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold">Enter Phone No :</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter phone number">
                </div>
            </div> -->
            <!-- <div class="row mt-4">
                <div class="col-md-4">
                    <label class="font-weight-bold">County :</label>
                    <select name="county" class="form-control">
                        <option value="">-select county-</option>
                        <option></option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Ward :</label>
                    <select name="ward" class="form-control">
                        <option value="">-select ward-</option>
                        <option></option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">Location :</label>
                    <select name="location" class="form-control">
                        <option value="">-select location-</option>
                        <option></option>
                    </select>
                </div>
            </div> -->
            <div class="row justify-content-between">
                <a href="{{route('back')}}" name="index" class="btn btn-success mt-5 font-weight-bold">
            {{-- <input type="submit" name="previous" class="btn btn-success mt-5 font-weight-bold" style="float: left" value="PREVIOUS"> --}}
            PREVIOUS
        </a>
            <input type="submit" name="continue" class="btn btn-primary mt-5 font-weight-bold" style="" value="CONTINUE TO NEXT">
            </div>
        </form>
    </div>
</div>
</div>
</body>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bootstrap/popper/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
</html>