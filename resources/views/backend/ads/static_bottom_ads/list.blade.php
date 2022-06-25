<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="StaticAds" name="View Static Bottom Ads" menu="Static Bottom Ads" link="{{route('static.bottomads.view')}}" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Static Bottom Ads</strong> </h2>
                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$staticAds->isEmpty())
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 0;
                                            @endphp

                                            @foreach ($staticAds as $staticAd)
                                                @php $count++;@endphp
                                                <tr>
                                                    <td><span class="social_icon linkedin">{{ $count }}</span>
                                                    </td>
                                                    <td><span class="list-name"><img src="{{$staticAd->getFirstMediaUrl('static_bottom')}}" alt="{{$staticAd->name}}" width="150"></span>
                                                    </td>

                                                    <td><span class="list-name">{{ $staticAd->priority }}</span>
                                                    </td>

                                                    <td>
                                                        <span>
                                                         <a href="{{route('static.bottomads.edit', $staticAd->id)}}">
                                                            <button type="button" class="badge badge-success">Edit</button>
                                                        </a>
                                                        </span>

                                                             <button type="button" data-toggle="modal"
                                                                             data-target="#removeModal{{$staticAd->id}}" class="badge badge-danger">Remove
                                                             </button>
                                                     </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><strong>No Static Bottom Ad listed</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </section>

</x-backend.app>
