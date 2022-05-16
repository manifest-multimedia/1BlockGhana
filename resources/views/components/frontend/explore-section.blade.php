@props(['properties'])

<section class=" recent__property pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="title__head-v2">
                    <h2 class="text-capitalize">Featured Properties</h2>
                    <p class="text-capitalize">Handpicked Exclusive Properties By Our Team.</p>
                </div>
            </div>
        </div>
        <div class="recent__property-carousel owl-carousel owl-theme">
            @foreach ($properties as $property)
            @if ($loop->odd)
            <div class="item">
                <!-- CARD IMAGE -->

                <a href="{{route('listing.details', $property->id)}}">
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

                <a href="{{route('listing.details', $property->id)}}">
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
</section>
