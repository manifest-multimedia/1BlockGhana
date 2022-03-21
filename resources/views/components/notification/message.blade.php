@if ($notification = Session::get('success'))
<div id="success-alert" class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $notification }}</strong>
</div>
@endif


@if ($notification = Session::get('error'))
<div id="success-alert" class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $notification }}</strong>
</div>
@endif


@if ($notification = Session::get('warning'))
<div id="success-alert" class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $notification }}</strong>
</div>
@endif


@if ($notification = Session::get('info'))
<div id="success-alert" class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>{{ $notification }}</strong>
</div>
@endif


@if ($errors->any())
<div id="success-alert" class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	Please check the form below for errors
</div>
@endif
