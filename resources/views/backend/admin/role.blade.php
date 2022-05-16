<x-backend.app2>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Agents" menu="Agent Profile" />
        <div class="container-fluid">
            <x-notification.message />

            <div class="row clearfix">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>User</strong> Role</h2>
                        </div>

                        <form action="" method="POST">
                            @csrf
                            <div class="body">
                                <div class="row clearfix mb-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Roles') }}" />
                                                <select class="form-control" name="role" id="">
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Permission') }}" />
                                                <select class="form-control" name="permission" id="">
                                                    @foreach ($permissions as $permission)
                                                        <option value="{{ $permission->name }}">{{ $permission->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Business Type') }}" />
                                                <select class="form-control" name="partner_id" id="">
                                                    @foreach ($partners as $partner)
                                                        <option value="{{ $partner->id }}">{{ $partner->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-backend.app2>
