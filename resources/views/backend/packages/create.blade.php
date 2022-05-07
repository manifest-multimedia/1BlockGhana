<x-backend.app >

    <!-- Main Content -->
<section class="content agent">
    <x-backend.breadcrumb page="Create Package" menu="Create Package" />
    <div class="container-fluid">
        <div class="clearfix row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Package</strong> Details</h2>
                    </div>

                    {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        Error occured.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}
                    <div class="body">
                        <form action="{{route('package.store')}}" method="POST">
                            @csrf
                            <div class="clearfix mb-3 row">
                                <div class="col-sm-6">
                                    <x-form.label value="{{ __('Package Name') }}" />
                                    <x-form.input name="name" placeholder="Package Name" />

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <x-form.label value="{{ __('Type') }}" />
                                        <x-form.input name="type" placeholder="Type"  />
                                    </div>
                                </div>

                            </div>

                            <div class="clearfix mb-3 row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <x-form.label value="{{ __('Image Upload Limit') }}" />
                                        <x-form.input name="imageLimit" type="number" placeholder="Image Upload Limit" />
                                    </div>
                                </div>


                            </div>

                            
                            <button type="submit" class="btn btn-primary btn-round">Create Package</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</x-backend.app>

