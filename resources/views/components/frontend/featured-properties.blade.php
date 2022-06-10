@props(['properties'])

<section class="recent__property py-0">
    <div class="container px-0">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title__head-v2 mb-3">
                            <h2 class="text-capitalize">Featured Properties</h2>
                        </div>
                    </div>
                </div>
                <div class="recent__property-carousel owl-carousel owl-carousel-bottom owl-theme">
                    @foreach ($properties as $property)
                    @if ($loop->odd)
                    <div class="item">
                        <!-- CARD IMAGE -->

                        <a href="{{route('listing.details', $property->slug)}}">
                            <div class="card__image-hover h-250">
                                <div class="card__image-hover-overlay">
                                    <div class="listing-badges">
                                        <span class="featured">
                                            Featured
                                        </span>
                                        <span>
                                            {{$property->purpose}}
                                        </span>
                                    </div>
                                    <div class="card__image-content">
                                        <div class="card__image-content-desc">
                                            <h6> {{$property->name}}</h6>
                                            <p class="mb-0">{{ $property->currency->code }}{{$property->price}}</p>
                                        </div>
                                        <ul class="list-inline card__hidden-content">
                                            <li class="list-inline-item">
                                                Baths
                                                <span>
                                                    <i class="fa fa-bath"></i> {{$property->bathroom}}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                Beds
                                                <span>
                                                    <i class="fa fa-bed"></i> {{$property->bedroom}}
                                                </span>
                                            </li>

                                            <li class="list-inline-item">
                                                Area
                                                <span>
                                                    <i class="fa fa-map"></i> {{$property->size}} sq ft
                                                </span>
                                            </li>

                                        </ul>
                                    </div>
                                    <img alt="" src="{{$property->getFirstMediaUrl('properties')}}" class="img-fluid h-30 ">
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif

                    @endforeach
                </div>

                {{-- SECOND LAYOUT --}}
                <div class="recent__property-carousel owl-carousel owl-theme mt-2">
                    @foreach ($properties as $property)
                    @if ($loop->even)
                    <div class="item">
                        <!-- CARD IMAGE -->

                        <a href="{{route('listing.details', $property->slug)}}">
                            <div class="card__image-hover h-250">
                                <div class="card__image-hover-overlay">
                                    <div class="listing-badges">
                                        <span class="featured">
                                            Featured
                                        </span>
                                        <span>
                                            {{$property->purpose}}
                                        </span>
                                    </div>
                                    <div class="card__image-content">
                                        <div class="card__image-content-desc">
                                            <h6> {{$property->name}}</h6>
                                            <p class="mb-0">{{ $property->currency->code }}{{$property->price}}</p>
                                        </div>
                                        <ul class="list-inline card__hidden-content">
                                            <li class="list-inline-item">
                                                Baths
                                                <span>
                                                    <i class="fa fa-bath"></i> {{$property->bathroom}}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                Beds
                                                <span>
                                                    <i class="fa fa-bed"></i> {{$property->bedroom}}
                                                </span>
                                            </li>

                                            <li class="list-inline-item">
                                                Area
                                                <span>
                                                    <i class="fa fa-map"></i> {{$property->size}} sq ft
                                                </span>
                                            </li>

                                        </ul>
                                    </div>
                                    <img alt="" src="{{$property->getFirstMediaUrl('properties')}}" class="img-fluid h-30 ">

                                </div>
                            </div>
                        </a>
                    </div>
                    @endif

                    @endforeach

                </div>
            </div>

            <div class="col-md-4">
                <div class="row1">
                        <div class="title__head-v2 mb-3">
                            <h2 class="text-capitalize">Popular locations</h2>
                        </div>
                </div>
                    <ul class="list-group">
                        <li class="list-group-item active">Accra</li>
                        <li class="list-group-item">Aburi</li>
                        <li class="list-group-item">Tema</li>
                        <li class="list-group-item">East Legon</li>
                        <li class="list-group-item">Nima</li>
                    </ul>
            </div>
        </div>
    </div>
</section>

@section('bottom-property-scripts')
    <script>
        $('.owl-carousel-bottom').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            autoplay:true,
           // autoWidth:false,
            height: 100,
            autoplayTimeout:3000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        })
    </script>
@endsection
