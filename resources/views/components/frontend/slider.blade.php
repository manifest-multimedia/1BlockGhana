<div class="homepage__property bg-light">
    <div class="homepage__property-carousel owl-carousel owl-carousel-slider owl-theme">
        @php
            $topAds = App\Models\TopAds::orderBy('priority')->get();
        @endphp

        @foreach ($topAds as $topAd)
        <div class="item1">
            <a href="http://{{$topAd->website}}" target="_blank">
                <div class="tc-image-caption4">
                    <img src="{{$topAd->getFirstMediaUrl('topAds')}}" alt="{{$topAd->name}}">
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<div class="clearfix"></div>


@section('scripts')
    <script>
        $('.owl-carousel-slider').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            autoplay:true,
           // autoWidth:false,
            height: 100,
            autoplayTimeout:3500,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:2
                }
            }
        })
    </script>
@endsection
