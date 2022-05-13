<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Edit TopAd" menu="Edit TopAd" />
        <div class="container-fluid">
            <div class="clearfix row">

                <div class="col-lg-12">
                    <form action="{{ route('topads.update', $topAd->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="header">
                                <h2><strong>TopAds</strong> Information </h2>
                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Name') }}" />
                                            <x-form.input name="name" value="{{ $topAd->name}}" placeholder="Property Title" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Website') }}" />
                                            <x-form.input name="website" value="{{ $topAd->website}}" placeholder="www.domain.com" />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Priority') }}" />
                                            <x-form.input name="priority" value="{{ $topAd->priority}}" placeholder="1" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Ad Image </h2>

                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-12">
                                        <h4>Upload new image</h4>
                                                <input id="adImage" name="adImage" type="file" class="filepond" />
                                                @error('adImage')
                                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-12 mx-auto mb-2" id="previewImgBox">
                                        <img src="" id="previewImg"  style="max-width: 100%;">
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
            const inputElement = document.querySelector('input[id="adImage"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement, {
                labelIdle: `Drag & Drop the Ad image or <span class="filepond--label-action">Browse</span>`,

                onpreparefile: (fileItem, output) => {
                    const img = new Image(500);
                    img.src = URL.createObjectURL(output);
                    document.getElementById('previewImgBox').appendChild(img);
                  //  document.getElementById('previewImgBox').replaceChild(img);
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
