    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script>
    $(".navbar-toggler").on('click',function() {
        $("html").toggleClass("nav-open");
    });
    </script>
