@props(['categories'])

<div class="bg__overlay bg-light-gray p-4">
    <div class="search__property">
        <div class="position-relative">
            {{-- <ul class="nav nav-tabs nav-tabs-02 mb-3 justify-content-start" id="pills-tab"
                role="tablist">
                <li class="nav-item mr-1">
                    <a class="nav-link active" id="buy-tab" data-toggle="pill" href="#buy"
                        role="tab" aria-controls="buy" aria-selected="true">Buy </a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link" id="rent-tab" data-toggle="pill" href="#rent"
                        role="tab" aria-controls="rent" aria-selected="false">Rent</a>
                </li>

            </ul> --}}
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="buy" role="tabpanel"
                    aria-labelledby="buy-tab">
                    <div class=" search__container">
                        <div class="row input-group no-gutters">
                            <div class="col-6 col-md-2 pr-2">
                                <select class="select_option form-control" name="select">
                                    <option selected>Property Type</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 col-6 pr-md-2">
                                <div class="form-group">
                                    <input type="text" class="form-control location" placeholder="Location">
                                </div>
                            </div>



                            <div class="col-2 col-md-1">
                                <select class="select_option form-control" name="select">
                                    <option>GHS</option>
                                    <option>USD</option>

                                </select>
                            </div>
                            <div class="col-5 col-md-2">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Min Price">
                                </div>
                            </div>

                            <div class="col-5 col-md-2">
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Max Price">
                                </div>
                            </div>

                            <div class="col-md-1 col-6 px-2">
                                <select class="select_option form-control" name="select">
                                    <option data-display="Bed">Bed</option>
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

                            <div class="col-md-2 col-6 input-group-append">
                                <button class="btn btn-primary btn-block" type="submit">
                                    <i class="fa fa-search"></i> <span
                                        class="ml-1 text-uppercase">search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="rent" role="tabpanel"
                    aria-labelledby="rent-tab">
                    <div class=" search__container">
                        <div class="row input-group no-gutters">
                            <div class="col-lg-2">
                                <select class="select_option form-control" name="select">
                                    <option selected>Type Property</option>
                                    <option>House</option>
                                    <option>Apartement </option>
                                    <option>Hotel</option>
                                    <option>Residential</option>
                                    <option>Land</option>
                                    <option>Luxury</option>
                                </select>
                            </div>

                            <div class="col-lg-2">
                                <select class="select_option form-control" name="select">
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
                            <div class="col-lg-2">
                                <select class="select_option form-control" name="select">
                                    <option data-display="Bathrooms">Bathrooms</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>

                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select class="select_option form-control" name="select">
                                    <option data-display="Locations">Locations</option>
                                    <option>United Kingdom</option>
                                    <option>American Samoa</option>
                                    <option>Belgium</option>
                                    <option>Canada</option>
                                    <option>Delaware</option>

                                </select>
                            </div>
                            <div class="col-lg-2 input-group-append">
                                <button class="btn btn-primary btn-block" type="submit">
                                    <i class="fa fa-search"></i> <span
                                        class="ml-1 text-uppercase">search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@section('autocomplete')
<script>
    var path = "{{ route('autocomplete.location')}}";
    $('.location').typeahead({
        source: function(location, process){
            return $.get(path, {location:location}, function(data){
                return process(data);
            });
        }
    });
</script>
@endsection
