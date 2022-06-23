<x-frontend.layout>

    <x-frontend.header />

<!-- CAROUSEL -->
 <x-frontend.slider />
<!-- END CAROUSEL -->

 <!-- CAROUSEL -->

 <div class="clearfix"></div>

 <x-frontend.search :categories="$categories" :currencies="$currencies"/>

 <x-frontend.static-top />

 <x-frontend.explore-section :properties="$properties"/>

 <x-frontend.development-banner  :developments="$developments"/>

 <x-frontend.featured-developments :developments="$developments"/>

 <x-frontend.static-bottom  :statics="$statics"/>

 <!-- CALL TO ACTION -->
<x-frontend.cta />
 <!-- END CALL TO ACTION -->

</x-frontend.layout>
