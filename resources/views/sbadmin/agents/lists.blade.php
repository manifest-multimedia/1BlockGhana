<x-sbadmin.app>
    <!-- Page Heading -->
    <x-sbadmin.breadcrumb title="Agents" />

    <a href="{{ route('agent.add')}}"><button class="btn btn-primary mb-2">Add Agent</button></a>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Agents</h6>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            @if (!$agents->isEmpty())
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Business Name</th>
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
                                        <td>@if (!$agent->business == null)
                                            {{App\Models\Package::find($agent->business->package_id)->name ?? ''}}
                                        @endif
                                            </td>
        
        
                                        <td>
                                            <a href="{{route('agent.profile.id',$agent->id)}}"><button class="btn text-white badge badge-success">View Profile</button></a>
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
        </div>

</x-sbadmin.app>
