<x-backend.app >

    <!-- Main Content -->
<section class="content agent">
    <x-backend.breadcrumb page="Create Category" menu="Create Category" />
    <div class="container-fluid">
        <div class="clearfix row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Category</strong> Details</h2>
                    </div>

                    <div class="body">
                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="clearfix mb-3 row">
                                <div class="col-sm-6">
                                    <x-form.label value="{{ __('Category Name') }}" />
                                    <x-form.input name="name" placeholder="Category Name" />

                            <button type="submit" class="btn btn-primary btn-round">Create Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</x-backend.app>

