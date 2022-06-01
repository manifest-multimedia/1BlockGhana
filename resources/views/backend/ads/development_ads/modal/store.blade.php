<form action="{{ route('developmentads.store', $development->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="modal fade" id="editModal{{$development->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" data-backdrop="false" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Add Featured Priority</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <x-form.label value="{{ __('Priority') }}" />
                        <x-form.input name="priority" value="{{$development->adStatus}}" required/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add Development To Ads</button>
                </div>
            </div>
        </div>
    </div>
</form>
