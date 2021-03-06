<x-backend.app>

	<!-- Main Content -->
	<section class="content agent">
		<x-backend.breadcrumb page="Edit Property" menu="Edit Property" />
		<div class="container-fluid">
			<div class="clearfix row">

				<div class="col-lg-12">
					<form action="{{ route('property.update', $property->id) }}" method="post" enctype="multipart/form-data">
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
											<x-form.input name="name" value="{{$property->name}}" placeholder="Property Title" />
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<x-form.label value="{{ __('Property Type') }}" />
											<select class="form-control" name="category_id" id="">
												@foreach ($categories as $category)
												<option  {{ ($category->id) == $property->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}
												</option>
												@endforeach

											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<x-form.label value="{{ __('Year Built') }}" />
											<x-form.input type="date" value="{{$property->date_built}}" name="year_built" placeholder="" />
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<x-form.label value="{{ __('Property Location') }}" />
											<x-form.input type="text" value="{{$property->location}}" name="location" placeholder="" />
										</div>
									</div>


									<div class="col-sm-12">
										<div class="form-group">
											<x-form.label value="{{ __('Property Description') }}" />
											<x-form.textarea value="{{$property->description}}" name="description" type="email" placeholder="Description about the property" />
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
												<option {{ ($property->purpose) == 'For Rent' ? 'selected' : '' }} value="For Rent">For Rent</option>
												<option {{ ($property->purpose) == 'For Sale' ? 'selected' : '' }}  value="For Sale">For Sale</option>

											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<x-form.label value="{{ __('Currency') }}" />
											<select class="form-control" name="currency" id="">
												@foreach ($currencies as $currency)
												<option {{ ($property->currency_id) == $currency->id ? 'selected' : '' }}  value="{{ $currency->id }}">{{ $currency->code }}
												</option>
												@endforeach

											</select>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<x-form.label value="{{ __('Price') }}" />
											<x-form.input name="price" value="{{$property->price}}" placeholder="450,000" />
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<x-form.label value="{{ __('Size (SqFt)') }}" />
											<x-form.input name="size" value="{{$property->size}}" placeholder="458 SqFt" />
										</div>
									</div>

									<div class="col-sm-3">
										<div class="form-group">
											<x-form.label type="number" value="{{ __('Number of Bedrooms') }}" />
											<x-form.input name="bedroom" value="{{$property->bedroom}}" placeholder="0" />
										</div>
									</div>


									<div class="col-sm-3">
										<div class="form-group">
											<x-form.label type="number" value="{{ __('Number of Bathrooms') }}" />
											<x-form.input name="bathroom" value="{{$property->bathroom}}" placeholder="0" />
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
											<input id="checkbox{{$amenity->id}}" type="checkbox" name="amenities[]" value="{{$amenity->id}}"
												 {{ in_array($amenity->id, $property_amenities) ? 'checked' : '' }}>
											<label for="checkbox{{$amenity->id}}">{{$amenity->name}}</label>
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
										<h6>Uploaded images</h6>
                                            <div class="col-md-12 mb-2" >
												@forelse ($property->getMedia('properties') as $key => $image)

													<img src="{{asset($image->getUrl())}}" class="img-fluid" style="max-width: 100px;">
                                                @empty
                                                    <p>No added images</p>
												@endforelse

											</div>

									</div>

								</div>

								<div class="clearfix row">
									<div class="col-sm-12">
										<h5>Upload new set of property images here</h5>

											<label for="">You can upload up to {{$package->image_upload_limit}} images</label>
											<div>
												<input id="property" name="properties[]" type="file" multiple  data-max-files="{{$package->image_upload_limit}}" />
											</div>

									</div>
                                    <div class="col-md-12 mb-2" id="previewImgBox">
                                        <img src="" id="previewImg"  style="max-width: 100px;">
                                    </div>

								</div>
							</div>

						</div>

				</div>

				<div class="card">
					<div class="body">
						<div class="footer">
							<button type="submit" class="btn btn-primary btn-round">Update</button>
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

            onpreparefile: (fileItem,output)=>{
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
