@props(['developments'])


<section class="popular__city-large" id="hide_on_mobile_only1">
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

        </div>
</section>
