<x-frontend.layout>

    <x-frontend.header />

    <x-frontend.breadcrumb title="Property News" />

 <div class="clearfix"></div>

 <!-- BLOG ON MOBILE-->
 <x-frontend.blog />
 <!-- END BLOG -->

 <!-- BLOG ON DESKTOP-->
 <x-frontend.blog_old />
 <!-- END BLOG -->

 <div class="clearfix" id="videos"></div>
 <!-- VIDEO -->
 <section class="home__video bg-theme-v6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mx-auto col-lg-8">
                <div class="text-center home__video-area">
                    <a href="#" class="play-video ">
                        <i class="text-white icon fa fa-play"></i>
                    </a>
                    <h2 class="text-white">The #1 Place For Commercial Property</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END VIDEO -->

<x-frontend.cta />

</x-frontend.layout>
