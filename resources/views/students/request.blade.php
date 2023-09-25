<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/jquery/jquery-3.5.1.min.js')}}"></script>
    <link href="{{asset('css/text.css')}}" rel="stylesheet">
    <title>Request Bursary here</title>
</head>
<body>
    <div class="container-fluid" style="background-image: url('images/photo.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;background-attachment:fixed;opacity:0.8;height:100vh">
        <div class="row mx-auto " id="header" >
            <img src="{{asset('images/logo.png')}}" alt="" srcset="" width="10%">
            <h5 class="mt-5 mx-5 font-weight-bold text-white" style="font-size: 30px">Bursary Management System</h5>
        </div>
        <div class="container-fluid col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center font-weight-bold">Please Fill The Fields below</h4>
                </div>
                <div class="card-body">
                    @if(session()->has('message'))
                    <span class="text-danger font-weight-bold">{{session()->get('message')}}</span><br>
                    @endif
                    <label for="" class="font-weight-bold">Phone Number :</label>
                    <form method="post" action="{{url('request')}}">
                        @csrf
                    <input type="number" name="phone" class="form-control <?php echo ($errors->first('phone')) ? 'border border-danger' : '';?>" placeholder="Enter phone number here" id="">
                    @if($errors->has('phone'))
                    <span class="text-danger">{{$errors->first('phone')}}</span><br>
                    @endif
                    <div class="row justify-content-between mx-auto">
                        <a href="{{url('/')}}" class="btn btn-warning mt-3 font-weight-bold">BACK</a>
                    <input type="submit" value="REQUEST BURSARY" class="btn btn-primary mt-3 font-weight-bold">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>