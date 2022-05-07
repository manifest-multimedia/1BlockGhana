@props(['agents','businesses','properties'])


<!-- Main Content -->


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
                        <h3 class="number count-to" data-from="0" data-to="128" data-speed="2000" data-fresh-interval="700" >{{$agents}}</h3>
                        <p class="text-muted">Verifed Agents</p>
                        <div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        {{-- <small>Change 27%</small> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="body">
                        <h3 class="number count-to" data-from="0" data-to="128" data-speed="2000" data-fresh-interval="700" >{{$businesses}}</h3>
                        <p class="text-muted">Verifed Businesses</p>
                        <div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        {{-- <small>Change 27%</small> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="body">
                        <h3 class="number count-to" data-from="0" data-to="758" data-speed="2000" data-fresh-interval="700" >{{$properties}}</h3>
                        <p class="text-muted">Total Properties</p>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                        </div>
                        {{-- <small>Change 9%</small> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="clearfix row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Visitors</strong></h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="float-right dropdown-menu dropdown-menu-right slideUp">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="text-center row">
                            <div class="col-sm-3 col-6">
                                <h4 class="m-t-0">106 <i class="zmdi zmdi-account col-green"></i></h4>
                                <p class="text-muted"> Today's</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="m-t-0">907 <i class="zmdi zmdi-account col-green"></i></h4>
                                <p class="text-muted">This Week's</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="m-t-0">4210 <i class="zmdi zmdi-account col-green"></i></h4>
                                <p class="text-muted">This Month's</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="m-t-0">67,000 <i class="zmdi zmdi-account col-green"></i></h4>
                                <p class="text-muted">This Year's</p>
                            </div>
                        </div>
                        <div id="area_chart" class="graph"></div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</section>
