<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Packages" name="Add New Package" menu="Packages" link="{{ route('package.add') }}" />
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong></strong> Packages</h2>

                </div>

                <div class="body">
                    <div class="table-responsive social_media_table">
                        @if (!$packages->isEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Image Upload</th>
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
                                            <td>{{ $package->image_upload_limit }} pictures</td>
                                            {{-- <td>{{ $package->video_length_limit }} seconds</td> --}}

                                            <td>
                                                <a href="{{ route('package.edit', ['id' => $package->id]) }}"><button class="badge badge-success">Edit</button></a>



                                                <button type="button" data-toggle="modal" data-target="#deleteModal{{$package->id}}"
                                                    class="badge badge-danger">Delete</button>
                                                <!-- Button trigger modal -->

                                                @include('backend.packages.modal.delete')

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
        </div>

    </section>
</x-backend.app>
