@props(['developments'])

<!-- HIDE ONLY ON MOBILE -->
<section class="popular__city-large" id="hide_on_mobile_only">
    <div class="container">
        <div class="row">

            <div class="mx-auto mt-4 px-0 col-md-12">
                <div id="carouselExampleFade" class="carousel carousel-dev-banner slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($developments as $key => $development)
                        <div class="carousel-item {{ $key == 0 ? 'active':''}}">
                            <img class="d-block mx-auto" width="100%" style="max-height: 300px;" src="{{$development->getFirstMediaUrl('development_banner')}}" alt="{{$development->name}}">
                        </div>
                        @endforeach
                  </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-2">
                <!-- CARD IMAGE -->
                <a href="#">
                    <div class="card__image-hover-style-v3">
                        <div class="card__image-hover-style-v3-thumb h-230">
                            <img src="frontend/images/city.jpg" alt="" class="img-fluid w-100">
                        </div>
                        <div class="overlay">
                            <div class="desc1 pt-3">

                                <h6 class="text-capitalize"><a href="javascript:void(0)" style="color:#fff;">Popular Location</a></h6>
                                <hr>
                                <p style="color:#fff;"><strong>Coming soon</strong></p>
                                {{-- <h6 class="text-capitalize">East Legon</h6>
                                <hr>
                                <h6 class="text-capitalize">Accra</h6>
                                <h6 class="text-capitalize">Kumasi</h6>
                                <h6 class="text-capitalize">Labadi</h6>
                                <h6 class="text-capitalize">Osu</h6> --}}

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-5">
                <!-- CARD IMAGE -->
                <a href="#">
                    <div class="card__image-hover-style-v3">
                        <div class="card__image-hover-style-v3-thumb h-230">
                            <img src="frontend/images/coast.jpg" alt="" class="img-fluid w-100">
                        </div>
                        {{-- <div class="overlay">
                            <div class="desc">
                                <h6 class="text-capitalize">On the coast</h6>
                                <p class="text-capitalize">Wake up to fresh air and sea views</p>
                            </div>
                        </div> --}}
                    </div>
                </a>
            </div>
            <div class="col-md-5">
                <!-- CARD IMAGE -->
                <a href="#">
                    <div class="card__image-hover-style-v3">
                        <div class="card__image-hover-style-v3-thumb h-230">
                            <img src="frontend/images/countryside.jpg" alt="" class="img-fluid w-100">
                        </div>
                        {{-- <div class="overlay">
                            <div class="desc">
                                <h6 class="text-capitalize">Rural and countryside</h6>
                                <p class="text-capitalize">Enjoy living close to nature</p>
                            </div>
                        </div> --}}
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>


<!-- SHOW ONLY ON MOBILE -->
<section class="blog__home bg-light" id="show_on_mobile_only">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-8 col-lg-6">
                <div class="title__head">
                    <h2 class="text-center text-capitalize">
                        popular Locations
                    </h2>
                    <p class="text-center text-capitalize">Find Properties In These Locations.</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="recent__property-carousel owl-carousel owl-theme">
            <div class="item">
                <div class="col-md-6 col-lg-4">
                    <!-- CARD IMAGE -->
                    <a href="#">
                        <div class="card__image-hover-style-v3">
                            <div class="card__image-hover-style-v3-thumb h-230">
                                <img src="frontend/images/city.jpg" alt="" class="img-fluid w-100">
                            </div>
                            <div class="overlay">
                                <div class="desc">
                                    <h6 class="text-capitalize">In the city</h6>
                                    <p class="text-capitalize">Live among the hustle and bustle</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="col-md-6 col-lg-4">
                    <!-- CARD IMAGE -->
                    <a href="#">
                        <div class="card__image-hover-style-v3">
                            <div class="card__image-hover-style-v3-thumb h-230">
                                <img src="frontend/images/coast.jpg" alt="" class="img-fluid w-100">
                            </div>
                            <div class="overlay">
                                <div class="desc">
                                    <h6 class="text-capitalize">On the coast</h6>
                                    <p class="text-capitalize">Wake up to fresh air and sea views</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="col-md-6 col-lg-4">
                    <!-- CARD IMAGE -->
                    <a href="#">
                        <div class="card__image-hover-style-v3">
                            <div class="card__image-hover-style-v3-thumb h-230">
                                <img src="frontend/images/countryside.jpg" alt="" class="img-fluid w-100">
                            </div>
                            <div class="overlay">
                                <div class="desc">
                                    <h6 class="text-capitalize">Rural and countryside</h6>
                                    <p class="text-capitalize">Enjoy living close to nature</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    @section('development_banner_scripts')
    <script>
        $('.carousel-dev-banner').owlCarousel({
            //autoplayTimeout:3500,
            interval: 1000
        });

    </script>
</section>



