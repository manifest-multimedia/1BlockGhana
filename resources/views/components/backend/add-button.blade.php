@props(['link', 'name'=>null, 'icon'=> 'edit'])

@if (isset($link))

<a href="{{$link}}">
<button class="btn btn-primary btn-round hidden-sm-down float-right m-l-10" type="submit">
		<i class="zmdi zmdi-{{$icon}}"></i>
        {{$name}}
</button>
</a>


@endif
