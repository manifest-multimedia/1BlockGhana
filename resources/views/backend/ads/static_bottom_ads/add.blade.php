<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Add Static Bottom Ad" menu="Add New Static Bottom Ad" />
        <div class="container-fluid">
            <div class="clearfix row">


                <form action="{{ route('static.bottomads.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Upload</strong> Static Bottom Ad Banner </h2>

                            </div>
                            <div class="body">
                                <input type="hidden" name="name" value="static ad">
                                <input type="hidden" name="website" value="1blockghana">
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

                                <div class="col-sm-12 mt-4">
                                    <x-form.label value="{{ __('Priority') }}" />
                                    <x-form.input type="number" name="priority" required />
                                    <x-form.label value="{{ __('Select Link Option') }}" />
                                    <select name="link_type" class="form-control" id="select-condition" required>
                                        <option selected value="website">--select--</option>
                                        <option value="website">Link to website</option>
                                        <option value="listed_property">Link to Listed Property ID</option>
                                    </select>

                                    <div class="form-group hide pt-2 py-2 pb-2" id="label1">
                                        <x-form.label value="{{ __('Website') }}" />
                                        <x-form.input name="website" placeholder="www.1blockghana.com" />

                                        <x-form.label value="{{ __('Property ID') }}" />
                                        <x-form.input name="property_id" placeholder="P00000" />
                                    </div>

                                    <div class="form-group hide py-2 pt-0" id="label2">

                                    </div>
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-round">Save</button>
                            </div>

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
    @endsection
</x-backend.app>
