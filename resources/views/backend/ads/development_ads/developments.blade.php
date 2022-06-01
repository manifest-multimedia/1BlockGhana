<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb menu="Select Development Ads" page="Select Development Ads" name="View Development Ads" link="{{route('developmentads.view')}}" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Select Development Ads</strong> </h2>

                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$developments->isEmpty())
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

                                            @foreach ($developments as $development)
                                                @php $count++;@endphp
                                                <tr>
                                                    <td><span class="social_icon linkedin">{{ $count }}</span>
                                                    </td>
                                                    <td><span class="list-name"><img src="{{$development->getFirstMediaUrl('developments') ?? url('assets/images/avatar.jpg')}}" alt="{{$development->name}}" width="150"></span>
                                                    </td>
                                                    <td><span class="list-name">{{ $development->name }}</span>
                                                    </td>

                                                    <td>
                                                        <span>
                                                         <button type="button" data-toggle="modal"
                                                         data-target="#editModal{{$development->id}}" class="badge badge-success">Add</button>
                                                        </span>





                                                             <!-- Modal -->
                                                             @include('backend.ads.development_ads.modal.store')


                                                     </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><strong>No Development Listing available at the moment</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </section>

</x-backend.app>
