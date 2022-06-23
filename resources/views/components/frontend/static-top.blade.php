@php
    $staticAds = App\Models\StaticTopAds::orderBy('id')->get();
@endphp

@if (!$staticAds->isEmpty())
<section class="blog__home bg-white pt-4 pb-0">
    <div class="container py-0">
        <div class="row">

            <x-notification.message />
            @foreach ($staticAds as $staticAd)
            <div class="col-md-6">
                <!-- CARD IMAGE -->
                <a href="#">
                    <div class="">
                        <div class="card__image-hover-style-v3-thumb">
                            <img src="{{$staticAd->getFirstMediaUrl('static_top') ? $staticAd->getFirstMedia('static_top')->getUrl('static_fit')  : '' }}" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

