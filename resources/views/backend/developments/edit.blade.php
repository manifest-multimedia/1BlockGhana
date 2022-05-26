<x-backend.app>

	<!-- Main Content -->
	<section class="content agent">
		<x-backend.breadcrumb page="Edit Development" menu="Edit Development" />
		<div class="container-fluid">
			<div class="clearfix row">

				<div class="col-lg-12">
					<form action="{{ route('development.update', $development->id) }}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="card">
							<div class="header">
								<h2><strong>Development</strong> Information </h2>
							</div>
							<div class="body">
								<div class="clearfix row">
									<div class="col-sm-6">
										<div class="form-group">
											<x-form.label value="{{ __('Title') }}" />
											<x-form.input name="name" value="{{$development->name}}" placeholder="Development Title" />
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<x-form.label value="{{ __('Development Type') }}" />
											<select class="form-control" name="category_id" id="">
												@foreach ($categories as $category)
												<option  {{ ($category->id) == $development->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}
												</option>
												@endforeach

											</select>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<x-form.label value="{{ __('Development Location') }}" />
											<x-form.input type="text" value="{{$development->location}}" name="location" placeholder="" />
										</div>
									</div>


									<div class="col-sm-12">
										<div class="form-group">
											<x-form.label value="{{ __('Development Description') }}" />
											<x-form.textarea value="{{$development->description}}" name="description" placeholder="Description about the development" />
										</div>
									</div>

								</div>
							</div>
						</div>

					    {{-- <div class="card">
							<div class="header">
								<h2><strong>Development</strong> Features </h2>
							</div>
							<div class="body">
								<div class="clearfix row">

									<div class="col-sm-4">
										<div class="form-group">
											<x-form.label value="{{ __('Status') }}" />
											<select class="form-control" name="purpose" id="">
												<option {{ ($development->purpose) == 'For Rent' ? 'selected' : '' }} value="For Rent">For Rent</option>
												<option {{ ($development->purpose) == 'For Sale' ? 'selected' : '' }}  value="For Sale">For Sale</option>

											</select>
										</div>
									</div>
								</div>

							</div>
						</div> --}}

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
												 {{ in_array($amenity->id, $development_amenities) ? 'checked' : '' }}>
											<label for="checkbox{{$amenity->id}}">{{$amenity->name}}</label>
										</div>
										@endforeach

									</div>
								</div>

							</div>
						</div>

						<div class="card">
							<div class="header">
								<h2><strong>Banner</strong> </h2>

							</div>
							<div class="body">
								<div class="clearfix row">
									<div class="col-sm-12">
										<h6>Uploaded banner</h6>
                                            <div class="col-md-12 mb-2" >
												@forelse ($development->getMedia('banner') as $key => $image)

													<img src="{{asset($image->getUrl())}}" class="img-fluid" style="max-width: 300px;">
                                                @empty
                                                    <p>No added images</p>
												@endforelse

											</div>

									</div>

								</div>

								<div class="clearfix row">
									<div class="col-sm-12">

                                        <div>
                                            <label for="">Replace banner</label>
                                            <input id="banner" class="form-control" name="banner" type="file"/>
                                        </div>

                                    </div>
                                    <div class="col-md-12 my-2" id="previewBanner">
                                        <img src="" id="previewbanner" style="max-width: 300px;">
                                    </div>

								</div>
							</div>

						</div>
						<div class="card">
							<div class="header">
								<h2><strong>Development Images</strong> </h2>

							</div>
							<div class="body">
								<div class="clearfix row">
									<div class="col-sm-12">
										<h6>Uploaded images</h6>
                                            <div class="col-md-12 mb-2" >
												@forelse ($development->getMedia('developments') as $key => $image)

													<img src="{{asset($image->getUrl())}}" class="img-fluid" style="max-width: 100px;">
                                                @empty
                                                    <p>No added images</p>
												@endforelse

											</div>

									</div>

								</div>

								<div class="clearfix row">
									<div class="col-sm-12">
										<h5>Upload new set of development images here</h5>

											<label for="">You can upload up to {{$package->image_upload_limit}} images</label>
											<div>
												<input id="development" name="developments[]" type="file" multiple  data-max-files="{{$package->image_upload_limit}}" />
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
        const inputElement = document.querySelector('input[id="development"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement, {
            labelIdle: `Drag & Drop your development images or <span class="filepond--label-action">Browse</span>`,

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
                url: '/dashboard/developments/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function (e) {


           $('#banner').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#previewbanner').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

           });

        });

    </script>
@endsection
</x-backend.app>
