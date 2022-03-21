<x-sbadmin.app >    
    

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Packages</h6>
        </div>
        
        <div class="card-body">
            
            <form action="{{route('package.update', $package->id)}}" method="POST">
                @csrf
                <div class="clearfix mb-3 row">
                    <div class="col-sm-6">
                        <x-form.label value="{{ __('Package Name') }}" />
                        <x-form.input name="name" value="{{$package->name?? ''}}" placeholder="Package Name" />

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-form.label value="{{ __('Type') }}" />
                            <x-form.input name="type" value="{{$package->type?? ''}}" placeholder="Type"  />
                        </div>
                    </div>

                </div>

                <div class="clearfix mb-3 row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <x-form.label value="{{ __('Image Upload Limit') }}" />
                            <x-form.input name="imageLimit" value="{{$package->image_upload_limit	 ?? ''}}" type="number" placeholder="Image Upload Limit" />
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <x-form.label value="{{ __('Number of Video Uploads') }}" />
                        <x-form.input name="videouploadlimit"  type="number" placeholder="Number of Video Uploads" value="{{$package->video_upload_limit ?? ''}}" />
                    </div>
                </div>

{{--                 <div class="clearfix mb-3 row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <x-form.label value="{{ __('Video Lenght Limit (seconds)') }}" />
                            <x-form.input name="videolengthlimit" type="number" placeholder="5000" value="{{$package->video_length_limit ?? ''}}"/>
                        </div>
                    </div>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-round">Update Package</button>
            </form>
        </div>
    </div>

</x-sbadmin.app>
