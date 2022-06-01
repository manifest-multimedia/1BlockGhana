<x-backend.app2>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Access Control List" menu="Access Control List" />

        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">

                            <h2><strong>Access Control</strong> </h2>

                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$users->isEmpty())
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Assigned Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp

                                        @foreach ($users as $user)
                                            @php $count++;@endphp
                                            <tr>
                                                <td><span class="social_icon linkedin">{{ $count }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $user->firstname }} {{ $user->lastname }}</span>
                                                </td>

                                                <td>
                                                 @foreach ($user->getRoleNames() as $key => $value)
                                                    {{$value}}
                                                @endforeach
                                            </td>

                                                <td>
                                                   <span>
                                                    <button type="button" data-toggle="modal"
                                                    data-target="#editModal{{$user->id}}" class="badge badge-success">Edit</button>
                                                   </span>





                                                        <!-- Modal -->
                                                        @include('backend.admin.modal.edit')
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p><strong>No Business Type listed</strong></p>

                            @endif
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-backend.app2>
