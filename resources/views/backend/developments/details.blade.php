<x-backend.app>
    @section('styles')
        <style>
            .list-unstyled .proprerty-features {
                display: block;
                clear: both;
                content: "";
            }

            .list-group-item {
                float: left;
                border: none;
            }

        </style>
    @endsection
    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Developments" menu="Developments" name="Edit Development"
            link="{{ route('development.edit', $development->id) }}" />

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div id="demo2" class="carousel slide" data-interval="false" data-ride="carousel">

                                <div class="carousel-inner">

                                    @foreach ($development->getMedia('developments') as $key => $image)
                                        <div class="carousel-item text-center {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($image->getUrl()) ?? '' }}" class="img-fluid"
                                                alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo2" data-slide="prev"><span
                                        class="carousel-control-prev-icon"></span></a>
                                <a class="carousel-control-next" href="#demo2" data-slide="next"><span
                                        class="carousel-control-next-icon"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="card development_list">
                        <div class="body">
                            <div class="development-content">
                                <div class="detail">

                                    <h4 class="m-t-0"><a href="#"
                                            class="col-blue-grey">{{ $development->name ?? 'No Name' }}</a></h4>
                                    <p class="text-muted"><i
                                            class="zmdi zmdi-pin m-r-5"></i>{{ $development->location ?? '--' }}</p>
                                    <p class="text-muted m-b-0">{{ $development->description ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="header">
                            <h2><strong>General</strong> Amenities</h2>

                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <ul class="list-unstyled proprerty-features">
                                        @foreach ($development->amenities as $amenity)
                                            <li class="list-group-item"><i
                                                    class="zmdi zmdi-check-circle text-success m-r-5"></i>{{ $amenity->name ?? '' }}
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>
        </div>

    </section>
</x-backend.app>
