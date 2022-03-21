<x-backend.app>

	<!-- Main Content -->
	<section class="content agent">
		<x-backend.breadcrumb page="Properties" menu="Properties" link="Properties/add" />

		<div class="container-fluid">
			<div class="row clearfix">
					<div class="col-lg-8 col-md-12">
							<div class="card">
									<div class="body">
									<div id="demo2" class="carousel slide" data-interval="false"  data-ride="carousel">
											
											<div class="carousel-inner">
												<div class="carousel-item active">
													<img src="assets/images/image-gallery/5.jpg" class="img-fluid" alt="">
													
											</div>
													@foreach ($property->gallery as $key => $image)
													
												<div class="carousel-item text-center {{$key==0? 'active':''}}">
													<img src="/{{$image->path}}" class="img-fluid" alt="">
													
												</div>
												@endforeach
											</div>
											<!-- Left and right controls -->
											<a class="carousel-control-prev" href="#demo2" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
											<a class="carousel-control-next" href="#demo2" data-slide="next"><span class="carousel-control-next-icon"></span></a>
									</div>
									</div>
							</div>
							<div class="card property_list">
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
							<div class="card">
									<div class="header">
											<h2><strong>General</strong> Amenities<small >Description Text Here...</small></h2>
											<ul class="header-dropdown">
													<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
															<ul class="dropdown-menu dropdown-menu-right slideUp">
																	<li><a href="javascript:void(0);">Action</a></li>
																	<li><a href="javascript:void(0);">Another action</a></li>
																	<li><a href="javascript:void(0);">Something else</a></li>
															</ul>
													</li>
													<li class="remove">
															<a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
													</li>
											</ul> 
									</div>
									<div class="body">
											<div class="row clearfix">
													<div class="col-sm-4">
															<ul class="list-unstyled proprerty-features">
															<li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Swimming pool</li>
															<li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Air conditioning</li>
															<li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Internet</li>
															<li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Radio</li>
															<li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Balcony</li>
															<li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Roof terrace</li>
															<li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Cable TV</li>
															<li><i class="zmdi zmdi-check-circle text-success m-r-5"></i>Electricity</li>
													</ul>
													</div>
													<div class="col-sm-4">
															<ul class="list-unstyled proprerty-features">
																	<li><i class="zmdi zmdi-star text-warning m-r-5"></i>Terrace</li>
																	<li><i class="zmdi zmdi-star text-warning m-r-5"></i>Cofee pot</li>
																	<li><i class="zmdi zmdi-star text-warning m-r-5"></i>Oven</li>
																	<li><i class="zmdi zmdi-star text-warning m-r-5"></i>Towelwes</li>
																	<li><i class="zmdi zmdi-star text-warning m-r-5"></i>Computer</li>
																	<li><i class="zmdi zmdi-star text-warning m-r-5"></i>Grill</li>
																	<li><i class="zmdi zmdi-star text-warning m-r-5"></i>Parquet</li>
															</ul>
													</div>
													<div class="col-sm-4">
															<ul class="list-unstyled proprerty-features">
																	<li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Dishwasher</li>
																	<li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near Green Zone</li>
																	<li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near Church</li>
																	<li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near Hospital</li>
																	<li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near School</li>
																	<li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Near Shop</li>
																	<li><i class="zmdi zmdi-check-circle text-info m-r-5"></i>Natural Gas</li>
															</ul>
													</div>
											</div>
									</div>
							</div>
							<div class="card">
									<div class="header">
											<h2><strong>Location</strong> <small>Description text here...</small> </h2>
									</div>
									<div class="body">
											<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=svdezAlqZP2WIeKGiLW4EUnoJvnxVP7i&amp;width=100%&amp;height=400&amp;lang=tr_TR&amp;sourceType=constructor&amp;scroll=true"></script>
									</div>
							</div>
					</div>
					<div class="col-lg-4 col-md-12">
							<div class="card">
									<div class="header">
										<h2><strong>Property</strong>Features</h2>											
									</div>
									<div class="body">                        
											<div class="table-responsive">
													<table class="table table-bordered m-b-0">
															<tbody>
																	<tr>
																			<th scope="row">Price:</th>
																			<td>$390,000</td>
																	</tr>
																	<tr>
																			<th scope="row">Contract type: </th>
																			<td><span class="badge badge-primary">For Sale</span></td>
																	</tr>
																	<tr>
																			<th scope="row">Bathrooms:</th>
																			<td>1.5</td>
																	</tr>
																	<tr>
																			<th scope="row">Square ft:</th>
																			<td>468</td>
																	</tr>
																	<tr>
																			<th scope="row">Garage Spaces:</th>
																			<td>2</td>
																	</tr>
																	<tr>
																			<th scope="row">Land Size:</th>
																			<td>721 m²</td>
																	</tr>
																	<tr>
																			<th scope="row">Floors:</th>
																			<td>2</td>
																	</tr>
																	<tr>
																			<th scope="row">Listed for:</th>
																			<td>15 days</td>
																	</tr>
																	<tr>
																			<th scope="row">Available:</th>
																			<td>Immediately</td>
																	</tr>
																	<tr>
																			<th scope="row">Pets:</th>
																			<td>Pets Allowed</td>
																	</tr>
																	<tr>
																			<th scope="row">Bedrooms:</th>
																			<td>3</td>
																	</tr>
															</tbody>
													</table>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
		</div>

	</section>
</x-backend.app>