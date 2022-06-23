@props(['developments'])

<section class="recent__property py-0">
    <div class="container px-0">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title__head-v2 mb-3">
                            <h2 class="text-capitalize">Featured Developments</h2>
                        </div>
                    </div>
                </div>
                <div class="recent__property-carousel owl-carousel owl-carousel-bottom owl-theme">
                    @foreach ($developments as $development)

                        @if ($loop->odd)
                            <div class="item">
                                <!-- CARD IMAGE -->

                                <a href="{{ route('development.listing.details', $development->slug) }}">
                                    <div class="card__image-hover h-250">
                                        <div class="card__image-hover-overlay">
                                            <div class="listing-badges">
                                                <span class="featured">
                                                    @if ($development->category)
                                                    {{ $development->category->subCategory->first()->name ?? 'Featured'}}
                                                    @endif

                                                </span>
                                                <span>
                                                    {{ $development->purpose ?? ''}}
                                                </span>
                                            </div>
                                            <div class="card__image-content">
                                                <div class="card__image-content-desc">
                                                    <h6> {{ $development->name }}</h6>
                                                    <p class="mb-0">
                                                       </p>
                                                </div>
                                                <ul class="list-inline card__hidden-content">




                                                </ul>
                                            </div>
                                            <img alt="" src="{{ $development->getFirstMediaUrl('developments') }}"
                                                class="img-fluid h-30 ">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- SECOND LAYOUT --}}
                <div class="recent__property-carousel owl-carousel owl-carousel-bottom owl-theme mt-2">
                    @foreach ($developments as $development)
                        @if ($loop->even)
                            <div class="item">
                                <!-- CARD IMAGE -->

                                <a href="{{ route('development.listing.details', $development->slug) }}">
                                    <div class="card__image-hover h-250">
                                        <div class="card__image-hover-overlay">
                                            <div class="listing-badges">
                                                <span class="featured">
                                                    Featured
                                                </span>
                                                <span>
                                                    {{ $development->purpose ?? ''}}
                                                </span>
                                            </div>
                                            <div class="card__image-content">
                                                <div class="card__image-content-desc">
                                                    <h6> {{ $development->name }}</h6>
                                                    <p class="mb-0">
                                                        {{ $development->currency->code ?? ''}}{{ $development->price ?? ''}}</p>
                                                </div>
                                                <ul class="list-inline card__hidden-content">


                                                </ul>
                                            </div>
                                            <img alt="" src="{{ $development->getFirstMediaUrl('developments') }}"
                                                class="img-fluid h-30 ">

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="col-md-4" id="hide_on_mobile_only">
                <div class="row">
                    <div class="col-12">
                        <div class="title__head-v2 mb-3">
                            <h2 class="text-capitalize">Popular locations</h2>
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item active">East Legon</li>
                            <li class="list-group-item">Cantoment</li>
                            <li class="list-group-item">Tema</li>
                            <li class="list-group-item">Aburi</li>
                            <li class="list-group-item">Oyibi</li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <section class="home__video1  my-2 bg-theme-v6">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="mx-auto col-lg-8">
                                        <div class="text-center home__video-area">
                                            <a href="/development-news#videos" class="play-video ">
                                                <i class="text-white icon fa fa-play"></i>
                                            </a>
                                            <p class="text-white">The #1 Place For Commercial Property</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('bottom-property-scripts')
    <script>
        $('.owl-carousel-bottom').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            // autoWidth:false,
            height: 100,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        })
    </script>
@endsection
