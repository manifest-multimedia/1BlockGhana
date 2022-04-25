<x-frontend.layout>

    <x-frontend.header />
 <!-- CAROUSEL -->
 <x-frontend.slider />
 <!-- END CAROUSEL -->

 <div class="clearfix"></div>

 <x-frontend.search />

 <section class="home__about" id="hide_on_mobile_only">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="title__leading">
                    <!-- <h6 class="text-uppercase">trusted By thousands</h6> -->
                    <h2 class="text-capitalize">Our Mission</h2>
                    <p>
                        1BLOCK GHANA is a poster board  that looks to help its listing companies to reach out to their target audience.
                    </p>
                    {{-- <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </p> --}}
                    {{-- <a href="#" class="mt-3 btn btn-primary text-capitalize"> read more
                        <i class="ml-3 fa fa-angle-right "></i></a> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__image">
                    <div class="about__image-top">
                        <div class="about__image-top-hover">
                            <img src="frontend/images/gallery.jpg" alt="" class="img-fluid">
                        </div>

                    </div>
                    <div class="about__image-bottom">
                        <div class="about__image-bottom-hover">
                            <img src="frontend/images/gallery3.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <section class="recent__property pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="title__head-v2">
                    <h2 class="text-capitalize">Explore the luxury apartments</h2>
                    <p class="text-capitalize">Handpicked Exclusive Properties By Our Team.</p>
                </div>
            </div>
        </div>
        <div class="recent__property-carousel owl-carousel owl-theme">
            @foreach ($properties as $property)
            <div class="item">
                <!-- CARD IMAGE -->

                <a href="{{route('listing.details', $property->id)}}">
                    <div class="card__image-hover h-250">
                        <div class="card__image-hover-overlay">
                            <div class="listing-badges">
                                <span class="featured">
                                    Featured
                                </span>
                                <span>
                                    {{$property->purpose}}
                                </span>
                            </div>
                            <div class="card__image-content">
                                <div class="card__image-content-desc">
                                    <h6> {{$property->name}}</h6>
                                    <p class="mb-0">{{ $property->currency->code }}{{$property->price}}</p>
                                </div>
                                <ul class="list-inline card__hidden-content">
                                    <li class="list-inline-item">
                                        Baths
                                        <span>
                                            <i class="fa fa-bath"></i> {{$property->bathroom}}
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        Beds
                                        <span>
                                            <i class="fa fa-bed"></i> {{$property->bedroom}}
                                        </span>
                                    </li>

                                    <li class="list-inline-item">
                                        Area
                                        <span>
                                            <i class="fa fa-map"></i> {{$property->size}} sq ft
                                        </span>
                                    </li>

                                </ul>
                            </div>
                            <img alt="" src="{{$property->getFirstMediaUrl('properties')}}" class="img-fluid h-40 ">

                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>



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

 <!-- BLOG ON MOBILE-->
 <x-frontend.blog />
 <!-- END BLOG -->

 <!-- BLOG ON DESKTOP-->
 <x-frontend.blog_old />
 <!-- END BLOG -->

 <!-- TESTIMONIAL -->
 <x-frontend.testimonial />
 <!-- END TESTIMONIAL -->


 <!-- BRAND PARTNER -->
 <x-frontend.partners />
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

 <!-- Footer  -->
 <footer>
     <div class="wrapper__footer bg-theme-footer">
         <div class="container">
             <div class="row">
                 <!-- ADDRESS -->
                 <div class="col-md-4">
                     <div class="widget__footer">
                         {{-- <figure>
                             <img src="frontend/images/logo-blue.png" alt="" class="logo-footer">
                         </figure> --}}
                         <p>
                             1Block Ghana helped thousands of clients to find the right property for their needs.

                         </p>

                         <ul class="mt-3 mb-0 list-unstyled">
                             <li> <b> <i class="fa fa-map-marker"></i></b><span>Accra, Ghana</span> </li>

                             <li> <b><i class="fa fa-phone-square"></i></b><span>+44 7393 354293</span> </li>
                             <li> <b><i class="fa fa-headphones"></i></b><span>support@1blockghana.com</span> </li>

                         </ul>
                     </div>

                 </div>
                 <!-- END ADDRESS -->

                 <!-- QUICK LINKS -->
                 <div class="col-md-2">
                     <div class="widget__footer">
                         <h4 class="footer-title">Quick Links</h4>
                         <div class="link__category-two-column">
                             <ul class="list-unstyled ">
                                 <li class="list-inline-item">
                                     <a href="#">Home</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">About Us</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Contact Us</a>
                                 </li>
                                 {{-- <li class="list-inline-item">
                                     <a href="#">Residential</a>
                                 </li>

                                 <li class="list-inline-item">
                                     <a href="#">Residential Tower</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Beverly Hills</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Los angeles</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">The beach</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Property Listing</a>
                                 </li>

                                 <li class="list-inline-item">
                                     <a href="#">Clasic</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Modern Home</a>
                                 </li>

                                 <li class="list-inline-item">
                                     <a href="#">Luxury</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Beach Pasadena</a>
                                 </li> --}}
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- END QUICK LINKS -->
                 <!-- Categories LINKS -->
                 <div class="col-md-2">
                     <div class="widget__footer">
                         <h4 class="footer-title">Quick Links</h4>
                         <div class="link__category-two-column">
                             <ul class="list-unstyled ">
                                 <li class="list-inline-item">
                                     <a href="#">Home</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">About Us</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Contact Us</a>
                                 </li>
                                 {{-- <li class="list-inline-item">
                                     <a href="#">Residential</a>
                                 </li>

                                 <li class="list-inline-item">
                                     <a href="#">Residential Tower</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Beverly Hills</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Los angeles</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">The beach</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Property Listing</a>
                                 </li>

                                 <li class="list-inline-item">
                                     <a href="#">Clasic</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Modern Home</a>
                                 </li>

                                 <li class="list-inline-item">
                                     <a href="#">Luxury</a>
                                 </li>
                                 <li class="list-inline-item">
                                     <a href="#">Beach Pasadena</a>
                                 </li> --}}
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- END QUICK LINKS -->


                 <!-- NEWSLETTERS -->
                 <div class="col-md-4">
                     <div class="widget__footer">
                         <h4 class="footer-title">follow us </h4>
                         <p class="mb-2">
                             Follow us and stay in touch to get the latest news
                         </p>
                         <p>
                             <button class="mr-1 btn btn-social btn-social-o facebook">
                                 <i class="fa fa-facebook-f"></i>
                             </button>
                             <button class="mr-1 btn btn-social btn-social-o twitter">
                                 <i class="fa fa-twitter"></i>
                             </button>

                             <button class="mr-1 btn btn-social btn-social-o linkedin">
                                 <i class="fa fa-linkedin"></i>
                             </button>
                             <button class="mr-1 btn btn-social btn-social-o instagram">
                                 <i class="fa fa-instagram"></i>
                             </button>


                         </p>
                         <br>
                         <h4 class="footer-title">newsletter</h4>
                         <!-- Form Newsletter -->
                         <div class="widget__form-newsletter ">
                             <p>

                                 Don’t miss to subscribe to our news feeds, kindly fill the form below
                             </p>
                             <div class="mt-3">
                                 <input type="text" class="mb-2 form-control" placeholder="Your email address">

                                 <button class="btn btn-primary btn-block text-capitalize" type="button">subscribe

                                 </button>
                             </div>
                         </div>

                     </div>
                 </div>
                 <!-- END NEWSLETTER -->
             </div>
         </div>
     </div>

     <!-- Footer Bottom -->
     <div class="bg__footer-bottom-v1">
         <div class="container">
             <div class="row flex-column-reverse flex-md-row">
                 <div class="col-md-6">
                     <span>
                         © 2021 1Block Ghana - Developed by
                         <a href="manifestghana.com">Manifest Multimedia</a>
                     </span>
                 </div>
                 <div class="col-md-6">
                     <ul class="list-inline ">
                         <li class="list-inline-item">
                             <a href="#">
                                 privacy
                             </a>
                         </li>
                         <li class="list-inline-item">
                             <a href="#">
                                 contact
                             </a>
                         </li>
                         <li class="list-inline-item">
                             <a href="#">
                                 about
                             </a>
                         </li>
                         <li class="list-inline-item">
                             <a href="#">
                                 faq
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Footer  -->
 </footer>

</x-frontend.layout>
