<x-frontend.layout>

    <x-frontend.header />

    <x-frontend.breadcrumb-list title="{{ $business->name }}" />

    <div class="clearfix"></div>


    <!-- LISTING LIST -->

    <section class="profile__agents">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tab-content" id="myTabContent">

                        @if (!$business->developments->isEmpty())
                            <div class="tab-pane fade show active mb-5" id="pills-tab-two" role="tabpanel"
                                aria-labelledby="pills-tab-two">
                                <div class="title__head-v2 mb-0">
                                    <h2 class="text-capitalize">Developments</h2>
                                </div>
                                <div class="row">



                                        @forelse ($business->developments as $development)
                                            @if ($development->business->business_status >= 1)
                                                <div class="col-md-6">
                                                    <div class="card__image card__box-v1 mt-2">
                                                        <div class="card__image-header h-250 img-space">
                                                            {{-- <div class="ribbon text-capitalize">sold out</div> --}}

                                                            <a
                                                                href="{{ route('listing.details', $development->slug) }}">
                                                                <img src="{{ $development->getFirstMediaUrl('properties') ?? '' }}"
                                                                    alt="" class="img-fluid w100 img-transition">
                                                            </a>
                                                            @if ($development->purpose)
                                                                <div class="info">
                                                                    {{ $development->purpose ?? null }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="card__image-body">
                                                            <span
                                                                class="badge badge-primary text-capitalize mb-2">{{ $development->category->name ?? 'Uncategorised' }}</span>
                                                            <h6 class="text-capitalize">
                                                                <a
                                                                    href="{{ route('listing.details', $development->slug) }}">{{ $development->name ?? 'Not Stated' }}</a>
                                                            </h6>

                                                            <p class="text-capitalize">
                                                                <i class="fa fa-map-marker"></i>
                                                                {{ $development->location ?? '--' }}
                                                            </p>
                                                            <ul class="list-inline card__content">


                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        area <br>
                                                                        <i class="fa fa-map"></i>
                                                                        {{ $development->size ?? '' }} sq ft
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                            <div class="m-auto">
                                                <h5 class="mt-4">No Development</h5>
                                            </div>
                                        @endforelse


                                </div>


                                <div class="cleafix"></div>
                            </div>
                        @endif

                        @if (!$business->properties->isEmpty())
                            <div class="tab-pane fade show active" id="pills-tab-two" role="tabpanel"
                                aria-labelledby="pills-tab-two">
                                <div class="title__head-v2 mb-0">
                                    <h2 class="text-capitalize">Properties</h2>
                                </div>
                                <div class="row">


                                    @forelse ($business->properties as $property)
                                        @if ($property->business->business_status >= 1)
                                            <div class="col-md-6">
                                                <div class="card__image card__box-v1 mt-2">
                                                    <div class="card__image-header h-250 img-space">
                                                        {{-- <div class="ribbon text-capitalize">sold out</div> --}}

                                                        <a href="{{ route('listing.details', $property->slug) }}">
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
                                                                href="{{ route('listing.details', $property->slug) }}">{{ $property->name ?? 'Not Stated' }}</a>
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
                                                </div>
                                            </div>
                                        @endif
                                    @empty
                                        <div class="m-auto">
                                            <h5 class="mt-4">No listing</h5>
                                        </div>
                                    @endforelse

                                </div>


                                <div class="cleafix"></div>
                            </div>
                        @endif

                        @if ($business->properties->isEmpty() && $business->developments->isEmpty())
                            <div class="m-auto">
                                <h5 class="mt-4">No listing found</h5>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <!-- PROFILE AGENT -->
                        <div class="profile__agent mb-30">
                            <div class="profile__agent__group">

                                <div class="profile__agent__header">
                                    <div class="profile__agent__header-avatar">
                                        <figure>
                                            <img src="{{ $business->user->getFirstMediaUrl('logos', 'thumb-100') }}"
                                                alt="" class="img-fluid">
                                        </figure>

                                        <ul class="list-unstyled mb-0">
                                            <li><a href="javascript:void()">
                                                    <h5 class="text-capitalize">
                                                        {{ $business->user->firstname }}
                                                        {{ $business->user->lastname }}</h5>
                                                </a>

                                            </li>
                                            <li><a href="tel:{{ $business->user->mobile }}"><i
                                                        class="fa fa-phone-square mr-1"></i>{{ $business->user->mobile }}</a>
                                            </li>
                                            <li><a href="mailto:{{ $business->user->email }}"><i
                                                        class="fa fa-envelope mr-1"></i>{{ $business->user->email }}</a>
                                            </li>
                                            <li><a href="javascript:void(0)"><i class=" fa fa-building mr-1"></i>
                                                    {{ $business->name }}</a>
                                            </li>
                                            <li><a href="http://{{ $business->website ?? '--' }}" target="_blank"><i
                                                        class=" fa fa-globe mr-1"></i>
                                                    {{ $business->website ?? '--' }}</a>
                                            </li>
                                            {{-- <li> <a href="javascript:void(0)" class="">View My Listing</a>
                                        </li> --}}
                                        </ul>


                                    </div>

                                </div>
                                <x-notification.message />
                                <form class="form" method="POST"
                                    action="{{ route('send.partner.mail', $business->user->id) }}">
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
        </div>
    </section>

    <!-- END LISTING LIST -->


    <!-- CALL TO ACTION -->
    <x-frontend.cta />
    <!-- END CALL TO ACTION -->

</x-frontend.layout>
