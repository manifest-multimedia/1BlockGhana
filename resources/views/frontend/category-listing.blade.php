<x-frontend.layout>

    <x-frontend.header />

    <x-frontend.breadcrumb-list title="{{$category_name}}"/>

    <div class="clearfix"></div>


    <!-- LISTING LIST -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    {{-- <x-frontend.filter-v /> --}}
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs__custom-v2">
                                <!-- FILTER VERTICAL -->
                                <ul class="nav nav-pills myTab" role="tablist">
                                    <li class="list-inline-item mr-auto">
                                        <span class="title-text">Sort by</span>
                                        <div class="btn-group">

                                            <div class="inline-filter mx-2">
                                                <select class="wide select_option">
                                                    <option data-display="Locations">Locations</option>
                                                    <option>Accra</option>
                                                    <option>Tema</option>
                                                    <option>Ho</option>
                                                    <option>Cape Coast</option>
                                                    <option>Kumasi</option>
                                                </select>
                                            </div>
                                            <div class="inline-filter mx-2">
                                                <select class="wide select_option">
                                                    <option data-display="Bedrooms">Bedrooms</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                </select>
                                            </div>
                                            <div class="inline-filter mx-2">
                                                <select class="wide select_option">
                                                    <option data-display="Bathrooms">Bathrooms</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link pills-tab-one" data-toggle="pill" href="#pills-tab-one"
                                            role="tab" aria-controls="pills-tab-one" aria-selected="true">
                                            <span class="fa fa-th-list"></span>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link active pills-tab-two" data-toggle="pill"
                                            href="#pills-tab-two" role="tab" aria-controls="pills-tab-two"
                                            aria-selected="false">
                                            <span class="fa fa-th-large"></span></a>
                                    </li>
                                </ul>



                                <div class="tab-content" id="myTabContent">


                                    <div class="tab-pane fade show active" id="pills-tab-two" role="tabpanel"
                                        aria-labelledby="pills-tab-two">
                                        <div class="row">


                                            @forelse ($properties as $property)
                                                <div class="col-md-4 col-lg-4">
                                                    <div class="card__image card__box-v1">
                                                        <div class="card__image-header h-250 img-space">
                                                            {{-- <div class="ribbon text-capitalize">sold out</div> --}}

                                                            <a href="{{ route('listing.details', $property->id) }}">
                                                                <img src="{{ $property->getFirstMediaUrl('properties') }}"
                                                                    alt="" class="img-fluid w100 img-transition">
                                                            </a>
                                                            <div class="info">
                                                                {{ $property->purpose ?? 'Not Stated' }}</div>
                                                        </div>
                                                        <div class="card__image-body">
                                                            <span
                                                                class="badge badge-primary text-capitalize mb-2">{{ $property->category->name ?? 'Uncategorised' }}</span>
                                                            <h6 class="text-capitalize">
                                                                <a
                                                                    href="{{ route('listing.details', $property->id) }}">{{ $property->name ?? 'Not Stated' }}</a>
                                                            </h6>

                                                            <p class="text-capitalize">
                                                                <i class="fa fa-map-marker"></i>
                                                                {{ $property->location ?? '--' }}
                                                            </p>
                                                            <ul class="list-inline card__content">
                                                                <li class="list-inline-item">

                                                                    <span>
                                                                        baths <br>
                                                                        <i class="fa fa-bath"></i>
                                                                        {{ $property->bathroom ?? '' }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        bedroom <br>
                                                                        <i class="fa fa-bed"></i>
                                                                        {{ $property->bedroom ?? '' }}
                                                                    </span>
                                                                </li>

                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        area <br>
                                                                        <i class="fa fa-map"></i>
                                                                        {{ $property->size ?? '' }} sq ft
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="card__image-footer">
                                                            <figure>
                                                                <img src="{{ $property->business->user->getFirstMediaUrl('logos', 'thumb-100') ?? '/frontend/images/80x80.jpg' }}"
                                                                    alt="" class="img-fluid rounded-circle">
                                                            </figure>
                                                            <ul class="list-inline my-auto">
                                                                <li class="list-inline-item">
                                                                    <a
                                                                        href="{{ route('agent.listing', $property->business->id) }}">
                                                                        {{ $property->business->user->firstname ?? '' }}
                                                                        {{ $property->business->user->lastname ?? '' }}
                                                                    </a>

                                                                </li>

                                                            </ul>
                                                            <ul class="list-inline my-auto ml-auto">
                                                                <li class="list-inline-item">

                                                                    <h6>{{ $property->currency->code }}{{ $property->price ?? '' }}
                                                                    </h6>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="m-auto">
                                                    <h5 class="mt-4">No listing in this category</h5>
                                                </div>
                                            @endforelse

                                        </div>


                                        <div class="cleafix"></div>
                                    </div>

                                </div>
                                <!-- END FILTER VERTICAL -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- END LISTING LIST -->


    <!-- CALL TO ACTION -->
    <section class="py-5 cta-v1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <h2 class="text-white text-uppercase">Looking To Sell Or Rent Your Property?</h2>
                    <p class="text-white text-capitalize">We Will Assist You In The Best And Comfortable Property
                        Services
                        For You
                    </p>

                </div>
                <div class="col-lg-3">
                    <a href="#" class="btn btn-light text-uppercase ">Contact Us
                        <i class="ml-3 fa fa-angle-right arrow-btn "></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- END CALL TO ACTION -->

</x-frontend.layout>
