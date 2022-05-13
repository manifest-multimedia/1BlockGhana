<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="TopAds" name="Add New Ads" menu="TopAds" link="{{route('topads.add')}}" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Top Ads</strong> </h2>

                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$topads->isEmpty())
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Website</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 0;
                                            @endphp

                                            @foreach ($topads as $topad)
                                                @php $count++;@endphp
                                                <tr>
                                                    <td><span class="social_icon linkedin">{{ $count }}</span>
                                                    </td>
                                                    <td><span class="list-name"><img src="{{$topad->getFirstMediaUrl('topAds') ?? url('assets/images/avatar.jpg')}}" alt="{{$topad->name}}" width="150"></span>
                                                    </td>
                                                    <td><span class="list-name">{{ $topad->name }}</span>
                                                    </td>
                                                    <td><span class="list-name">{{ $topad->website }}</span>
                                                    </td>
                                                    <td><span class="list-name">{{ $topad->priority }}</span>
                                                    </td>

                                                    <td>

                                                        <a href="{{ route('topads.delete',$topad->id) }}"
                                                            class="badge badge-danger">Delete
                                                        </a>
                                                        <!-- Button trigger modal -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><strong>No Top Ad listed</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </section>

</x-backend.app>
