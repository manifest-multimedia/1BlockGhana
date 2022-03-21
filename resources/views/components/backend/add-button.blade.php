@props(['link'])

@if (isset($link))

<a href="{{$link}}">
<button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="submit">
		<i class="zmdi zmdi-plus"></i>
</button>
</a>


@endif
