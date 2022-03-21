<x-sbadmin.app>

    <a href="{{ route('property.view') }}"><button class="mb-2 btn btn-primary">View Property</button></a>

    <form action="{{ route('property.store', $id) }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5><strong>Property</strong> Information </h5>
            </div>
            <div class="card-body">
                <div class="clearfix row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-form.label value="{{ __('Property Name') }}" />
                            <x-form.input name="name" placeholder="Property Name" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-form.label value="{{ __('ID') }}" />
                            <x-form.input name="id" placeholder="RV151" />
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-form.label value="{{ __('Property Type') }}" />
                            <select class="form-control" name="category_id" id="">
                                @foreach ($categories as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-form.label value="{{ __('Year Built') }}" />
                            <x-form.input type="date" name="year_built" placeholder="" />
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <x-form.label value="{{ __('Property Description') }}" />
                            <x-form.textarea name="description" type="email"
                                placeholder="Description about the property" />
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-4 card">
            <div class="card-header">
                <h5><strong>Property</strong> Features </h5>
            </div>
            <div class="card-body">
                <div class="clearfix row">
                    {{-- <div class="col-sm-6">
                                        <div class="radio inlineblock m-r-25">
                                            <input type="radio" name="radio1" id="radio1" value="option1"
                                                checked="">
                                            <label for="radio1">For Rent</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" name="radio1" id="radio2" value="option2">
                                            <label for="radio2">For Sale</label>
                                        </div>
                                    </div> --}}

                    <div class="col-sm-4">
                        <div class="form-group">
                            <x-form.label value="{{ __('Purpose') }}" />
                            <select class="form-control" name="purpose" id="">
                                <option value="For Rent">For Rent</option>
                                <option selected value="For Sale">For Sale</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <x-form.label value="{{ __('Currency') }}" />
                            <select class="form-control" name="currency" id="">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->code }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <x-form.label value="{{ __('Price') }}" />
                            <x-form.input name="price" placeholder="450,000" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <x-form.label value="{{ __('Size') }}" />
                            <x-form.input name="size" placeholder="458 SqFt" />
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <x-form.label type="number" value="{{ __('Number of Bedrooms') }}" />
                            <x-form.input name="bedroom" placeholder="0" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <x-form.label type="number" value="{{ __('Number of Kitchen') }}" />
                            <x-form.input name="kitchen" placeholder="0" />
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <x-form.label type="number" value="{{ __('Number of Bathrooms') }}" />
                            <x-form.input name="bathroom" placeholder="0" />
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-4 card">
            <div class="card-header">
                <h5><strong>General</strong> Amenities </h5>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">


                        @foreach ($amenities as $amenity)
                            <div class="mr-4 checkbox d-inline-block">
                                <input id="checkbox{{ $amenity->id }}" type="checkbox" name="amenities[]"
                                    value="{{ $amenity->id }}" value="Standby Generator">
                                <label for="checkbox{{ $amenity->id }}">{{ $amenity->name }}</label>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>

        <div class="mt-4 card">
            <div class="card-header">
                <h5><strong>Upload</strong> Images/Video </h5>

            </div>
            <div class="card-body">
                <div class="clearfix row">
                    <div class="col-sm-12">
                        <h4>Upload the property images here</h4>
                        @for ($i = 0; $i < 4; $i++)
                            <div class="mt-4 fallback">
                                <label for="">Image {{ $i + 1 }}</label>
                                <div>
                                    <input name="file[]" type="file" />
                                </div>
                            </div>
                        @endfor

                    </div>
                    <div class="mt-5 col-md-6">
                        <div class="form-group">
                            <label for="">Youtube Video link</label>
                            <input type="text" name="video_link" placeholder="https://youtu.be/gr6O1jRsvYg"
                                class="form-control">
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div class="mt-4 card">
            <div class="card-header">
                <h5><strong>Location</strong></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <x-form.label value="{{ __('Google Map Code') }}" />
                            <x-form.textarea name="google_location" placeholder="" />
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="mt-4 card">
            <div class="card-body">
                <div class="footer">
                    <button type="submit" class="btn btn-primary btn-round">Submit</button>
                </div>
            </div>
        </div>


    </form>



</x-sbadmin.app>
