<!-- NAVBAR TOP -->
<div class="topbar d-none d-sm-block">
    <div class="container ">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="topbar-left">
                    <div class="text-white topbar-text">
                        <a class="text-white" href="mailto:info@1blockghana.com">info@1blockghana.com</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="list-unstyled topbar-right">
                    <ul class="topbar-link">
                        <li><a href="{{ route('about')}}" title="">About Us</a></li>
                        <li><a href="{{ route('contact')}}" title="">Contact Us</a></li>
                        <li><a href="{{ route('login') }}" title="">Login / Register</a></li>
                    </ul>
                    <ul class="topbar-sosmed">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END NAVBAR TOP -->
<nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/frontend/images/logo.png" alt="" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav99">
            <ul class="mx-auto navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"> Home </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('listing') }}" data-toggle="dropdown"> Our
                        Partners </a>
                    <ul class="dropdown-menu animate fade-up">
                        @php
                            $partners = Spatie\Permission\Models\Role::where('name','agent')->orwhere('name','developer')->get();
                        @endphp

                        @if ($partners)
                            @foreach ($partners as $partner)
                                <li><a class="dropdown-item" href="{{ route('partner.listing', Str::lower($partner->name)) }}">{{ Str::ucfirst($partner->name) }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    @php
                        $categories = App\Models\Category::orderBy('position')->get();
                    @endphp
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Categories </a>
                    <ul class="dropdown-menu animate fade-up">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('category.listing', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>


                {{-- <li class="nav-item"><a class="nav-link" href="/listing"> Listing</a></li> --}}

                <li class="nav-item"><a class="nav-link" href="{{ route('news') }}"> Blog </a></li>

            </ul>


            <!-- Search bar.// -->
            <ul class="navbar-nav">
                <li>
                    <a href="{{ route('login') }}" class="btn btn-primary text-capitalize">
                        <i class="mr-1 fa fa-plus-circle"></i> add listing</a>
                </li>
            </ul>
            <!-- Search content bar.// -->
            <div class="top-search navigation-shadow">
                <div class="container">
                    <div class="input-group ">
                        <form action="#">

                            <div class="mt-3 row no-gutters">
                                <div class="col">
                                    <input class="form-control border-secondary border-right-0 rounded-0" type="search"
                                        value="" placeholder="Search " id="example-search-input4">
                                </div>
                                <div class="col-auto">
                                    <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                        href="/search-result.html">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Search content bar.// -->
        </div> <!-- navbar-collapse.// -->
    </div>
</nav>
