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
											<x-form.textarea name="description" type="email" placeholder="Description about the property" />
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
									{{--  <div class="col-sm-6">
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
												value="Standby Generator">
											<label for="checkbox{{$amenity->id}}">{{$amenity->name}}</label>
										</div>
										@endforeach

									</div>
								</div>

							</div>
						</div>

						<div class="card">
							<div class="header">
								<h2><strong>Upload</strong> Images/Video </h2>

							</div>
							<div class="body">
								<div class="clearfix row">
									<div class="col-sm-12">
										<h4>Upload the property images here</h4>
										@for ($i=0; $i < 4; $i++) <div class="mt-4 fallback">
											<label for="">Image {{$i + 1}}</label>
											<div>
												<input name="image[]" type="file" />
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
						
						{{-- <div class="card">
							<div class="header">
								<h2><strong>Upload</strong> Images/Video </h2>

							</div>
							<div class="body">
								<form method="POST" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
								@csrf
									<div><h3 class="text-center">Upload Image</h3></div>

									<div class="dz-default dz-message">
										<span>Drop files here to upload</span>
									</div>
								</form>
							</div>

						</div> --}}

					{{-- 	<div class="clearfix row">                            
							<div class="col-sm-12">
									<form action="{{route('save.property.images')}}" id="image-upload" class="dropzone m-b-15 m-t-15" method="post" enctype="multipart/form-data">
											<div class="dz-message">
													<div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
													<h3>Drop files here or click to upload.</h3>
													<em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em> </div>
											<div class="fallback">
													<input name="file" type="file" multiple />
											</div>
									</form>
							</div>
							<div class="col-sm-12">
									<button type="submit" class="btn btn-primary btn-round">Submit</button>
									<button type="submit" class="btn btn-default btn-round btn-simple">Cancel</button>
							</div>
					</div> --}}

				</div>
				<!-- <div class="card">
					<div class="header">
						<h2><strong>Location</strong></h2>
					</div>
					<div class="body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<x-form.label value="{{ __('Google Map Code') }}" />
									<x-form.textarea name="google_location" placeholder="" />
								</div>
							</div>
						</div>
					</div>


				</div> -->
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
</x-backend.app>