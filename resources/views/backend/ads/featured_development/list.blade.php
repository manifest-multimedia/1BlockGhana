<x-backend.app>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Featured Development" name="Add Featured Ad" menu="Featured Development" link="{{route('featured.development.add')}}" />
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Featured Development</strong></h2>
                        </div>
                        <x-notification.message />

                        <div class="body">
                            <div class="table-responsive">
                                @if (!$featureds->isEmpty())
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Name</th>

                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 0;
                                            @endphp

                                            @foreach ($featureds as $featured)
                                                @php $count++;@endphp
                                                <tr>
                                                    <td><span class="social_icon linkedin">{{ $count }}</span>
                                                    </td>
                                                    <td><span class="list-name"><img src="{{$featured->getFirstMediaUrl('developments') ?? url('assets/images/avatar.jpg')}}" alt="{{$featured->name}}" height="100"></span>
                                                    </td>
                                                    <td><span class="list-name">{{ $featured->name }}</span>
                                                    </td>

                                                    <td><span class="list-name">{{ $featured->adStatus }}</span>
                                                    </td>

                                                    <td>
                                                        <span>
                                                         <button type="button" data-toggle="modal"
                                                         data-target="#editModal{{$featured->id}}" class="badge badge-success">Edit</button>
                                                        </span>


                                                            <button type="button" data-toggle="modal"
                                                                            data-target="#removeModal{{$featured->id}}" class="badge badge-danger">Remove
                                                            </button>


                                                            <!-- Modal -->
                                                            @include('backend.ads.featured_development.modal.edit')
                                                            @include('backend.ads.featured_development.modal.remove')

                                                     </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><strong>No Featured Ad listed</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </section>

</x-backend.app>
