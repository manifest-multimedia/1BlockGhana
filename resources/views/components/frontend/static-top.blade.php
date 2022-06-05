@php
    $staticAds = App\Models\StaticTopAds::orderBy('id')->get();
@endphp

@if (!$staticAds->isEmpty())
<section class="blog__home bg-white py-0">
    <div class="container">
        <div class="row">


            @foreach ($staticAds as $staticAd)
            <div class="col-md-6">
                <!-- CARD IMAGE -->
                <a href="#">
                    <div class="">
                        <div class="card__image-hover-style-v3-thumb h-230">
                            <img src="{{$staticAd->getFirstMediaUrl('static_top') ? $staticAd->getFirstMediaUrl('static_top') : '' }}" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

