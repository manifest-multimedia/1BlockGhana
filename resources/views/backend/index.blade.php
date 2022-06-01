<x-backend.app >
    <!-- Top Bar -->
    <x-backend.header />

    <x-backend.sidebar />
    <section class="content home">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard
                    <small class="text-muted">Welcome to <strong>1 Block Ghana</strong></small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="float-right btn btn-primary btn-icon btn-round hidden-sm-down m-l-10" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="#"><i class="zmdi zmdi-home"></i> Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="clearfix row">
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="body">
                            <p class="number count-to" data-from="0" data-to="128" data-speed="2000" data-fresh-interval="700" >Listed Properties</p>
                            <p class="text-muted"><strong>{{$business->properties->count() ?? ''}}</strong></p>
                            <div class="progress">
                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                            </div>
                            <small><a href="{{ route('property.view')}}">View</a></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="body">
                            <p class="number count-to" data-from="0" data-to="128" data-speed="2000" data-fresh-interval="700" >Business Type</p>
                            @foreach ($business->user->roles as $role)
                            <p class="text-muted"><strong>{{Str::ucfirst($role->name ?? '')}}</strong></p>
                            @endforeach

                            <div class="progress">
                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                            </div>
                            <small style="visibility: hidden"><a href="{{ route('user.view')}}">View</a></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card">
                        <div class="body">
                            <p class="number count-to" data-from="0" data-to="758" data-speed="2000" data-fresh-interval="700" >Suscribed Package</p>
                            <p class="text-muted"><strong>{{$business->package->name ?? ''}}</strong></p>
                            <div class="progress">
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                            </div>
                            <small style="visibility: hidden"><a href="{{ route('property.view')}}">View</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-backend.app>

