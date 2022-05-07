<x-backend.app >

    <!-- Main Content -->
<section class="content agent">
    <x-backend.breadcrumb page="Agent" name="Add New Agent" menu="Agents" link="{{route('agent.add')}}" />
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong></strong> Agents</h2>

            </div>

            <div class="body">
                <div class="table-responsive social_media_table">
                    @if (!$agents->isEmpty())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Business Name</th>
                                <th>Partner Type</th>
                                <th>Package</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 0;
                            @endphp

                            @foreach ($agents as $agent)
                             @php $count++;@endphp
                            <tr>
                                <td><span class="">{{$count}}</span>
                                </td>
                                <td width="25%"><span class="list-name">{{$agent->firstname}} {{$agent->lastname}}</span>
                                </td>
                                <td>{{$agent->business->name?? ''}}</td>
                                <td>
                                    @if (!$agent->partner == null)
                                        {{App\Models\BusinessType::find($agent->business->business_type_id)->name ?? ''}}
                                    @endif
                                </td>

                                <td>
                                    @if (!$agent->business == null)
                                        {{App\Models\Package::find($agent->business->package_id)->name ?? ''}}
                                    @endif
                                </td>

                                <td>
                                    <a href="{{route('agent.profile.id',$agent->id)}}"><button class="badge badge-success">View Profile</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p><strong>No Package listed</strong></p>
                    <span><a href="{{route('agent.add')}}">Click here</a> to add a new agent</span>
                    @endif


                </div>
            </div>
        </div>
    </div>

</section>
</x-backend.app>

