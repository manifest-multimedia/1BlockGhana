@props(['page','menu', 'link', 'class'=>null])

<div class="block-header {{$class}}">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>{{ $menu }}
                <small class="text-muted">Welcome to 1BlockGhana</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> 1BlockGhana</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $page }}</a></li>
                   {{--  <li class="breadcrumb-item active">{{ $menu }}</li> --}}
                </ul>

                @if (isset($link))
                <x-backend.add-button link="{{$link}}" />
                @endif
            </div>
        </div>
    </div>
