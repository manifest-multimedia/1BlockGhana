<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="1Block Ghana - Real Estate Platform">
    <meta name="keywords" content="Real Estate, Property, Directory Listing, Marketing, Agency" />
    <meta name="author" content="Erob Osei - 1blockghana.com">
    <title>1Block Ghana</title>

    <link rel="icon" href="/favicon.png" type="image/x-icon"> <!-- Favicon-->
    <!-- favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="/icon.png">
    <meta name="theme-color" content="#3454d1">
    <link href="/frontend/css/styles.css" rel="stylesheet">
    <link href="/frontend/css/custom.css" rel="stylesheet">

</head>

<style>
    .projects__partner .owl-carousel{
        display: inline !important;
    }

    @media screen and (min-width: 575px) {

        section#show_on_mobile_only {
            display: none;
        }
    }

    @media screen and (max-width: 575px){

        section#hide_on_mobile_only {
            display: none;
        }
    }

    @media screen and (max-width: 991px){

        div#hide_filter_on_mobile_only {
            display: none;
        }

                section.home__about {
            display: none;
        }

        section.recent__property.pt-0 {
            margin-top: 50px;
        }
    }

    .imgslider{
        display: block;
        width: 100px;
        height: auto;
    }

    section.single__Detail {
    background-color: #f6f6f6;
}

.recent__property-carousel .owl-nav .owl-next {
    right: 0;
    left: auto;
    top: 40%;
}

.recent__property-carousel .owl-nav .owl-prev {
    left: 0;
    right: auto;
    top: 40%;
}

.development_banner .ribbon {
    box-shadow: 0px 1px 1px rgb(0 0 0 / 20%);
    transform: translate3d(0, 0, 1px) rotate(-45deg);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    background-color: #b78746;
    color: #fff;
    font-size: 14px;
    font-family: "Open Sans",sans-serif;
    padding: 6px;
    position: absolute;
    z-index: 3;
    left: -30px;
    top: 15px;
    width: 120px;
    text-align: center;
    margin: auto;
    height: 30px;
    bottom: inherit;
    right: inherit;
}

</style>
<body>

    <!-- Header Section -->

<!-- Header Section /- -->

	<!-- Page content -->
    {{$slot}}
    <!-- Page Content -->

<!-- Footer Section -->
 <x-frontend.n-footer />
<!-- Footer Section -->

	<!-- SCROLL TO TOP -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TO TOP -->


    <script src="/frontend/js/index.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')
    @yield('bottom-property-scripts')
    @yield('development_banner_scripts')
    @yield('autocomplete')
</body>

</html>
