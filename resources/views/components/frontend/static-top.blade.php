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
                @if ($staticAd->link_type == 'website')
                    <a href="http://{{$staticAd->website}}" target="_blank">
                        <div class="">
                            <div class="card__image-hover-style-v3-thumb">
                                <img src="{{$staticAd->getFirstMediaUrl('static_top') ? $staticAd->getFirstMedia('static_top')->getUrl('static_fit')  : '' }}" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                    </a>
                @else
                    @php
                        $prop = App\Models\Properties::select('slug')->where('property_id',$staticAd->property_id)->first();
                    @endphp

                    @if ($prop)
                    <a href="{{route('listing.details',$prop->slug)}}">
                        <div class="">
                            <div class="card__image-hover-style-v3-thumb">
                                <img src="{{$staticAd->getFirstMediaUrl('static_top') ? $staticAd->getFirstMedia('static_top')->getUrl('static_fit')  : '' }}" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                    </a>

                    @else
                        <div class="">
                            <div class="card__image-hover-style-v3-thumb">
                                <img src="{{$staticAd->getFirstMediaUrl('static_top') ? $staticAd->getFirstMedia('static_top')->getUrl('static_fit')  : '' }}" alt="" class="img-fluid w-100">
                            </div>
                        </div>
                    @endif
                @endif

            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

