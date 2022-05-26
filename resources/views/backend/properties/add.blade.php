<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Add Property" menu="Add New Property" />
        <div class="container-fluid">
            <div class="clearfix row">

                <div class="col-lg-12">
                    <form action="{{ route('property.store', $id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="header">
                                <h2><strong>Property</strong> Information </h2>
                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Title') }}" />
                                            <x-form.input name="name" placeholder="Property Title" />
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Property Location') }}" />
                                            <x-form.input type="text" name="location" placeholder="" />
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

                        <div class="card">
                            <div class="header">
                                <h2><strong>Property</strong> Features </h2>
                            </div>
                            <div class="body">
                                <div class="clearfix row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Status') }}" />
                                            <select class="form-control" name="purpose" id="">
                                                <option value="For Rent">For Rent</option>
                                                <option selected value="For Sale">For Sale</option>
                                                <option selected value="For Sale">Let's Agree</option>
                                                <option selected value="For Sale">Sold</option>

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
                                            <x-form.label value="{{ __('Size (SqFt)') }}" />
                                            <x-form.input name="size" placeholder="458 SqFt" />
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <x-form.label type="number" value="{{ __('Number of Bedrooms') }}" />
                                            <x-form.input name="bedroom" placeholder="0" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-3">
										<div class="form-group">
											<x-form.label type="number" value="{{ __('Number of Kitchen') }}" />
											<x-form.input name="kitchen" placeholder="0" />
										</div>
									</div> --}}

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <x-form.label type="number" value="{{ __('Number of Bathrooms') }}" />
                                            <x-form.input name="bathroom" placeholder="0" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="header">
                                <h2><strong>General</strong> Amenities </h2>

                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-12">


                                        @foreach ($amenities as $amenity)
                                            <div class="checkbox1 inlineblock m-r-20">
                                                <input id="checkbox{{ $amenity->id }}" type="checkbox"
                                                    name="amenities[]" value="{{ $amenity->id }}"
                                                    value="Standby Generator">
                                                <label for="checkbox{{ $amenity->id }}">{{ $amenity->name }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Images </h2>

                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-12">
                                        <h4>Upload the property images here</h4>

                                        <label for="">You can upload up to {{ $package->image_upload_limit }}
                                            images</label>
                                        <div>
                                            <input id="property" name="properties[]" type="file" multiple
                                                data-max-files="{{ $package->image_upload_limit }}" />
                                        </div>

                                    </div>
                                    <div class="col-md-12 mb-2" id="previewImgBox">
                                        <img src="" id="previewImg" style="max-width: 100px;">
                                    </div>
                                    {{-- <div class="col-sm-12">
										<h4>Upload the property images here</h4>
										@for ($i = 0; $i < 4; $i++) <div class="mt-4 fallback">
											<label for="">Image {{$i + 1}}</label>
											<div>
												<input id="property" name="image[]" type="file" />
											</div>
                                        @endfor
									</div> --}}

                                </div>


                            </div>

                        </div>

                </div>

                <div class="card">
                    <div class="body">
                        <div class="footer">
                            <button type="submit" class="btn btn-primary btn-round">Submit</button>
                        </div>
                    </div>
                </div>


                </form>
            </div>
        </div>
        </div>

    </section>
    @section('scripts')
        <script>
            const regPond = FilePond.registerPlugin(
                //FilePondPluginImagePreview,
                FilePondPluginImageResize,
                FilePondPluginImageCrop,
                FilePondPluginImageTransform,

            );


            // Get a reference to the file input element
            const inputElement = document.querySelector('input[id="property"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement, {
                labelIdle: `Drag & Drop your property images or <span class="filepond--label-action">Browse</span>`,

                onpreparefile: (fileItem, output) => {
                    const img = new Image(100);
                    // var previewImg = document.getElementById('previewImg')
                    //  previewImg.src = URL.createObjectURL(output);
                    img.src = URL.createObjectURL(output);
                    document.getElementById('previewImgBox').appendChild(img);
                }
            });
            FilePond.setOptions({
                server: {
                    url: '/dashboard/properties/upload',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        </script>
    @endsection
</x-backend.app>
