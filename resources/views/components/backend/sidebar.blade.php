<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
	<div class="menu">
		<ul class="list">
			<li>
				<div class="user-info">

					<div class="image"><a href="{{route('user.profile')}}"><img src="{{auth()->user()->getFirstMediaUrl('logos', 'thumb-100') ? auth()->user()->getFirstMediaUrl('logos', 'thumb-100') : url('assets/images/avatar.jpg')}}" alt="User"></a></div>
					<div class="detail">
						@auth
						<h4>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h4>
						<small>{{Str::ucfirst(Auth::user()->user_type)}}</small>
						@endauth
					</div>

					<br />
				</div>
			</li>
			<li class="header">MAIN</li>
			<li class="active open"><a href="/dashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

			<!-- <li><a href="javascript:void(0);" class="menu-toggle"><i
						class="zmdi zmdi-balance-wallet"></i><span>Amenities</span> </a>
				<ul class="ml-menu">
					<li><a href="{{route('amenity.list')}}">List Amenities</a></li>
					<li><a href="{{route('amenity.add')}}">Add Amenities</a></li>
				</ul>
			</li> -->

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Properties</span> </a>
				<ul class="ml-menu">
					<li><a href="{{route('property.view')}}">Listed Properties</a></li>
					<li><a href="{{ route('property.add')}}">Add Property</a></li>
				</ul>
			</li>


            @role("admin")

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-city"></i><span>Adverts</span> </a>
				<ul class="ml-menu">
					<li><a href="{{route('topads.view')}}">Top Ads</a></li>
					<li><a href="{{ route('featuredads.view')}}">Featured Ads</a></li>
				</ul>
			</li>



            <li><a href="javascript:void(0);" class="menu-toggle"><i
                class="zmdi zmdi-balance-wallet"></i><span>Packages</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('package.list')}}">List Packages</a></li>
                    <li><a href="{{ route('package.add')}}">Create Package</a></li>
                </ul>
            </li>
            <li class="{{ request()->routeIs('amenity.list')? 'active': ''}} open"><a href="{{route('amenity.list')}}"><i
                        class="zmdi zmdi-balance-wallet"></i><span>Amenities</span></a>
            </li>
            <li class=""><a href="{{route('category.list')}}"><i class="zmdi zmdi-city"></i><span>Categories</span></a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i
                    class="zmdi zmdi-accounts-outline"></i><span>Partners</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('user.view') }}">All Partners</a></li>
                        <li><a href="{{ route('user.add') }}">Add Partner</a></li>
                        <li><a href="{{ route('user.profile')}}">Partner Profile</a></li>
                    </ul>
                </li>
            @else
            <li class=""><a href="{{route('user.profile')}}"><i class="zmdi zmdi-account"></i><span>Partner Profile</span></a></li>
            @endrole
	</div>
	</div>

	<div class="menu">
		<div class="list">
			<li class="open"><a href="/" style="color: #f96332"><i class="zmdi zmdi-arrow-left"></i><span>BACK TO
						HOMEPAGE</span></a></li>
			</ul>
		</div>
    </div>
</aside>
