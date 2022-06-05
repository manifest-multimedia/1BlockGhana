@section('reg-style')
<style>
    @media screen and (max-width: 767){
        .content-center {
            align-content: center;
            margin-top: 10px !important;
        }
    }
</style>
@endsection

<x-layout.head>
    <div class="page-header1">
        <div class="container">
            <div class="content-center col-md-12 mt-4">
                <div class="card">
                    <div class="card-plain1">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="logo-container">
                                <img class="form-logo" src="{{asset('assets/images/logo.PNG')}}" alt="">
                            </div>
                            <div class="header mb-0 mt-2">
                                <h6 class="text-center">Login</h6>
                            </div>

                            <x-form.error />
                            <div class="content">
                                <x-form.label for="email" value="{{ __('Email Address') }}" />
                                <div class="input-group">
                                    <input id="email" class="form-control"  name="email" placeholder="Email Address" required>
                                </div>

                                <x-form.label for="password" value="{{ __('Password') }}" />
                                <div class="input-group">
                                    <input id="password" class="form-control" name="password"  type="password" placeholder="Password" required>
                                </div>

                            </div>

                            <div class="text-center footer">
                                <button type="submit" class="btn l-cyan btn-square btn-lg btn-block waves-effect waves-light">SIGN IN</button>
                                <h6 class="text-gray-600 m-t-20">
                                    @if (Route::has('password.request'))
                                    <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                            </h6>
                            <h6 class="text-gray-600 m-t-20"><a class="link" href="{{ route('register')}}">NEW AGENT?&nbsp;&nbsp; <u>SignUp Here</u></a></h6>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
        </div>
        <x-auth.footer />
    </div>
</x-layout.head>
