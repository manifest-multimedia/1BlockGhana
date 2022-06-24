<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Add StaticTopAds" menu="Add StaticTopAds" />
        <div class="container-fluid">


                <div class="clearfix row">
                    
                    <select name="condition" class="form-control" onchange="showType(0)" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>

                    <input  id="showTypeLabel0" style="display: none;" type="text"  class="form-control input-text"
                             placeholder="Type" name="type"  value="{{old('type')}}"
                    >
                     <input  id="showType0" style="display: none;"
                              type="text"
                              class="form-control input-text"
                              placeholder="function"
                              name="function"
                              value="{{old('function')}}"
                    >
                    <div class="col-md-6">
                        <form action="{{ route('static.topads.store',1) }}" method="post" enctype="multipart/form-data">
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
                                            <input id="banner" class="form-control" name="banner" type="file"/>
                                        </div>

                                    </div>

                                    <div class="col-md-12 my-2" id="previewBanner">
                                        <img src="{{$staticAd1->getFirstMediaUrl('static_top')}}" id="previewbanner" style="max-width: 300px;">
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
                        <form action="{{ route('static.topads.store',2) }}" method="post" enctype="multipart/form-data">
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
                                            <input id="banner2" class="form-control" name="banner2" type="file"/>
                                        </div>

                                    </div>
                                    <div class="col-md-12 my-2" id="previewBanner2">
                                        <img src="{{$staticAd2->getFirstMediaUrl('static_top')}}" id="previewbanner2" style="max-width: 300px;">
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
    <script type="text/javascript">

        $(document).ready(function (e) {


           $('#banner2').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#previewbanner2').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

           });

        });

    </script>
    @endsection
</x-backend.app>
