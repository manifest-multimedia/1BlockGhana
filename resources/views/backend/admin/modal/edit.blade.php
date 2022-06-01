<form action="{{ route('access.role.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('patch') }}
    {{ csrf_field() }}

    <div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" user="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" data-backdrop="false" user="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <x-form.label value="{{ __('Role Name') }}" />
                        <x-form.input name="user_name" value="{{$user->firstname}} {{$user->lastname}}" disabled/>
                </div>
                <div class="modal-body">
                        <div class="col-sm-6">
                            <x-form.label value="{{ __('Role') }}" />
                            <select class="form-control" name="role_id" id="">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ Str::ucfirst($role->name) }}</option>
                                @endforeach

                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
