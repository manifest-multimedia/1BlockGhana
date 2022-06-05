@if ($errors->any())
    <p class="error-text text-center">Invalid username or password</p>
@endif

@if (session('error'))
    <div class="alert alert-danger">
       {{ session('error') }}
    </div>
@endif
