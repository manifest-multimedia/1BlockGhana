<x-backend.app>

	<!-- Main Content -->
	<section class="content agent">
		<x-backend.breadcrumb page="Developments" name="Add New Development" menu="Developments" link="{{route('development.add')}}" />

		<div class="clearfix row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Listed Developments</strong> </h2>

                    </div>
                    <x-notification.message />

                    <div class="body">
                        <div class="table-responsive">
                            @if (!$developments->isEmpty())
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 0;
                                        @endphp

                                        @foreach ($developments as $development)
                                            @php $count++;@endphp
                                            <tr>
                                                <td><span class="social_icon linkedin">{{ $count }}</span>
                                                </td>
                                                <td><span class="list-name"><img src="{{$development->getFirstMediaUrl('development_banner') ?? url('/assets/images/avatar.jpg')}}" alt="{{$development->name}}" width="100"></span>
                                                </td>
                                                <td><span class="list-name">{{ $development->name }}</span>
                                                </td>
                                                <td><span class="list-name">{{ $development->location }}</span>
                                                </td>

                                                <td>
                                                    <span>
                                                     <a href="{{ route('development.details', $development->id)}}" class="badge badge-success">View</a>
                                                    </span>
                                                     <button type="button" data-toggle="modal"
                                                     data-target="#deleteModal{{$development->id}}" class="badge badge-danger">Delete</button>
                                                    </span>

                                                         <!-- Modal -->
                                                         @include('backend.developments.modal.delete')


                                                 </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p><strong>No development listed. <a href="{{route('development.add')}}">Click here</a> to add a new development</strong></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
		</div>
		</div>

	</section>
</x-backend.app>
