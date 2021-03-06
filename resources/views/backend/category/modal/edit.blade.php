<div class="modal fade" id="editModal{{$category->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-md"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="header">
                    <h2><strong> Update Categories</strong>
                    </h2>

                </div>
                <button type="button" class="close"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form
                action="{{ route('category.update', $category->id) }} "
                method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <x-form.label
                            value="{{ __('Category Name') }}" />
                        <x-form.input name="name"
                            placeholder="Category Name"
                            value="{{ $category->name }}" />

                        <x-form.label value="{{ __('Category Type') }}" />

                        <select class="form-control" name="type" id="">
                            <option {{$category->type == "property" ? 'selected' : ''}} value="property">Property</option>
                            <option {{$category->type == "development" ? 'development' : ''}} value="development">Development</option>
                        </select>

                        <x-form.label
                            value="{{ __('Position Number') }}" />
                        <x-form.input name="position"
                            placeholder="Position Number"
                            value="{{ $category->position }}" />
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit"
                        class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
