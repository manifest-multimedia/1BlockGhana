<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb menu="Select Featured Ads" page="Select Featured Ads" name="View Featured Ads" link="{{route('featuredads.view')}}" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Select Featured Ads</strong> </h2>

                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$properties->isEmpty())
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Name</th>


                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 0;
                                            @endphp

                                            @foreach ($properties as $property)
                                                @php $count++;@endphp
                                                <tr>
                                                    <td><span class="social_icon linkedin">{{ $count }}</span>
                                                    </td>
                                                    <td><span class="list-name"><img src="{{$property->getFirstMediaUrl('properties') ?? url('assets/images/avatar.jpg')}}" alt="{{$property->name}}" width="150"></span>
                                                    </td>
                                                    <td><span class="list-name">{{ $property->name }}</span>
                                                    </td>

                                                    <td>
                                                        <span>
                                                         <button type="button" data-toggle="modal"
                                                         data-target="#editModal{{$property->id}}" class="badge badge-success">Add</button>
                                                        </span>





                                                             <!-- Modal -->
                                                             @include('backend.ads.featured_ads.modal.store')


                                                     </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><strong>Properties not available for Featured Ads</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </section>

</x-backend.app>
