<x-sbadmin.app >    
    
    <a href="{{ route('agent.view')}}"><button class="btn btn-primary mb-2">View Agents</button></a>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agents</h6>
        </div>
        
        <div class="card-body">
            @if ($packages->isEmpty())
                <p><strong>You need to first add your Packages before an agent can be added to this
                        platform</strong></p>
                <span><a href="{{ route('package.add') }}">Click here</a> to add a new package</span>
            @elseif ($categories->isEmpty())
                <p><strong>You need to first add the Business Category before an agent can be added to
                        this platform</strong></p>
                <span><a href="{{ route('category.add') }}">Click here</a> to add a new Category</span>
            @else
                <form action="{{ route('send.agent.otp') }}" method="post">
                    @csrf
                    <div class="clearfix mb-3 row">
                        <div class="col-sm-6">
                            <x-form.label value="{{ __('First Name') }}" />
                            <x-form.input name="firstname" placeholder="Firstname" />
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-form.label value="{{ __('Last Name') }}" />
                                <x-form.input name="lastname" placeholder="Lastname" />
                            </div>
                        </div>

                    </div>

                    <div class="clearfix mb-3 row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-form.label value="{{ __('Business Name') }}" />
                                <x-form.input name="business_name" type="text"
                                    placeholder="Business Name" />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <x-form.label value="{{ __('Business Category') }}" />
                            <select class="form-control" name="category_id" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="clearfix mb-3 row">
                        <div class="col-sm-6">
                            <x-form.label value="{{ __('Physical Address') }}" />
                            <x-form.input name="physical_address" placeholder="Physical Address" />
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-form.label value="{{ __('Email Address') }}" />
                                <x-form.input name="email" type="email" placeholder="Email Address" />
                            </div>
                        </div>
                    </div>
                    <div class="clearfix mb-3 row">
                        <div class="col-sm-6">
                            <x-form.label value="{{ __('Package Type') }}" />
                            <select class="form-control" name="package_id" id="">
                                @foreach ($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                @endforeach

                            </select>
                        </div>


                    </div>

                    <div class="clearfix mb-3 row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Send Agent OTP</button>
                        </div>
                    </div>
                </form>
            @endif

        </div>
    </div>

</x-sbadmin.app>
