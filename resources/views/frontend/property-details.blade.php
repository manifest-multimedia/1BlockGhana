<x-frontend.layout>

    <x-frontend.header />
    <x-frontend.breadcrumb-list title="{{$property->name}}" />
 <div class="clearfix"></div>

<!-- LISTING LIST -->
<x-frontend.detail-listing :property="$property" :similar="$similar"/>
<!-- END LISTING LIST -->

 <!-- BRAND PARTNER -->
 <x-frontend.partners />
 <!-- END BRAND PARTNER -->



 <!-- CALL TO ACTION -->
 <x-frontend.cta />
 <!-- END CALL TO ACTION -->


</x-frontend.layout>
