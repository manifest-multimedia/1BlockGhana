<x-layout.head>
    <div class="page-header">
        <x-auth.bg-image />
        <div class="container">
            <div class="col-md-12 login-center">
                <div class="card">
                    <div class="card-login">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(Session::has('message'))
                        <p class="alert alert-danger">{{ Session::get('message') }}</p>
                        @endif
                        <form method="POST" action="{{ route('reset.password.post') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="header">
                                <div class="logo-container">
                                    <img class="form-logo" src="assets/images/logo1.svg" alt="">
                                   {{--  <h5>Sign Up</h5> --}}
                                </div>

                              {{--   <span>Register a new membership</span> --}}
                            </div>
                            <x-form.error />
                            <div class="content">
                                <x-form.label for="email" value="{{ __('Email Address') }}" />
                                <x-form.input name="email" placeholder="Email Address" value="{{$email}}"/>

                                <x-form.label for="password" value="{{ __('New Password') }}" />
                                <x-form.input name="password"  type="password" placeholder="New Password" />

                                <x-form.label for="password" value="{{ __('Confirm Password') }}" />
                                <x-form.input name="password_confirmation"  type="password" placeholder="New Password" />

                            </div>

                            <div class="text-center footer">
                                <button type="submit" class="btn l-cyan btn-square btn-lg btn-block waves-effect waves-light">UPDATE PASSWORD</button>
                                <h6 class="text-gray-600 m-t-20">
                                    @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                            </h6>
                            <h6 class="text-gray-600 m-t-20"><a class="link" href="{{ route('register')}}">NEW USER?</a></h6>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-auth.footer />
    </div>
</x-layout.head>

