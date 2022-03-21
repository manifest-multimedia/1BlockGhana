<ul class="navbar-nav bg-brown sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand bg-white text-dark d-flex align-items-center justify-content-center"
		href="{{route('dashboard')}}">
		<div class="sidebar-brand-icon">
			<img src="{{asset('sbadmin/img/logo.png')}}" width="40" alt="1 Block Ghana">
		</div>
		<div class="sidebar-brand-text mx-1">1Block Ghana</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="{{route('dashboard')}}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>


	<!-- Nav Item - Settings Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
			aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Settings</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Settings</h6>
				<a class="collapse-item" href="{{ route('package.list')}}">Packages</a>
				<a class="collapse-item" href="{{route('category.list')}}">Category</a>
				<a class="collapse-item" href="{{route('amenity.list')}}">Amenities</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Properties Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-user"></i>
			<span>Properties</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Properties</h6>
				<a class="collapse-item" href="{{route('property.view')}}">View Properties</a>
				<a class="collapse-item" href="{{ route('property.add')}}">Add Property</a>
			</div>
		</div>
	</li>
	<!-- Nav Item - Agents Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
			aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-user"></i>
			<span>Agents</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Agents</h6>
				<a class="collapse-item" href="{{route('agent.view')}}">View Agents</a>
				<a class="collapse-item" href="{{ route('agent.add')}}">Add Agents</a>
				<a class="collapse-item" href="{{ route('agent.profile')}}">Profile</a>
			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>