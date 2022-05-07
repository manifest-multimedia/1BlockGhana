<x-frontend.layout>

    <x-frontend.header />
     <!-- CAROUSEL -->
 <x-frontend.slider />
 <!-- END CAROUSEL -->

 <div class="clearfix"></div>

 <x-frontend.search />

 <x-frontend.explore-section :properties="$properties"/>

 <x-frontend.popular-cities />



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


 <!-- TESTIMONIAL -->
{{--  <x-frontend.testimonial /> --}}
 <!-- END TESTIMONIAL -->


 <!-- BRAND PARTNER -->
{{--  <x-frontend.partners /> --}}
 <!-- END BRAND PARTNER -->



 <!-- CALL TO ACTION -->
 <section class="py-5 cta-v1">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-9">
                 <h2 class="text-white text-uppercase">Looking To Sell Or Rent Your Property?</h2>
                 <p class="text-white text-capitalize">We Will Assist You In The Best And Comfortable Property
                     Services
                     For You
                 </p>

             </div>
             <div class="col-lg-3">
                 <a href="{{route('contact')}}" class="btn btn-light text-uppercase ">Contact Us
                     <i class="ml-3 fa fa-angle-right arrow-btn "></i></a>
             </div>
         </div>
     </div>
 </section>
 <!-- END CALL TO ACTION -->



</x-frontend.layout>
