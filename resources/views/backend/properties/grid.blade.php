<x-backend.app>

	<!-- Main Content -->
	<section class="content agent">
		<x-backend.breadcrumb page="Properties" menu="Properties" link="Properties/add" />

		<div class="container-fluid">
			<div class="row clearfix">

				@if (!$properties->isEmpty())
				@foreach ($properties as $property)
				<div class="col-lg-4 col-md-12">
						<div class="card property_list">
								<div class="property_image text-center">
									<div id="demo2" class="carousel slide" data-interval="false" 				  data-ride="carousel">
										<div class="carousel-inner">

                                           {{-- @dd(asset($property->last()->getMedia())) --}}
                                             {{-- @php
                                                //$user = User::find(1);
                                                $mediaItems = $property->getMedia('properties');
                                                dd($mediaItems);
                                                $mediaItems[0]->getUrl('thumb');
                                            @endphp --}}
{{-- <img src="{{ asset($property->getFirstMediaUrl('properties')) }}" class="img-fluid h-200" alt=""> --}}
												@foreach ($property->getMedia('properties') as $key => $image)
												<div class="carousel-item text-center {{$key==0? 'active':''}}">
													<img src="{{ asset($image->getUrl()) }}" class="img-fluid h-200" alt="">
													<span class="badge badge-warning">{{ $property->purpose}}</span>
												</div>
												@endforeach
										</div>
										<!-- Left and right controls -->
										<a class="carousel-control-prev" href="#demo2" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
										<a class="carousel-control-next"  href="#demo2" data-slide="next"><span style="color:red;" class="carousel-control-next-icon"></span></a>
									</div>
								</div>
								<div class="body">
										<div class="property-content">
												<div class="detail">
														<h5 class="text-success m-t-0 m-b-0">{{ $property->currency->code }}
															{{ $property->price }}</h5>
														<h4 class="m-t-0"><a href="{{route('property.details', $property->id)}}" class="col-blue-grey">{{$property->name}}</a></h4>
														<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>{{$property->location}}</p>
														<p class="text-muted m-b-0">{{ Str::limit($property->description, 140)}}</p>
												</div>
												<div class="property-action m-t-15">
														<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>{{$property->size}}</span></a>
														<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>{{$property->bedroom}}</span></a>
														<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>{{$property->kitchen}}</span></a>
														<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span>{{$property->bathroom}}</span></a>
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

				{{-- <div class="col-lg-4 col-md-12">
						<div class="card property_list">
								<div class="property_image">
										<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/2.jpg" alt="img">
										<span class="badge badge-warning">For Rent</span>
								</div>
								<div class="body">
										<div class="property-content">
												<div class="detail">
														<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
														<h4 class="m-t-0"><a href="#" class="col-blue-grey">4BHK Alexander Court,New York</a></h4>
														<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>245 E 20th St, New York, NY 201609</p>
														<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb</p>
												</div>
												<div class="property-action m-t-15">
														<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
														<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
														<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
														<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> 24H</span></a>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="col-lg-4 col-md-12">
						<div class="card property_list">
								<div class="property_image">
										<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/3.jpg" alt="img">
										<span class="badge badge-danger">For Sale</span>
								</div>
								<div class="body">
										<div class="property-content">
												<div class="detail">
														<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
														<h4 class="m-t-0"><a href="#" class="col-blue-grey">4BHK Alexander Court,New York</a></h4>
														<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>245 E 20th St, New York, NY 201609</p>
														<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb</p>
												</div>
												<div class="property-action m-t-15">
														<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
														<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
														<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
														<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> 24H</span></a>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="col-lg-4 col-md-12">
						<div class="card property_list">
								<div class="property_image">
										<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/4.jpg" alt="img">
										<span class="badge badge-danger">For Sale</span>
								</div>
								<div class="body">
										<div class="property-content">
												<div class="detail">
														<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
														<h4 class="m-t-0"><a href="#" class="col-blue-grey">4BHK Alexander Court,New York</a></h4>
														<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>245 E 20th St, New York, NY 201609</p>
														<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb</p>
												</div>
												<div class="property-action m-t-15">
														<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
														<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
														<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
														<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> 24H</span></a>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="col-lg-4 col-md-12">
						<div class="card property_list">
								<div class="property_image">
										<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/5.jpg" alt="img">
										<span class="badge badge-danger">For Sale</span>
								</div>
								<div class="body">
										<div class="property-content">
												<div class="detail">
														<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
														<h4 class="m-t-0"><a href="#" class="col-blue-grey">4BHK Alexander Court,New York</a></h4>
														<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>245 E 20th St, New York, NY 201609</p>
														<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb</p>
												</div>
												<div class="property-action m-t-15">
														<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
														<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
														<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
														<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> 24H</span></a>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="col-lg-4 col-md-12">
						<div class="card property_list">
								<div class="property_image">
										<img class="img-thumbnail img-fluid" src="assets/images/image-gallery/6.jpg" alt="img">
										<span class="badge badge-danger">For Sale</span>
								</div>
								<div class="body">
										<div class="property-content">
												<div class="detail">
														<h5 class="text-success m-t-0 m-b-0">$390,000 - $430,000</h5>
														<h4 class="m-t-0"><a href="#" class="col-blue-grey">4BHK Alexander Court,New York</a></h4>
														<p class="text-muted"><i class="zmdi zmdi-pin m-r-5"></i>245 E 20th St, New York, NY 201609</p>
														<p class="text-muted m-b-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit Aliquam gravida magna et fringilla convallis. Pellentesque habitant morb</p>
												</div>
												<div class="property-action m-t-15">
														<a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard"></i><span>280</span></a>
														<a href="#" title="Bedroom"><i class="zmdi zmdi-hotel"></i><span>4</span></a>
														<a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi"></i><span>2</span></a>
														<a href="#" title="Garages"><i class="zmdi zmdi-home"></i><span> 24H</span></a>
												</div>
										</div>
								</div>
						</div>
				</div> --}}
		</div>
		</div>

	</section>
</x-backend.app>
