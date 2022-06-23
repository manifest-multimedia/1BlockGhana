<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Sub Categories" menu="Sub Categories" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Sub Categories</strong> </h2>

                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$subcategories->isEmpty())
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 0;
                                            @endphp

                                            @foreach ($subcategories as $category)
                                                @php $count++;@endphp
                                                <tr>
                                                    <td><span class="social_icon linkedin">{{ $count }}</span>
                                                    </td>
                                                    <td><span class="list-name">{{ $category->name }}</span>
                                                    </td>

                                                    <td><span class="list-name">{{ $category->category->name ?? ''}}</span>
                                                    </td>

                                                    <td>
                                                        <span>
                                                            <button type="button" data-toggle="modal"
                                                                data-target="#editModal{{ $category->id }}"
                                                                class="badge badge-success">Edit</button>
                                                        </span>

                                                        <button type="button" data-toggle="modal"
                                                            data-target="#deleteModal{{ $category->id }}"
                                                            class="badge badge-danger">Delete
                                                        </button>
                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        @include(
                                                            'backend.category.sub_modal.edit'
                                                        )
                                                        @include(
                                                            'backend.category.sub_modal.delete'
                                                        )

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><strong>No category Type listed</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add Category</strong></h2>
                        </div>

                        <div class="body">
                            <form action="{{ route('sub.category.store') }}" method="POST">
                                @csrf
                                <div class="clearfix mb-3 row">
                                    <div class="col-sm-12">
                                        <x-form.label value="{{ __('Sub Category Name') }}" />
                                        <x-form.input name="name" placeholder="Category Name" />

                                        <x-form.label value="{{ __('Category Type') }}" />
                                        <select class="form-control" name="category_id" id="">
                                           @foreach ($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
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
    </section>

</x-backend.app>
