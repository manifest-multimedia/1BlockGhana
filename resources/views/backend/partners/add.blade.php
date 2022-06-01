<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Partners" menu="Add New Partner" />
        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="clearfix row">
                <div class="col-lg-12">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="header">
                            <h2><strong>Personal</strong> Information</h2>
                        </div>

                        <div class="body">
                            @if ($packages->isEmpty())
                                <p><strong>You need to first add your Packages before an agent can be added to this
                                        platform</strong></p>
                                <span><a href="{{ route('package.add') }}">Click here</a> to add a new package</span>
                            @elseif ($roles->isEmpty())
                                <p><strong>You need to first add the User Role before an agent can be added to
                                        this platform</strong></p>
                                <span><a href="{{ route('role.list') }}">Click here</a> to add a new Category</span>
                            @else
                                <form action="{{ route('send.user.otp') }}" method="post">
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
                                            <x-form.label value="{{ __('Partner Type') }}" />
                                            <select class="form-control" name="role_name" id="">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ Str::ucfirst($role->name) }}</option>
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
                                            <button type="submit" class="btn btn-primary">Send Partner OTP</button>
                                        </div>
                                    </div>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-backend.app>
