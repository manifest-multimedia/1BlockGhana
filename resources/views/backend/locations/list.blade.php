<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Locations" menu="Locations" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">

                            <h2><strong>locations</strong> </h2>

                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$locations->isEmpty())
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Priority</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp

                                        @foreach ($locations as $location)
                                            @php $count++;@endphp
                                            <tr>
                                                <td><span class="social_icon linkedin">{{ $count }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $location->name }}</span>
                                                </td>

                                                <td><span class="list-name">{{ $location->position }}</span>
                                                </td>

                                                <td>
                                                   <span>
                                                    <button type="button" data-toggle="modal"
                                                    data-target="#editModal{{$location->id}}" class="badge badge-success">Edit</button>
                                                   </span>
                                                        <button type="button" data-toggle="modal"
                                                                        data-target="#deleteModal{{$location->id}}" class="badge badge-danger">Delete
                                                        </button>
                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        @include('backend.locations.modal.edit')
                                                        @include('backend.locations.modal.delete')

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p><strong>No Location listed</strong></p>
                                <span><a href="{{ route('location.add') }}">Click here</a> to add a new location</span>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Add Location</strong></h2>
                        </div>

                        <div class="body">
                            <form action="{{ route('location.store') }}" method="POST">
                                @csrf
                                <div class="clearfix mb-3 row">
                                    <div class="col-sm-12">
                                        <x-form.label value="{{ __('location Name') }}" />
                                        <x-form.input name="name" placeholder="location Name" />

                                        <x-form.label value="{{ __('Position') }}" />
                                        <x-form.input type="number" value="{{ $locations->max('position') + 1 }}" name="position" placeholder="" />

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
