<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bursary Management System</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src={{ asset('bootstrap/jquery/jquery-3.5.1.min.js') }}></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="heade">
			<a href="{{url('/')}}" class="home" style="text-decoration: none" onmouseover="this.style.color='white'" onmouseout="this.style.color='lime'">B-M-S</a>
		</div>
		 <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
			<div class="collapse navbar-collapse" id="navbarNav">
	       <ul class="navbar-nav ml-auto pl-5 pr-5 mr-5">
				<li class="nav-item active mr-5 p-3 " style="">
					<a class="nav-link font-weight-bold" href="{{url('/')}}" style="">Home</a>
				</li>
				<li class="nav-item mr-5 p-3">
					<a class="nav-link font-weight-bold" href="{{url('applications')}}" style="">Applications</a>
				</li>
				<li class="nav-item mr-5 p-3">
					<a class="nav-link font-weight-bold" href="{{url('applicants')}}" style="">Applicants</a>
				</li>
				<li class="nav-item mr-5 p-3">
					<a class="nav-link font-weight-bold"  href="{{url('settings')}}" style="">Settings</a>
				</li>
                <li class="nav-item mr-5 p-3">
					<a class="nav-link font-weight-bold"  href="{{url('logout')}}" style="color:white">Dan@ndong</a>
				</li>
                <li class="nav-item mr-5 p-3">
					<a class="nav-link font-weight-bold"  href="{{url('logout')}}" style="">Logout</a>
				</li>
                <li class="nav-item mr-5 p-3">
					<a class="nav-link font-weight-bold"  href="{{url('login')}}" style="">Login</a>
				</li>
			</ul>
</div>
</nav>
<div class="container-fluid">
    <div class="col-md-4 mt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center font-weight-bold">Add New Applicants</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                <label for="" class="font-weight-bold">First Name :</label>
                <input type="text" name="first_name" class="form-control" id="">
                <label for="" class="font-weight-bold">Second Name :</label>
                <input type="text" name="second_name" class="form-control" id="">
                <label for="" class="font-weight-bold">Parent :</label>
                <input type="text" name="Parent/Guardian" class="form-control" id="">
                <label for="" class="font-weight-bold">ID No :</label>
                <input type="text" name="Id_no" class="form-control" id="">
                <label for="" class="font-weight-bold">Phone :</label>
                <input type="text" name="phone" class="form-control" id="">
                <label for="" class="font-weight-bold">Location :</label>
                <input type="text" name="location" class="form-control" id="">
                <input type="submit" class="btn btn-primary mt-2" value="Add New">
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<script src={{asset('bootstrap/js/bootstrap.min.js')}}></script>
<script src={{asset('bootstrap/popper/popper.min.js')}}></script>
<script src={{asset('bootstrap/js/bootstrap.js')}}></script>
<script src="">
    // Hide submenus
$('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}
</script>
</html>