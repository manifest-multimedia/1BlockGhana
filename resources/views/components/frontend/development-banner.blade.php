@props(['developments'])


<section class="popular__city-large" id="hide_on_mobile_only1">
    <div class="container">
        <div class="row">

            <div class="mx-auto mt-4 px-0 col-md-12">
                <div id="carouselExampleFade" class="carousel carousel-dev-banner slide carousel-fade"
                    data-ride="carousel">
                    <div class="carousel-inner development_banner">
                        @foreach ($developments as $key => $banner)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="ribbon text-capitalize" style="display: block">promoted</div>
                                <a href="{{route('development.listing.details', $banner->slug)}}">
                                    <img class="d-block mx-auto" width="100%" style="max-height: 300px;"
                                    src="{{ $banner->getFirstMediaUrl('development_banner') ? $banner->getFirstMedia('development_banner')->getUrl('banner_fit') : '' }}"
                                    alt="{{ $banner->name }}">
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>

        </div>
</section>
