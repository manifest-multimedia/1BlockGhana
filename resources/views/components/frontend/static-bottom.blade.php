@props(['statics'])

<section class="popular__city-large" id="hide_on_mobile_only1">
    <div class="container">
        <div class="row">

            <div class="row">
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
