<x-frontend.layout>

    <x-frontend.header />
     <!-- CAROUSEL -->
 <x-frontend.slider />
 <!-- END CAROUSEL -->

 <div class="clearfix"></div>

 <x-frontend.search :categories="$categories"/>

 <x-frontend.explore-section :properties="$properties"/>

 <x-frontend.popular-cities />






 <!-- TESTIMONIAL -->
{{--  <x-frontend.testimonial /> --}}
 <!-- END TESTIMONIAL -->


 <!-- BRAND PARTNER -->
{{--  <x-frontend.partners /> --}}
 <!-- END BRAND PARTNER -->



 <!-- CALL TO ACTION -->
<x-frontend.cta />
 <!-- END CALL TO ACTION -->



</x-frontend.layout>
