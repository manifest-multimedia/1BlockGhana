<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Roles" menu="Roles" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">

                            <h2><strong>Roles</strong> </h2>

                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$roles->isEmpty())
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

                                        @foreach ($roles as $role)
                                            @php $count++;@endphp
                                            <tr>
                                                <td><span class="social_icon linkedin">{{ $count }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $role->name }}</span>
                                                </td>

                                                <td>
                                                   <span>
                                                    <button type="button" data-toggle="modal"
                                                    data-target="#editModal{{$role->id}}" class="badge badge-success">Edit</button>
                                                   </span>



                                                        <button type="button" data-toggle="modal"
                                                                        data-target="#deleteModal{{$role->id}}" class="badge badge-danger">Delete
                                                        </button>
                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        @include('backend.role.modal.edit')
                                                        @include('backend.role.modal.delete')

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p><strong>No listed</strong></p>

                            @endif
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add Role</strong></h2>
                        </div>

                        <div class="body">
                            <form action="{{ route('role.store') }}" method="POST">
                                @csrf
                                <div class="clearfix mb-3 row">
                                    <div class="col-sm-12">
                                        <x-form.label value="{{ __('Role Name') }}" />
                                        <x-form.input name="name" placeholder="Role Name" />

                                        <button type="submit" class="btn btn-primary btn-round">Add </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-backend.app>
