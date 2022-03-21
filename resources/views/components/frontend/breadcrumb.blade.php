@props(['title'])
<div class="bg-theme-overlay">
    <section class="section__breadcrumb ">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="text-capitalize text-white ">{{$title}}</h2>
                    <ul class="list-inline ">
                        <li class="list-inline-item">
                            <a href="#" class="text-white">
                                home
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-white">
                                {{$title}}
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- END BREADCRUMB -->
