<form action="{{ route('permission.revoke', $permission->name) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('patch') }}
    {{ csrf_field() }}

    <div class="modal fade" id="revokeModal{{$permission->id}}" tabindex="-1" permission="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-  modal-md" data-backdrop="false" permission="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Revoke Permission </h5>
                        <p>Permission: {{$permission->name}}</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidwden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <x-form.input name="permission_name" type="hidden" value="{{$permission->name}}" required/>

                        <x-form.label value="{{ __('Select Role') }}" />
                        <select class="form-control" name="role_name[]" id="" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ Str::ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Revoke</button>
                </div>
            </div>
        </div>
    </div>
</form>
