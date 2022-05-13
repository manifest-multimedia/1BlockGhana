<x-frontend.layout>

    <x-frontend.header />

    <x-frontend.breadcrumb-list title="{{ $businessType }}" />

    <div class="clearfix"></div>


    <!-- LISTING LIST -->

    <section class="profile__agents">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- FORM FILTER -->
                    <div class="products__filter mb-30">
                        <div class="products__filter__group">
                            <div class="products__filter__header">

                                <h5 class="text-center text-capitalize">find agents</h5>
                            </div>
                            <div class="products__filter__body">
                                <div class="form-group">
                                    <label>Enter Agent name</label>
                                    <input type="text" class="form-control" placeholder="Enter agent name">

                                </div>

                                <div class="form-group">
                                    <label>All Cities</label>
                                    <select class="select_option wide">
                                        <option data-display="All City">All Cities</option>
                                        <option>Atlanta</option>
                                        <option>Florida</option>
                                        <option>Los Angeles</option>
                                        <option>Miami</option>
                                        <option>New York</option>
                                        <option>Orlando</option>
                                    </select>

                                </div>
                            </div>
                            <div class="products__filter__footer">
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary text-capitalize btn-block"> search agents <i
                                            class="fa fa-search ml-1"></i></button>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END FORM FILTER -->
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @forelse ($businesses as $business)
                        <div class="col-lg-6">
                            <div class="cards mt-4">
                                <div class="profile__agents-header">
                                    <a href="#" class="profile__agents-avatar">
                                        <img src="{{$business->user->getFirstMediaUrl('logos')}}" alt="" class="img-fluid">
                                        <div class="total__property-agent">{{$business->properties->count()}} listing</div>
                                    </a>
                                </div>
                                <div class="profile__agents-body">
                                    <div class="profile__agents-info">
                                        <h5 class="text-capitalize">
                                            <a href="#" target="_blank">{{$business->name}}</a>
                                        </h5>
                                        <p class="text-capitalize mb-1">{{$business->businessType->name ?? ''}}</p>

                                        <ul class="list-unstyled mt-2">
                                            <li><a href="tel:{{$business->mobile}}" class="text-capitalize"><span><i class="fa fa-phone"></i>
                                                        Mobile :</span> {{$business->mobile}}</a>
                                            </li>


                                            <li><a href="mailto:{{$business->email}}" class="text-capitalize"><span><i class="fa fa-envelope"></i>
                                                        email :</span>
                                                    {{$business->email}}</a></li>
                                            <li><a href="http://{{$business->website}}" class="text"><span><i class="fa fa-globe"></i>
                                                        Website :</span>
                                                    {{$business->website}}</a></li>
                                        </ul>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>No Agent at the moment</p>
                        @endforelse

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
