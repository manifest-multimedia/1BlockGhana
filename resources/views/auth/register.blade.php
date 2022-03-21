<x-layout.head>
    <div class="page-header">
        <x-auth.bg-image />
        <div class="container">
            <div class="content-center col-md-12">
                <div class="card">
                    <div class="card-plain1">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" data-dismiss="alert" class="close">x</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form class="form" method="POST" action="{{ route('signup.request') }}">
                            @csrf
                            <div class="pb-2 mb-0 header">
                                <div class="logo-container">
                                    <img class="form-logo" src="assets/images/logo.png" alt="">

                                </div>
                                <div class="mt-4 register-title">
                                    <h5>Sign Up</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-5 col">
                                    <h4 class="my-0">To list on this platform, kindly fill out the form below and our agents will get back to you.</h4>
                                </div>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-jet-label value="{{ __('First Name') }}" />
                                        <x-form.input name="firstname" placeholder="First Name" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-jet-label value="{{ __('Last Name') }}" />
                                        <x-form.input name="lastname" placeholder="Last Name" />
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-jet-label value="{{ __('Business Name') }}" />
                                        <x-form.input name="business_name" placeholder="Business Name" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-jet-label value="{{ __('Business Type') }}" />
                                        <x-form.input name="business_type" placeholder="Business Type" />
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-jet-label value="{{ __('Email Address') }}" />
                                        <x-form.input name="email" placeholder="Email Address" />
                                    </div>

                                    <div class="col-md-6">
                                        <x-jet-label value="{{ __('Physical Address') }}" />
                                        <x-form.input name="physical_address" placeholder="Physical Address" />
                                    </div>
                                </div>
                            </div>

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="checkbox">
                                    <input id="terms" name="terms" type="checkbox">
                                    <label for="terms">
                                        I read and agree to the <a href="javascript:void(0);">terms of usage</a>
                                    </label>
                                </div>
                            @endif
                            <div class="text-center footer">
                                <button type="submit"
                                    class="btn l-cyan btn-square btn-lg btn-block waves-effect waves-light">SUBMIT</button>
                                <h6 class="text-gray-600 m-t-20"><a class="link"
                                        href="{{ route('login') }}">ALREADY REGISTERED?</a></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-auth.footer />
    </div>
</x-layout.head>
