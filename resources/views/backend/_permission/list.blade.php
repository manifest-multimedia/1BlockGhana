<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Permissions" menu="Permissions" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">

                            <h2><strong>Permissions</strong> </h2>

                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$permissions->isEmpty())
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Permission</th>
                                            <th>Assign To Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp

                                        @foreach ($permissions as $permission)
                                            @php $count++;@endphp
                                            <tr>
                                                <td><span class="social_icon linkedin">{{ $count }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $permission->name }}</span>
                                                </td>
                                                <td>
                                                    @foreach ($permission->roles as $role)
                                                    <span class="list-name">{{ $role->name }} |</span>
                                                    @endforeach

                                                </td>

                                                <td>
                                                   <span>
                                                    <button type="button" data-toggle="modal"
                                                    data-target="#editModal{{$permission->id}}" class="badge badge-success">Edit</button>
                                                   </span>

                                                   <span>
                                                    <button type="button" data-toggle="modal"
                                                    data-target="#revokeModal{{$permission->id}}" class="badge badge-warning">Revoke</button>
                                                   </span>



                                                        <button type="button" data-toggle="modal"
                                                                        data-target="#deleteModal{{$permission->id}}" class="badge badge-danger">Delete
                                                        </button>
                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        @include('backend._permission.modal.edit')
                                                        @include('backend._permission.modal.revoke')
                                                        @include('backend._permission.modal.delete')

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p><strong>No Permission listed</strong></p>

                            @endif
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add Permission</strong></h2>
                        </div>

                        <div class="body">
                            <form action="{{ route('permission.store') }}" method="POST">
                                @csrf
                                <div class="clearfix mb-3 row">
                                    <div class="col-sm-12">
                                        <x-form.label value="{{ __('Permission Name') }}" />
                                        <x-form.input name="permission_name" placeholder="Permission Name" />
                                        <x-form.label value="{{ __('Select Role') }}" />
                                        <select class="form-control" name="role_name" id="">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ Str::ucfirst($role->name) }}
                                                </option>
                                            @endforeach
                                        </select>

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
