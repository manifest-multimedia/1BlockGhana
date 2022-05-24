<x-frontend.layout>

    <x-frontend.header />

     <!-- ABOUT -->
     <section class="home__message">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8">
                    <div class="text-center title__leading">
                        <!-- <h6 class="text-uppercase">trusted By thousands</h6> -->
                        <h3 class="text-capitalize">Account Suspended</h3>
                        <br />
                        <p>
                            Your account <strong>{{$account->name}}</strong> has been suspended. You will not be able to upload new listing on this platform as well as your existing listing will not be visible to visitors on this website. Kindly write to 1BlockGhana support desk <a href="mailto:support@1blockghana.com">support@1blockghana.com</a> to re-activate your account.
                        </p>
                        <p>Thank you</p>
                        <a href="/" class="mt-3 btn btn-primary text-capitalize"> Back to Homepage
                            <i class="ml-3 fa fa-angle-right "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END ABOUT -->


</x-frontend.layout>
