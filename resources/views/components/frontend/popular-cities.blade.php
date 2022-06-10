@props(['developments','statics'])

<!-- HIDE ONLY ON MOBILE -->
<section class="popular__city-large" id="hide_on_mobile_only">
    <div class="container">
        <div class="row">

            <div class="mx-auto mt-4 px-0 col-md-12">
                <div id="carouselExampleFade" class="carousel carousel-dev-banner slide carousel-fade"
                    data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($developments as $key => $development)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <a href="{{route('development.listing.details', $development->slug)}}">
                                    <img class="d-block mx-auto" width="100%" style="max-height: 300px;"
                                    src="{{ $development->getFirstMediaUrl('development_banner') ? $development->getFirstMediaUrl('development_banner') : '' }}"
                                    alt="{{ $development->name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="row mt-5">

                <div class="col-md-6 ">
                    <!-- CARD IMAGE -->
                    <div id="carouselExampleFade" class="carousel carousel-static-banner slide carousel-fade"
                    data-ride="carousel" data-interval="10000">
                    <div class="carousel-inner">
                        @foreach ($statics as $key => $static)
                        @if ($loop->odd)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="d-block mx-auto" width="100%"
                                    src="{{ $static->getFirstMediaUrl('static_bottom') ? $static->getFirstMediaUrl('static_bottom') : '' }}"
                                    alt="{{ $static->name }}">
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <!-- CARD IMAGE -->
                    <div id="carouselExampleFade" class="carousel carousel-static-banner slide carousel-fade"
                    data-ride="carousel" data-interval="10000">
                    <div class="carousel-inner">
                        @foreach ($statics as $key => $static)
                        @if ($loop->even)
                            <div class="carousel-item {{ $key == 1 ? 'active' : '' }}">
                                <img class="d-block mx-auto" width="100%"
                                    src="{{ $static->getFirstMediaUrl('static_bottom') ? $static->getFirstMediaUrl('static_bottom') : '' }}"
                                    alt="{{ $static->name }}">
                            </div>
                        @endif
                        @endforeach
                    </div>
                </div>
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
            @foreach ($statics as $static)
            <div class="item">
                <div class="col-md-6 col-lg-4">
                    <!-- CARD IMAGE -->
                    <a href="#">
                        <div class="card__image-hover-style-v3">
                            <div class="card__image-hover-style-v3-thumb h-230">
                                <img src="{{ $static->getFirstMediaUrl('static_bottom') ? $static->getFirstMediaUrl('static_bottom') : '' }}" alt="" class="img-fluid w-100">
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
            @endforeach

            {{-- <div class="item">
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
            </div> --}}
        </div>
    </div>
    </section>
