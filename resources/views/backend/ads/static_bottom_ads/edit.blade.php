<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Add Static Bottom Ad" menu="Add New Static Bottom Ad" />
        <div class="container-fluid">
            <div class="clearfix row">

                <div class="col-md-6">
                    <form action="{{ route('static.bottomads.update', $staticAd->id) }}" method="post"
                        enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="card">

                            <div class="header">
                                <h2><strong>Update</strong> Static Bottom Ad Info </h2>
                            </div>
                            <div class="body">
                                <div class="col-sm-12">
                                    <x-form.label value="{{ __('Priority') }}" />
                                    <x-form.input type="number" name="priority" value="{{ $staticAd->priority }}"
                                        required />
                                    <x-form.label value="{{ __('Select Link Option') }}" />
                                    <select name="link_type" class="form-control" id="select-condition" required>
                                        <option value="website">--select--</option>
                                        <option value="website" {{ $staticAd->link_type == 'website' ? 'selected' : '' }}>
                                            Link to website</option>
                                        <option value="listed_property"
                                            {{ $staticAd->link_type == 'listed_property' ? 'selected' : '' }}>Link to
                                            Listed Property ID</option>
                                    </select>
                                    <div class="form-group hide pt-2 py-2 pb-2" id="label1">
                                        <x-form.label value="{{ __('Website') }}" />
                                        <x-form.input name="website" value="{{ $staticAd->website }}"
                                            placeholder="www.1blockghana.com" />

                                        <x-form.label value="{{ __('Property ID') }}" />
                                        <x-form.input name="property_id" value="{{ $staticAd->property_id }}"
                                            placeholder="P00000" />
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-round">Update</button>
                            </div>

                        </div>

                    </form>
                </div>

                <div class="col-md-6">
                    <form action="{{ route('static.bottomads.upload', $staticAd->id) }}" method="post"
                        enctype="multipart/form-data">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="card">
                            <div class="body">
                                <div class="col-md-12">
                                    @if ($staticAd->getFirstMediaUrl('static_bottom'))
                                        <img src="{{ $staticAd->getFirstMediaUrl('static_bottom') }}" class="img-fluid"
                                            style="max-width: 300px;">
                                    @else
                                        <p>No added images</p>
                                    @endif
                                </div>
                            </div>

                            <div class="header">
                                <h2><strong>Replace</strong> Static Bottom Ad Banner </h2>
                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-12">
                                        <div>
                                            <input id="banner" class="form-control" name="banner" type="file" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2" id="previewBanner">
                                        <img src="" id="previewbanner" style="max-width: 300px;">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-round">Update Banner</button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
        </div>

    </section>
    @section('scripts')
        <script type="text/javascript">
            $(document).ready(function(e) {


                $('#banner').change(function() {

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
