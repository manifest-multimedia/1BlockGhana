@props(['categories', 'currencies'])

<div class="bg__overlay bg-light-gray pt-3">
    <div class="search__property">
        <div class="position-relative">

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="buy" role="tabpanel" aria-labelledby="buy-tab">
                    <div class=" search__container">
                        <form action="{{ route('search.filter') }}" method="post">
                            @csrf
                            <div class="row input-group no-gutters">

                                <div class="col-6 col-md-2 pr-2">
                                    <select class="select_option form-control" name="category_id">
                                        <option selected disabled>Property Type</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2 col-6 pr-md-2">
                                    <div class="form-group">
                                        <input type="text" name="location" class="form-control location"
                                            placeholder="Location">
                                    </div>
                                </div>

                                <div class="col-2 col-md-1">
                                    <select class="select_option form-control" name="currency_id">

                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-5 col-md-2">
                                    <div class="form-group">
                                        <input type="number" name="min_price" class="form-control"
                                            placeholder="Min Price">
                                    </div>
                                </div>

                                <div class="col-5 col-md-2">
                                    <div class="form-group">
                                        <input type="number" name="max_price" class="form-control"
                                            placeholder="Max Price">
                                    </div>
                                </div>

                                <div class="col-md-1 col-6 px-2">
                                    <select class="select_option form-control" name="bed">
                                        <option disabled selected data-display="Bed">Bed</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                    </select>
                                </div>

                                <div class="col-md-2 col-6 input-group-append">
                                    <button class="btn btn-primary btn-block" type="submit">
                                        <i class="fa fa-search"></i> <span class="ml-1 text-uppercase">search</span>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@section('autocomplete')
    <script>
        var path = "{{ route('autocomplete.location') }}";
        $('.location').typeahead({
            source: function(location, process) {
                return $.get(path, {
                    location: location
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection
