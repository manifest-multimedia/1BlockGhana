<x-backend.app >

    <!-- Main Content -->
<section class="content agent">
    <x-backend.breadcrumb page="Partner" name="Add New Partner" menu="Partners" link="{{route('user.add')}}" />
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong></strong> Partners</h2>
            </div>

            <div class="body">
                <div class="table-responsive social_media_table">
                    @if (!$partners->isEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Business Name</th>
                                <th>Partner Type</th>
                                <th>Package</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 0;
                            @endphp

                            @foreach ($partners as $partner)
                             @php $count++;@endphp
                            <tr>
                                <td><span class="">{{$count}}</span>
                                </td>
                                <td width="25%"><span class="list-name">{{$partner->firstname}} {{$partner->lastname}}</span>
                                </td>
                                <td>{{$partner->business->name?? ''}}</td>
                                <td>

                                        {{App\Models\BusinessType::find($partner->business->business_type_id)->name ?? ''}}

                                </td>

                                <td>
                                    @if (!$partner->business == null)
                                        {{App\Models\Package::find($partner->business->package_id)->name ?? ''}}
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('user.profile.id',$partner->id)}}"><button class="badge badge-success">View Profile</button></a>
                                </td>
                                <td>
                                    @livewire('admin.business-status', [
                                        'model' => $partner->business,
                                        'field' => 'business_status',
                                    ])

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p><strong>No Package listed</strong></p>
                    <span><a href="{{route('user.add')}}">Click here</a> to add a new partner</span>
                    @endif


                </div>
            </div>
        </div>
    </div>


</section>
</x-backend.app>

