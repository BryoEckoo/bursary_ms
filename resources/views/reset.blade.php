<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
    <title>reset password</title>
</head>
<body>
    <form method="POST" action="{{url('reset_pass')}}">
        @csrf
        <label>Enter Password</label>
        <input type="password" name="password" class="form-control" id="">
        <label for="">Re-enter password</label>
        <input type="password" name="re_password" class="form-control" id="">
        <input type="submit" value="RESET PASSWORD" class="btn btn-primary mt-2">
    </form>
</body>
<script src={{asset('bootstrap/js/bootstrap.min.js')}}></script>
<script src={{asset('bootstrap/popper/popper.min.js')}}></script>
<script src={{asset('bootstrap/js/bootstrap.js')}}></script>
</html>