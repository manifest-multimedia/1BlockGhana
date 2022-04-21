<x-backend.app>

	<!-- Main Content -->
	<section class="content agent">
		<x-backend.breadcrumb page="Properties" menu="Properties" link="Properties/add" />

		<div class="clearfix row">
			<div class="col-lg-12">
				@if (!$properties->isEmpty())
				@foreach ($properties as $property)
				<div class="card property_list">
					<div class="body">
						<div class="row">
							<div class="col-lg-4 col-md-6 d-flex">
								<div class="property_image d-flex align-items-center">
									<div id="demo2" class="carousel slide" data-interval="false" 				  data-ride="carousel">
										<div class="carousel-inner">
												@foreach ($property->getMedia('properties') as $key => $image)
												<div class="carousel-item {{$key==0? 'active':''}}">
													<img src="{{asset($image->getUrl())}}" class="img-fluid" alt="">
												</div>
												@endforeach

										</div>
										<!-- Left and right controls -->
										<a class="carousel-control-prev" href="#demo2" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
										<a class="carousel-control-next"  href="#demo2" data-slide="next"><span style="color:red;" class="carousel-control-next-icon"></span></a>
									</div>


									<span class="badge badge-danger"></span>
									<span class="badge badge-danger">{{ $property->purpose}}</span>
								</div>
							</div>
							<div class="col-lg-8 col-md-6">
								<div class="property-content">
									<div class="detail">
										<h5 class="text-success m-t-0 m-b-0">{{ $property->currency->code }}
											{{ $property->price }}</h5>
										<h4 class="m-t-0"><a href="{{ route('property.details', $property->id)}}" class="col-blue-grey">{{$property->name}}</a></h4>
										<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>{{$property->location}}
										</p>
										<p class="text-muted m-b-0">{{ Str::limit($property->description, 140)}}</p>
									</div>
									<div class="property-action m-t-15">
										@foreach ($property->amenities as $amenity)
										<a href="javascript:void(0)"><span>{{$amenity->name}}</span></a>
										@endforeach

									</div>
									{{-- <div class="property-action m-t-15">
										<a href="#" title="Square Feet"><i
												class="zmdi zmdi-view-dashboard"></i><span>{{$property->size}}</span></a>
										<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>{{$property->bedroom}}</span></a>
										<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
										<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span>
												24H</span></a>
									</div> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach

				@else
				<p><strong>No Property listed</strong></p>
				<span><a href="{{ route('property.add') }}">Click here</a> to add a new Property</span>
				@endif
				{{-- <div class="card property_list">
					<div class="body">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="property_image">
									<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/1.jpg" alt="img">
									<span class="badge badge-danger">For Sale</span>
								</div>
							</div>
							<div class="col-lg-8 col-md-6">
								<div class="property-content">
									<div class="detail">
										<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
										<h4 class="m-t-0"><a href="#" class="col-blue-grey">Accra
												Estate</a></h4>
										<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>East Legon,
											Accra, GA
										</p>
										<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur
											adipiscing elit
											Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb
										</p>
									</div>
									<div class="property-action m-t-15">
										<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
										<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
										<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
										<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span>
												24H</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card property_list">
					<div class="body">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="property_image">
									<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/2.jpg" alt="img">
									<span class="badge badge-warning">For Rent</span>
								</div>
							</div>
							<div class="col-lg-8 col-md-6">
								<div class="property-content">
									<div class="detail">
										<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
										<h4 class="m-t-0"><a href="#" class="col-blue-grey">Accra
												Estate</a></h4>
										<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>East Legon,
											Accra, GA
										</p>
										<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur
											adipiscing elit
											Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb
										</p>
									</div>
									<div class="property-action m-t-15">
										<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
										<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
										<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
										<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span>
												24H</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card property_list">
					<div class="body">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="property_image">
									<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/3.jpg" alt="img">
									<span class="badge badge-danger">For Sale</span>
								</div>
							</div>
							<div class="col-lg-8 col-md-6">
								<div class="property-content">
									<div class="detail">
										<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
										<h4 class="m-t-0"><a href="#" class="col-blue-grey">Accra
												Estate</a></h4>
										<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>East Legon,
											Accra, GA
										</p>
										<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur
											adipiscing elit
											Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb
										</p>
									</div>
									<div class="property-action m-t-15">
										<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
										<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
										<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
										<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span>
												24H</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card property_list">
					<div class="body">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="property_image">
									<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/4.jpg" alt="img">
									<span class="badge badge-danger">For Sale</span>
								</div>
							</div>
							<div class="col-lg-8 col-md-6">
								<div class="property-content">
									<div class="detail">
										<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
										<h4 class="m-t-0"><a href="#" class="col-blue-grey">Accra
												Estate</a></h4>
										<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>East Legon,
											Accra, GA
										</p>
										<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur
											adipiscing elit
											Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb
										</p>
									</div>
									<div class="property-action m-t-15">
										<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
										<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
										<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
										<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span>
												24H</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
		</div>

	</section>
</x-backend.app>
