<x-sbadmin.app >    
    
    <a href="{{ route('package.list')}}"><button class="btn btn-primary mb-2">View Packages</button></a>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Packages</h6>
        </div>
        
        <div class="card-body">
            
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

                    <div class="col-sm-6">
                        <x-form.label value="{{ __('Number of Video Uploads') }}" />
                        <x-form.input name="videouploadlimit"  type="number" placeholder="Number of Video Uploads" />
                    </div>
                </div>

                <div class="clearfix mb-3 row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-form.label value="{{ __('Video Lenght Limit (seconds)') }}" />
                            <x-form.input name="videolengthlimit" type="number" placeholder="5000" />
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-round">Create Package</button>
            </form>
        </div>
    </div>

</x-sbadmin.app>
