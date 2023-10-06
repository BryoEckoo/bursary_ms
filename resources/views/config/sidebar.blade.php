<style type="text/css">
	span{
		font-size: 14px;
	}
</style>
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul >
							<li class="menu-title"> 
								<!--<span>Main Menu</span>-->
							</li>
							<li class="active"> 
								<a href="{{url('index')}}"><i class="fa fa-th-large"></i> <span>Dashboard</span></a>
							</li>
							<li> 
								<a href="{{url('applications')}}"><i class="fa fa-users"></i> <span>Applications</span></a>
							</li>
							
							<li> 
								<a href="{{route('applicants')}}"><i class="fa fa-map-marker-alt"></i> <span>Applicants</span></a>
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