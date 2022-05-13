<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Add TopAds" menu="Add New TopAds" />
        <div class="container-fluid">
            <form action="{{ route('topads.store', $id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="clearfix row">

                    <div class="col-md-6">

                        <div class="card">
                            <div class="col-md-12">
                                <div class="header">
                                    <h2><strong>TopAds</strong> Information </h2>
                                </div>
                                <div class="body">
                                    <div class="clearfix row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Name') }}" />
                                                <x-form.input name="name" placeholder="Property Title" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Website') }}" />
                                                <x-form.input name="website" placeholder="www.domain.com" />
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Priority') }}" />
                                                <x-form.input name="priority" placeholder="1" />
                                            </div>
                                        </div>


                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Ad Image </h2>

                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-12">

                                        <input id="adImage" name="adImage" type="file" class="filepond" />
                                        @error('adImage')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-12 mx-auto mb-2" id="previewImgBox">
                                    <img src="" id="previewImg" style="height-width: 100px;">
                                </div>


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
            const inputElement = document.querySelector('input[id="adImage"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement, {
                labelIdle: `Drag & Drop the Ad image or <span class="filepond--label-action">Browse</span>`,

                onpreparefile: (fileItem, output) => {
                    const img = new Image(500);
                    // var previewImg = document.getElementById('previewImg')
                    //  previewImg.src = URL.createObjectURL(output);
                    img.src = URL.createObjectURL(output);
                    document.getElementById('previewImgBox').appendChild(img);
                }
            });
            FilePond.setOptions({
                server: {
                    url: '/admin/ads/upload',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        </script>
    @endsection
</x-backend.app>
