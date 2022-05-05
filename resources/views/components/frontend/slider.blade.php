<div class="homepage__property bg-light">
    <div class="homepage__property-carousel owl-carousel owl-theme owl-height">
        <div class="item">
            <a href="#">
                <div class="tc-image-caption4">
                    <img src="/frontend/images/bg19.jpg" alt="img1">


                </div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="tc-image-caption4">
                    <img src="/frontend/images/2.jpg" alt="img1">

                </div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="tc-image-caption4">
                    <img src="/frontend/images/01.jpg" alt="img1">


                </div>
            </a>
        </div>
        <div class="item">
            <a href="#">
                <div class="tc-image-caption4">
                    <img src="/frontend/images/2.jpg" alt="img1">

                </div>
            </a>
        </div>


    </div>

</div>

<div class="clearfix"></div>


@section('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            autoplay:true,
            autoplayTimeout:3500,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
@endsection
