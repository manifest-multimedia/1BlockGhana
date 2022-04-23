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
        <x-backend.breadcrumb page="Properties" menu="Properties" name="Edit Property" link="{{route('property.edit',$property->id)}}" />

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div id="demo2" class="carousel slide" data-interval="false" data-ride="carousel">

                                <div class="carousel-inner">

                                    @foreach ($property->getMedia('properties') as $key => $image)
                                        <div class="carousel-item text-center {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($image->getUrl()) }}" class="img-fluid" alt="">
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
                    <div class="card property_list">
                        <div class="body">
                            <div class="property-content">
                                <div class="detail">
                                    <h5 class="text-success m-t-0 m-b-0">
                                        {{ $property->currency->code }}{{ $property->price }}</h5>
                                    <h4 class="m-t-0"><a href="#"
                                            class="col-blue-grey">{{ $property->name }}</a></h4>
                                    <p class="text-muted"><i
                                            class="zmdi zmdi-pin m-r-5"></i>{{ $property->location }}</p>
                                    <p class="text-muted m-b-0">{{ $property->description }}</p>
                                </div>
                                {{-- <div class="property-action m-t-15">
															<a href="#" title="Square Feet">Square Feet<span>{{$property->size}}sqt</span></a>
															<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>{{$property->bedroom}}</span></a>
															<a href="#" title="Kitichen "><i class="zmdi zmdi-home"></i><span>{{$property->kitchen}}</span></a>
															<a href="#" title="Bathroom"><i class="zmdi zmdi-home"></i><span>{{$property->bathroom}}</span></a>
													</div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>General</strong> Amenities</h2>

                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <ul class="list-unstyled proprerty-features">
                                        @foreach ($property->amenities as $amenity)
                                            <li class="list-group-item"><i
                                                    class="zmdi zmdi-check-circle text-success m-r-5"></i>{{ $amenity->name }}
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="header">
                            <h2><strong>Location</strong>  </h2>
                        </div>
                        <div class="body">
                            <script type="text/javascript" charset="utf-8" async
                                                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=svdezAlqZP2WIeKGiLW4EUnoJvnxVP7i&amp;width=100%&amp;height=400&amp;lang=tr_TR&amp;sourceType=constructor&amp;scroll=true">
                            </script>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Property </strong>Features</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered m-b-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Price:</th>
                                            <td>{{ $property->currency->code }}
                                                {{ $property->price }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Purpose: </th>
                                            <td><span class="badge badge-primary">{{ $property->purpose}}</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bathrooms:</th>
                                            <td>{{$property->bathroom}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bedroom:</th>
                                            <td>{{$property->bedroom}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Square ft:</th>
                                            <td>{{$property->size}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
</x-backend.app>
