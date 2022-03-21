<x-sbadmin.app>
    <!-- Page Heading -->
    <x-sbadmin.breadcrumb title="Amenities" />
    <div class="container-fluid1">

        <div class="row clearfix">
            <div class="col-lg-8 col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            @if (!$categories->isEmpty())
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

                                        @foreach ($categories as $category)
                                            @php $count++;@endphp
                                            <tr>
                                                <td width="10%"><span class="">{{ $count }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $category->name }}</span>
                                                </td>

                                                <td>

                                                    <span><a href="#"><button class="badge badge-success"
                                                                data-toggle="modal"
                                                                data-target="#categoryModal">Edit</button></a></span>


                                                    <div class="modal fade" id="categoryModal" tabindex="-1"
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
                                                                        </div>


                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Delete Button --}}
                                                    <span><button type="button" data-toggle="modal"
                                                            data-target="#deleteModal"
                                                            class="badge badge-danger">Delete</button></span>

                                                    {{-- Delete Modal --}}
                                                    <form method="POST"
                                                        action="{{ route('category.delete', $category->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">

                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModal" tabindex="-1"
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
                                                                                this Category?</strong></p>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p><strong>No Category listed</strong></p>

                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">

                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="clearfix mb-3 row">
                                <div class="col-sm-12">
                                    <x-form.label value="{{ __('Category Name') }}" />
                                    <x-form.input name="name" placeholder="Category Name" />

                                    <button type="submit" class="mt-3 btn btn-primary btn-round">Add </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-sbadmin.app>
