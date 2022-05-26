<form action="{{ route('development.delete', $development->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}

<div class="modal fade" id="deleteModal{{$development->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm"
        role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Are you sure you want to delete
                        this Development?</strong></p>

            </div>
            <div class="modal-footer">
                <button type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal">Cancel</button>
                <button type="submit"
                    class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

</form>
