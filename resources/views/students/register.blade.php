<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src={{ asset('bootstrap/jquery/jquery-3.5.1.min.js') }}></script>
    <title>Register page-students:</title>
</head>
<body>
    <div class="container col-md-8" style="margin-top: 20vh">
        <div class="row" style="border: .1px light black">
        <div class="col-md-6">
            
            <div class="card-header jalign-item-center" style="background-image: url('../images/logo.png');background-position:center;background-repeat:no-repeat;height:50vh">
                
                <h4 class="text-center font-weight-bold">REGISTER HERE</h4>
            </div>
            </div>
            <div class="col-md-6" style="margin-top: 6vh">
            <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-warning alert-dismissible fade show text-center"  role="alert" style="position:sticky">
                    <span class="font-weight-bold">{{session()->get('message')}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                @endif
                <form method="POST" action="{{url('students/register_req')}}">
                    @csrf
                <label class="font-weight-bold">Enter Email address :</label>
                <input type="text" name="email" class="form-control" id="" placeholder="example@admin.com" value="{{old('email')}}">
                @if($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span><br>
                @endif
                <label class="font-weight-bold">Enter Password :</label>
                <input type="password" name="password" class="form-control" id="" placeholder="********">
                @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span><br>
                @endif
                <label class="font-weight-bold">Re-Enter Password :</label>
                <input type="password" name="re_password" class="form-control" id="" placeholder="********">
                @if($errors->has('re_password'))
                <span class="text-danger">{{$errors->first('re_password')}}</span><br>
                @endif
                <input type="submit" class="btn btn-primary mt-2" value="REGISTER">
                </form>
                <div class="row justify-content-between">
                   <p class="mt-5">If Registered Click <a href="{{url('/')}}"> Here</a></p>
            </div>
            </div>
        </div>
    </div>
</body>
<script src={{asset('bootstrap/js/bootstrap.min.js')}}></script>
<script src={{asset('bootstrap/popper/popper.min.js')}}></script>
<script src={{asset('bootstrap/js/bootstrap.js')}}></script>
</html>