

            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">

                            <h2><strong>Assign Role</strong> </h2>

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
                                                <td><span class="list-name">{{ $user->firstname }}</span>
                                                </td>

                                                <td>
                                                   <span>
                                                    <button type="button" data-toggle="modal"
                                                    data-target="#editModal{{$user->id}}" class="badge badge-success">Edit</button>
                                                   </span>



                                                        <button type="button" data-toggle="modal"
                                                                        data-target="#deleteModal{{$user->id}}" class="badge badge-danger">Delete
                                                        </button>
                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                       {{--  @include('backend.user.modal.edit')
                                                        @include('backend.user.modal.delete') --}}

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

