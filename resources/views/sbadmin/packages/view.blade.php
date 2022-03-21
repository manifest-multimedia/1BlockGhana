<x-sbadmin.app >



    <!-- Page Heading -->
   {{--  <x-sbadmin.breadcrumb title="Packages" /> --}}
    
    
    <a href="{{ route('package.add')}}"><button class="btn btn-primary mb-2">Create Package</button></a>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Packages</h6>
        </div>
        
        <div class="card-body">
            
            <div class="table-responsive">
                    @if (!$packages->isEmpty())
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Listing Limit</th>
                                <th>Image Upload</th>
                                <th>Video Upload</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp

                            @foreach ($packages as $package)
                                @php $count++;@endphp
                                <tr>
                                    <td><span class="social_icon linkedin">{{ $count }}</span>
                                    </td>
                                    <td><span class="list-name">{{ $package->name }}</span>
                                    </td>
                                    <td>{{ $package->type }}</td>
                                    <td>{{ $package->listing_limit }} listing</td>
                                    <td>{{ $package->image_upload_limit }} pictures</td>
                                    <td>{{ $package->video_upload_limit }} video</td>
                                    

                                    <td>
                                        <a href="{{ route('package.edit', ['id' => $package->id]) }}"><button
                                                class="badge badge-success">Edit</button></a>


                                        <form method="POST"
                                            action="{{ route('package.delete', $package->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="button" data-toggle="modal" data-target="#deleteModal"
                                                class="badge badge-danger">Delete</button>
                                            <!-- Button trigger modal -->

                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-md"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Warning</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Are you sure you want to delete this
                                                                    Package?</strong></p>
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
                    <p><strong>No Package listed</strong></p>
                    <span><a href="{{ route('package.add') }}">Click here</a> to add a new package</span>
                @endif
            </div>
        </div>
    </div>





</x-sbadmin.app>
