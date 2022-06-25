<x-backend.app>

    @section('styles')
        <style>
            .hide1 {
                display: none;
            }

            .show {
                display: block;
            }
        </style>
    @endsection

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Add StaticTopAds" menu="Add StaticTopAds" />
        <div class="container-fluid">


            <div class="clearfix row">
                <div class="col-md-6">
                    <form action="{{ route('static.topads.store', 1) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Static Top Ad 1 </h2>
                                {{-- 600 x 200 pixels --}}
                            </div>

                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="name" value="banner">
                                        <div>
                                            <input id="banner" class="form-control" name="banner" type="file" />
                                        </div>

                                    </div>

                                    <div class="col-md-12 my-2" id="previewBanner">
                                        <img src="{{ $staticAd1->getFirstMediaUrl('static_top') }}" id="previewbanner"
                                            style="max-width: 300px;">
                                    </div>


                                    <div class="col-sm-12 mt-4">
                                        <select name="link_type" class="form-control" id="select-condition" required>
                                            <option value="website" >Select Link Option</option>
                                            <option value="website" {{$staticAd1->link_type == 'website' ? 'selected': ''}}>Link to website</option>
                                            <option value="listed_property" {{$staticAd1->link_type == 'listed_property' ? 'selected': ''}}>Link to Listed Property ID</option>
                                        </select>

                                        <div class="form-group hide pt-2 py-2 pb-2" id="label1">
                                            <x-form.input name="website" value="{{$staticAd1->website}}" placeholder="www.1blockghana.com" />
                                        </div>

                                        <div class="form-group hide py-2 pt-0" id="label2">
                                            <x-form.input name="property_id" value="{{$staticAd1->property_id}}" placeholder="P00000" />
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-round">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('static.topads.store', 2) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Static Top Ad 2 </h2>
                                {{-- 600 x 200 pixels --}}
                            </div>
                            <div class="body">
                                <div class="clearfix row">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="name" value="banner2">
                                        <div>
                                            <input id="banner2" class="form-control" name="banner2" type="file" />
                                        </div>

                                    </div>
                                    <div class="col-md-12 my-2" id="previewBanner2">
                                        <img src="{{ $staticAd2->getFirstMediaUrl('static_top') }}"
                                            id="previewbanner2" style="max-width: 300px;">
                                    </div>

                                    <div class="col-sm-12 mt-4">
                                        <select name="link_type" class="form-control" id="select-condition" required>
                                            <option selected value="website">Select Link Option</option>
                                            <option value="website" {{$staticAd2->link_type == 'website' ? 'selected': ''}}>Link to website</option>
                                            <option value="listed_property" {{$staticAd2->link_type == 'website' ? 'selected': ''}}>Link to Listed Property ID</option>
                                        </select>

                                        <div class="form-group hide pt-2 py-2 pb-2" id="label1">
                                            <x-form.input name="website" value="{{$staticAd2->website}}" placeholder="www.1blockghana.com" />
                                        </div>

                                        <div class="form-group hide py-2 pt-0" id="label2">
                                            <x-form.input name="property_id" value="{{$staticAd2->property_id}}" placeholder="P00000" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-round">Save</button>
                            </div>

                        </div>
                    </form>
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
        <script type="text/javascript">
            $(document).ready(function(e) {


                $('#banner2').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#previewbanner2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

            });
        </script>

        <script>
            /* =========== switch link inputs ============  */
            $("#select-condition").change(function() {
                if (this.value == 'yes') {
                    $('#label1').removeClass("hide");
                    $('#label2').addClass("hide");
                } else if (this.value == 'no') {
                    $('#label1').addClass("hide");
                    $('#label2').removeClass("hide");
                } else {
                    $('#label1').removeClass("show").addClass("hide");
                    $('#label2').removeClass("show").addClass("hide");
                }
            });
        </script>
    @endsection
</x-backend.app>
