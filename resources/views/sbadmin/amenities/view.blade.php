<x-sbadmin.app>
    <!-- Page Heading -->
    <x-sbadmin.breadcrumb title="Amenities" />


        <div class="row clearfix">
            <div class="col-lg-8 col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Amenities</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            @if (!$amenities->isEmpty())
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

                                        @foreach ($amenities as $amenity)
                                            @php $count++;@endphp
                                            <tr>
                                                <td><span class="social_icon linkedin">{{ $count }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $amenity->name }}</span>
                                                </td>

                                                <td>
                                                    <span>
                                                        <a href="{{ route('amenity.edit', ['id' => $amenity->id]) }}"><button
                                                                class="btn btn-datatable btn-icon btn-transparent-dark me-2"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-vertical">
                                                                    <circle cx="12" cy="12" r="1"></circle>
                                                                    <circle cx="12" cy="5" r="1"></circle>
                                                                    <circle cx="12" cy="19" r="1"></circle>
                                                                </svg></button></a>
                                                    </span>


                                                    <form method="POST"
                                                        action="{{ route('amenity.delete', $amenity->id) }}"
                                                        style="display: inline-block">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#deleteModal"
                                                            class="btn btn-datatable btn-icon btn-transparent-dark"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg></button>
                                                        <!-- Button trigger modal -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-md"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel">
                                                                            Warning</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p><strong>Are you sure you want to delete this
                                                                                Amenity?</strong></p>
                                                                        You won't be able to revert this!
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
                                <p><strong>No Amenities listed</strong></p>
                                <span><a href="{{ route('amenity.add') }}">Click here</a> to add a new amenity</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
              
             
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Amenities</h6>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('amenity.store') }}" method="POST">
                            @csrf
                            <div class="clearfix  row">
                                <div class="col-sm-12">
                                    <x-form.label value="{{ __('Amenity Name') }}" />
                                    <x-form.input name="name" placeholder="Amenity Name" />

                                    <button type="submit" class="btn mt-3 btn-primary btn-round">Add </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</x-sbadmin.app>
