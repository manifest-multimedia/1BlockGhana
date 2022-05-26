<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Add Development" menu="Add New Development" />
        <div class="container-fluid">
            <div class="clearfix row">


                <form action="{{ route('development.store', $id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Development</strong> Information </h2>
                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Title') }}" />
                                            <x-form.input name="name" placeholder="Development Title" />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Development Type') }}" />
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
                                            <x-form.label value="{{ __('Development Location') }}" />
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
                    </div>

                    <div class="col-md-12">
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
                    </div>


                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Developement Banner </h2>

                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-12">

                                        <div>
                                            <input id="banner" class="form-control" name="banner" type="file"/>
                                        </div>

                                    </div>
                                    <div class="col-md-12 my-2" id="previewBanner">
                                        <img src="" id="previewbanner" style="max-width: 300px;">
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Development Images </h2>

                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-12">

                                        <label for="">You can upload up to {{ $package->image_upload_limit }}
                                            images</label>
                                        <div>
                                            <input id="development" name="developments[]" type="file" multiple data-max-files="{{ $package->image_upload_limit }}" />
                                        </div>

                                    </div>
                                    <div class="col-md-12 mb-2" id="previewImgBox">
                                        <img src="" id="previewImg" style="max-width: 100px;">
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="footer">
                                    <button type="submit" class="btn btn-primary btn-round">Submit</button>
                                </div>
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
                labelIdle: `<span class="filepond--label-action">Upload the images here</span>`,

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
