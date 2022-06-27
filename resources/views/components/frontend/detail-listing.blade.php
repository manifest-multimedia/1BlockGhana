@props(['property', 'similar'])

<section class="single__Detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="card py-2 px-2">
                    <div class="col-lg-121">
                        <!-- TITLE PROPERTY AND PRICE  -->
                        <div class="single__detail-area pt-0 pb-4">
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <div class="single__detail-area-title">

                                        <h3 class="text-capitalize">{{ $property->name ?? 'No Name' }}</h3>
                                        <p>{{ $property->location ?? '--' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="single__detail-area-price">
                                        <h3 class="text-capitalize text-gray">
                                            {{ $property->currency->code ?? '--' }}{{ $property->price ?? '' }}</h3>

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
                                        <img src="{{ asset($image->getUrl()) ?? '' }}" alt=""
                                            class="img-fluid w-100 img-transition">
                                        <div class="description">
                                            <figure>
                                                <img src="{{ $property->business->user->getFirstMediaUrl('logos', 'thumb-100') }}"
                                                    alt="" class="img-fluid">
                                            </figure>
                                            <span
                                                class="badge badge-primary text-capitalize mb-2">{{ $property->purpose ?? '' }}</span>
                                            <div class="price">
                                                <h5 class="text-capitalize">
                                                    {{ $property->currency->code ?? '--' }}{{ $property->price ?? '' }}
                                                </h5>
                                            </div>
                                            <h4 class="text-capitalize">{{ $property->name ?? '' }}</h4>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="slider__image__detail-thumb-two owl-carousel owl-theme">
                            @foreach ($property->getMedia('properties') as $key => $image)
                                <div class="item">
                                    <div class="slider__image__detail-thumb-one">
                                        <img src="{{ asset($image->getUrl()) ?? '' }}" alt=""
                                            class="img-fluid w-100 img-transition">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- END SLIDER IMAGE DETAIL -->
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <!-- DESCRIPTION -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card py-2 px-2">
                            <div class="single__detail-desc">
                                <h6 class="text-capitalize detail-heading">description</h6>
                                <div class="show__more1">
                                    <p>{{ $property->description ?? '' }}</p>

                                    {{-- <a href="javascript:void(0)" class="show__more-button ">read more</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="clearfix m-3"></div>

                        <div class="card px-2">
                            <!-- PROPERTY DETAILS SPEC -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">property details</h6>
                                <!-- INFO PROPERTY DETAIL -->
                                <div class="property__detail-info1">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Property ID:</th>
                                                        <td>{{ $property->property_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Property Size:</th>
                                                        <td>{{ $property->size }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Bedrooms:</th>
                                                        <td>{{ $property->bedroom }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Bathrooms:</th>
                                                        <td>{{ $property->bathroom }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                                </div>
                                <!-- END INFO PROPERTY DETAIL -->
                            </div>
                            <!-- END PROPERTY DETAILS SPEC -->
                        </div>
                        <div class="clearfix m-3"></div>

                        <div class="card px-2">
                            <!-- FEATURES -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">features</h6>
                                <ul class="list-unstyled icon-checkbox">
                                    @foreach ($property->amenities as $amenity)
                                        <li>{{ $amenity->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- END FEATURES -->
                        </div>

                        <div class="clearfix m-3"></div>

                        <div class="card px-2">
                            <!-- LOCATION -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">location</h6>
                                <!-- FILTER VERTICAL -->
                                <p>{{ $property->location }}</p>
                                <!-- END FILTER VERTICAL -->
                            </div>
                            <!-- END LOCATION -->
                        </div>
                    </div>
                </div>
                <!-- END DESCRIPTION -->
            </div>
            <div class="col-lg-4">
                <div class="sticky-top">
                    <!-- PROFILE AGENT -->
                    <div class="profile__agent mb-30 card">
                        <div class="profile__agent__group">

                            <div class="profile__agent__header">
                                <div class="profile__agent__header-avatar">
                                    <figure>
                                        <img src="{{ $property->business->user->getFirstMediaUrl('logos', 'thumb-100') }}"
                                            alt="" class="img-fluid">
                                    </figure>

                                    <ul class="list-unstyled mb-0">
                                        <li><a
                                                href="{{ route('partner.single.listing', $property->business->slug) }}">
                                                <h5 class="text-capitalize">
                                                    {{ $property->business->user->firstname }}
                                                    {{ $property->business->user->lastname }}</h5>
                                            </a>

                                        </li>
                                        <li><a href="tel:{{ $property->business->user->mobile }}"><i
                                                    class="fa fa-phone-square mr-1"></i>{{ $property->business->user->mobile }}</a>
                                        </li>
                                        <li><a href="mailto:{{ $property->business->email }}"><i
                                                    class="fa fa-envelope mr-1"></i>{{ $property->business->email }}</a>
                                        </li>
                                        <li><a
                                                href="{{ route('partner.single.listing', $property->business->slug) }}"><i
                                                    class=" fa fa-building mr-1"></i>
                                                {{ $property->business->name }}</a>
                                        </li>
                                        <li><a href="{{ $property->business->website ?? '#' }}"><i
                                                    class=" fa fa-globe mr-1"></i>
                                                {{ $property->business->website ?? '--' }}</a>
                                        </li>
                                        {{-- <li> <a href="javascript:void(0)" class="">View My Listing</a>
                                            </li> --}}
                                    </ul>


                                </div>

                            </div>
                            <x-notification.message />
                            <form class="form" method="POST"
                                action="{{ route('send.partner.mail', $property->slug) }}">
                                @csrf
                                <div class="profile__agent__body">
                                    <div class="form-group">
                                        <input type="text" name="fullname" class="form-control"
                                            placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <textarea name="message" class="form-control required" rows="5" required="required" placeholder="I'm interest in ..."></textarea>
                                    </div>
                                </div>
                                <div class="profile__agent__footer">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary text-capitalize btn-block"> send message <i
                                                class="fa fa-paper-plane ml-1"></i>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- END PROFILE AGENT -->
                </div>

            </div>

        </div>

        <!-- SIMILIAR PROPERTY -->
        @if (!$similar->isEmpty())
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="similiar__item">
                        <h6 class="text-capitalize detail-heading">
                            similiar properties
                        </h6>
                        <div class="similiar__property-carousel owl-carousel owl-theme">
                            @foreach ($similar as $prop)
                                <div class="item">
                                    <!-- ONE -->
                                    <div class="card__image">
                                        <div class="card__image-header h-250">
                                            {{-- <div class="ribbon text-capitalize">featured</div> --}}
                                            <a href="{{ route('listing.details', $prop->slug) }}">
                                                <img src="{{ $prop->getFirstMediaUrl('properties') }}" alt=""
                                                    class="img-fluid w100 img-transition">
                                            </a>
                                            <div class="info"> {{ $prop->purpose }}</div>
                                        </div>
                                        <div class="card__image-body">
                                            <span
                                                class="badge badge-primary text-capitalize mb-2">{{ $prop->category->name ?? '' }}</span>
                                            <h6 class="text-capitalize">
                                                <a
                                                    href="{{ route('listing.details', $prop->slug) }}">{{ $prop->name }}</a>
                                            </h6>

                                            <p class="text-capitalize">
                                                <i class="fa fa-map-marker"></i>
                                                {{ $prop->location }}
                                            </p>
                                            <ul class="list-inline card__content">
                                                <li class="list-inline-item">

                                                    <span>
                                                        baths <br>
                                                        <i class="fa fa-bath"></i> {{ $prop->bathroom }}
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>
                                                        beds <br>
                                                        <i class="fa fa-bed"></i>{{ $prop->bedroom }}
                                                    </span>
                                                </li>

                                                <li class="list-inline-item">
                                                    <span>
                                                        area <br>
                                                        <i class="fa fa-map"></i> {{ $prop->size }} sq ft
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card__image-footer">
                                            <figure>
                                                <img src="{{ $prop->business->user->getFirstMediaUrl('logos', 'thumb-100') }}"
                                                    alt="" class="img-fluid rounded-circle">
                                            </figure>
                                            <ul class="list-inline my-auto">
                                                <li class="list-inline-item">
                                                    <a
                                                        href="{{ route('partner.single.listing', $prop->business->slug) }}">
                                                        {{ $prop->business->user->firstname }}
                                                        {{ $prop->business->user->lastname }} <br>
                                                    </a>

                                                </li>

                                            </ul>
                                            <ul class="list-inline my-auto ml-auto">
                                                <li class="list-inline-item">

                                                    <h6 class="">{{ $prop->price }}</h6>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>




                    </div>
                </div>
            </div>
        @endif
        <!-- END SIMILIAR PROPERTY -->

    </div>
</section>
