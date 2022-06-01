<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="DevelopmentAds" name="Add Development Ad" menu="DevelopmentAds" link="{{route('developmentads.add')}}" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Development Ads</strong> </h2>
                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$developmentads->isEmpty())
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Name</th>

                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 0;
                                            @endphp

                                            @foreach ($developmentads as $development)
                                                @php $count++;@endphp
                                                <tr>
                                                    <td><span class="social_icon linkedin">{{ $count }}</span>
                                                    </td>
                                                    <td><span class="list-name"><img src="{{$development->getFirstMediaUrl('development_banner') ?? url('assets/images/avatar.jpg')}}" alt="{{$development->name}}" width="150"></span>
                                                    </td>
                                                    <td><span class="list-name">{{ $development->name }}</span>
                                                    </td>
                                                    <td><span class="list-name">{{ $development->adStatus }}</span>
                                                    </td>

                                                    <td>
                                                        <span>
                                                         <button type="button" data-toggle="modal"
                                                         data-target="#editModal{{$development->id}}" class="badge badge-success">Edit</button>
                                                        </span>



                                                             <button type="button" data-toggle="modal"
                                                                             data-target="#removeModal{{$development->id}}" class="badge badge-danger">Remove
                                                             </button>
                                                             <!-- Button trigger modal -->

                                                             <!-- Modal -->
                                                             @include('backend.ads.development_ads.modal.edit')
                                                             @include('backend.ads.development_ads.modal.remove')

                                                     </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><strong>No Development Ad listed</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </section>

</x-backend.app>
