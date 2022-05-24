<x-backend.app>

	<!-- Main Content -->
	<section class="content agent">
		<x-backend.breadcrumb page="Properties" name="Add New Property" menu="Properties" link="{{route('property.add')}}" />

		<div class="clearfix row">
			{{-- <div class="col-lg-12">
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

			</div> --}}

            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Listed Properties</strong> </h2>

                    </div>
                    <x-notification.message />

                    <div class="body">
                        <div class="table-responsive">
                            @if (!$properties->isEmpty())
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Purpose</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp

                                        @foreach ($properties as $property)
                                            @php $count++;@endphp
                                            <tr>
                                                <td><span class="social_icon linkedin">{{ $count }}</span>
                                                </td>
                                                <td><span class="list-name"><img src="{{$property->getFirstMediaUrl('properties') ?? url('assets/images/avatar.jpg')}}" alt="{{$property->name}}" width="100"></span>
                                                </td>
                                                <td><span class="list-name">{{ $property->name }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $property->currency->code }}
                                                    {{ $property->price }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $property->purpose }}</span>
                                                </td>

                                                <td>
                                                    <span>
                                                     <a href="{{ route('property.details', $property->id)}}" class="badge badge-success">View</a>
                                                    </span>
                                                     <button type="button" data-toggle="modal"
                                                     data-target="#deleteModal{{$property->id}}" class="badge badge-danger">Delete</button>
                                                    </span>

                                                         <!-- Modal -->
                                                         @include('backend.properties.modal.delete')


                                                 </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p><strong>No property listed. <a href="{{route('property.add')}}">Click here</a> to add a new listing</strong></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
		</div>
		</div>

	</section>
</x-backend.app>
