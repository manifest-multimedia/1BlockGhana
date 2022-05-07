@props(['property','similar'])

<section class="single__Detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- TITLE PROPERTY AND PRICE  -->
                <div class="single__detail-area pt-0 pb-4">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <div class="single__detail-area-title">

                                <h3 class="text-capitalize">{{$property->name ?? 'No Name'}}</h3>
                                <p>{{$property->location ?? '--'}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="single__detail-area-price">
                                <h3 class="text-capitalize text-gray">{{ $property->currency->code ?? '--' }}{{$property->price ?? ''}}</h3>
                                {{-- <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-exchange"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-heart"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" class="badge badge-primary p-2 rounded"><i
                                                class="fa fa-print"></i></a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TITLE PROPERTY AND PRICE  -->

                <!-- SLIDER IMAGE DETAIL -->
                <div class="slider__image__detail-large-two owl-carousel owl-theme">
                   @foreach ($property->getMedia('properties') as $key => $image)
                    <div class="item">
                        <div class="slider__image__detail-large-one">
                            <img src="{{ asset($image->getUrl()) ?? ''}}" alt="" class="img-fluid w-100 img-transition">
                            <div class="description">
                                <figure>
                                    <img src="{{$property->business->user->getFirstMediaUrl('logos', 'thumb-100')}}" alt="" class="img-fluid">
                                </figure>
                                <span class="badge badge-primary text-capitalize mb-2">{{$property->purpose ?? ''}}</span>
                                <div class="price">
                                    <h5 class="text-capitalize">{{ $property->currency->code ?? '--' }}{{$property->price ?? ''}}</h5>
                                </div>
                                <h4 class="text-capitalize">{{$property->name ?? ''}}</h4>

                            </div>

                        </div>
                    </div>
                  @endforeach
                </div>

                <div class="slider__image__detail-thumb-two owl-carousel owl-theme">
                    @foreach ($property->getMedia('properties') as $key => $image)
                    <div class="item">
                        <div class="slider__image__detail-thumb-one">
                            <img src="{{ asset($image->getUrl()) ?? ''}}" alt="" class="img-fluid w-100 img-transition">
                        </div>
                    </div>
                   @endforeach
                </div>
                <!-- END SLIDER IMAGE DETAIL -->
            </div>
            <div class="col-lg-8">
                <!-- DESCRIPTION -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single__detail-desc">
                            <h6 class="text-capitalize detail-heading">description</h6>
                            <div class="show__more1">
                                <p>{{$property->description ?? ''}}</p>

                                {{-- <a href="javascript:void(0)" class="show__more-button ">read more</a> --}}
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <!-- PROPERTY DETAILS SPEC -->
                        <div class="single__detail-features">
                            <h6 class="text-capitalize detail-heading">property details</h6>
                            <!-- INFO PROPERTY DETAIL -->
                            <div class="property__detail-info">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <ul class="property__detail-info-list list-unstyled">
                                            <li><b>Property ID:</b> {{$property->property_id}}</li>

                                            <li><b>Property Size:</b>{{$property->size}}</li>
                                            <li><b>Bedrooms:</b> {{$property->bedroom}}</li>
                                            <li><b>Bathrooms:</b> {{$property->bathroom}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <ul class="property__detail-info-list list-unstyled">


                                        </ul>
                                    </div>
                                </div>
                                {{-- <h6 class="">Additional details</h6>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <ul class="property__detail-info-list list-unstyled">
                                            <li><b>Property ID:</b> RV151</li>
                                            <li><b>Price:</b> $484,400</li>
                                            <li><b>Property Size:</b> 1466 Sq Ft</li>
                                            <li><b>Bedrooms:</b> 4</li>
                                            <li><b>Bathrooms:</b> 2</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <ul class="property__detail-info-list list-unstyled">
                                            <li><b>Garage:</b> 1</li>
                                            <li><b>Garage Size:</b> 458 SqFt</li>
                                            <li><b>Year Built:</b> 2019-01-09</li>
                                            <li><b>Property Type:</b> Full Family Home</li>
                                            <li><b>Property Status:</b> For rent</li>
                                        </ul>
                                    </div>
                                </div> --}}

                            </div>
                            <!-- END INFO PROPERTY DETAIL -->
                        </div>
                        <!-- END PROPERTY DETAILS SPEC -->
                        <div class="clearfix"></div>

                        <!-- FEATURES -->
                        <div class="single__detail-features">
                            <h6 class="text-capitalize detail-heading">features</h6>
                            <ul class="list-unstyled icon-checkbox">
                                @foreach ($property->amenities as $amenity)
                                <li>{{$amenity->name}}</li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- END FEATURES -->

                        <!-- LOCATION -->
                        <div class="single__detail-features">
                            <h6 class="text-capitalize detail-heading">location</h6>
                            <!-- FILTER VERTICAL -->
                            <p>{{$property->location}}</p>
                            {{-- <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-map-location" role="tabpanel"
                                    aria-labelledby="pills-map-location-tab">

                                    <div id="map-canvas">
                                        <iframe class="h600 w100"
                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d50446.89789906054!2d-122.41577600000001!3d37.791654!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd473843de08ff793!2sBetter%20Property%20Management!5e0!3m2!1sen!2sus!4v1591226304089!5m2!1sen!2sus"
                                            style="border:0;" allowfullscreen="" aria-hidden="false"
                                            tabindex="0"></iframe>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-street-view" role="tabpanel"
                                    aria-labelledby="pills-street-view-tab">
                                    <iframe class="h600 w100"
                                        src="https://www.google.com/maps/embed?pb=!4v1553797194458!6m8!1m7!1sR4K_5Z2wRHTk9el8KLTh9Q!2m2!1d36.82551718071267!2d-76.34864590837246!3f305.15097!4f0!5f0.7820865974627469"
                                        style="border:0;" allowfullscreen></iframe>
                                </div>


                            </div> --}}
                            <!-- END FILTER VERTICAL -->
                        </div>
                        <!-- END LOCATION -->
                    </div>
                </div>
                <!-- END DESCRIPTION -->
            </div>
            <div class="col-lg-4 pt-5">

                <div class="sticky-top">
                    <!-- PROFILE AGENT -->
                    <div class="profile__agent mb-30">
                        <div class="profile__agent__group">

                            <div class="profile__agent__header">
                                <div class="profile__agent__header-avatar">
                                    <figure>
                                        <img src="{{$property->business->user->getFirstMediaUrl('logos', 'thumb-100')}}" alt="" class="img-fluid">
                                    </figure>

                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{ route('agent.listing', $property->business->id)}}">
                                            <h5 class="text-capitalize">{{$property->business->user->firstname}} {{$property->business->user->lastname}}</h5>
                                        </a>

                                        </li>
                                        <li><a href="tel:123456"><i
                                                    class="fa fa-phone-square mr-1"></i>{{$property->business->user->mobile}}</a></li>
                                        <li><a href="tel:123456"><i
                                                    class="fa fa-envelope mr-1"></i>{{$property->business->user->email}}</a></li>
                                        <li><a href="javascript:void(0)"><i class=" fa fa-building mr-1"></i>
                                            {{$property->business->name}}</a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class=" fa fa-globe mr-1"></i>
                                            {{$property->business->website?? '--'}}</a>
                                        </li>
                                       {{--  <li> <a href="javascript:void(0)" class="">View My Listing</a>
                                        </li> --}}
                                    </ul>


                                </div>

                            </div>
                            <div class="profile__agent__body">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group mb-0">
                                    <textarea class="form-control required" rows="5" required="required"
                                        placeholder="I'm interest in ..."></textarea>
                                </div>
                            </div>
                            <div class="profile__agent__footer">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary text-capitalize btn-block"> send message <i
                                            class="fa fa-paper-plane ml-1"></i></button>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END PROFILE AGENT -->
                </div>
            </div>

        </div>

        <!-- SIMILIAR PROPERTY -->
        <div class="row">
            <div class="col-lg-12">
                <div class="similiar__item">
                    <h6 class="text-capitalize detail-heading">
                        similiar properties
                    </h6>
                    <div class="similiar__property-carousel owl-carousel owl-theme">
                        @forelse ($similar as $prop)
                        <div class="item">
                            <!-- ONE -->
                            <div class="card__image">
                                <div class="card__image-header h-250">
                                    {{-- <div class="ribbon text-capitalize">featured</div> --}}
                                    <a href="{{route('listing.details', $prop->id)}}">
                                        <img src="{{$prop->getFirstMediaUrl('properties')}}" alt="" class="img-fluid w100 img-transition">
                                    </a>
                                    <div class="info"> {{$prop->purpose}}</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">{{$prop->category->name ?? ''}}</span>
                                    <h6 class="text-capitalize">
                                        <a href="{{route('listing.details', $prop->id)}}">{{$prop->name}}</a>
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        {{$prop->location}}
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> {{$prop->bathroom}}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i>{{$prop->bedroom}}
                                            </span>
                                        </li>

                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> {{$prop->size}} sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="{{$property->business->user->getFirstMediaUrl('logos', 'thumb-100')}}" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="{{ route('agent.listing', $property->business->id)}}">
                                                {{$property->business->user->firstname}} {{$property->business->user->lastname}} <br>
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">

                                            <h6 class="">{{$prop->price}}</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p>There is no Similar Property</p>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
        <!-- END SIMILIAR PROPERTY -->

    </div>
</section>
