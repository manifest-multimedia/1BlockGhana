<x-backend.app2>

    <!-- Main Content -->
    <section class="content agent">
        <x-backend.breadcrumb page="Agents" menu="Agent Profile" />
        <div class="container-fluid">
            <x-notification.message />

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Personal</strong> Information</h2>

                        </div>

                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="body">
                                @role('admin')
                                    <div class="row clearfix mb-3">
                                        <div class="col-sm-4">
                                            <x-form.label value="{{ __('First Name') }}" />
                                            <x-form.input name="firstname" placeholder="Firstname"
                                                value="{{ $user->firstname }}" />
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Last Name') }}" />
                                                <x-form.input name="lastname" placeholder="Lastname"
                                                    value="{{ $user->lastname }}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Business Type') }}" />
                                                <select class="form-control" name="role_name" id="">

                                                    @foreach ($partners as $partner)
                                                        <option {{$user->getRoleNames()[0] == $partner->name ? 'selected' : ''}} value="{{ $partner->name }}">{{ Str::ucfirst($partner->name) }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                         {{--    @dd($user->getRoleNames()) --}}
                                        </div>
                                    </div>
                                @else
                                    <div class="row clearfix mb-3">
                                        <div class="col-sm-6">
                                            <x-form.label value="{{ __('First Name') }}" />
                                            <x-form.input name="firstname" placeholder="Firstname"
                                                value="{{ $user->firstname }}" readonly />
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <x-form.label value="{{ __('Last Name') }}" />
                                                <x-form.input name="lastname" placeholder="Lastname"
                                                    value="{{ $user->lastname }}" readonly />
                                            </div>
                                        </div>


                                    </div>
                                @endrole

                                <div class="row clearfix mb-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Phone Number') }}" />
                                            <x-form.input name="phone" type="tel" placeholder="Phone Number"
                                                value="{{ $user->mobile }}" />
                                        </div>
                                    </div>
                                @role('admin')
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Email Address') }}" />
                                            <x-form.input name="email" type="email" placeholder="Email Address"
                                                value="{{ $user->email }}"/>
                                        </div>
                                    </div>
                                @else
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <x-form.label value="{{ __('Email Address') }}" />
                                        <x-form.input name="email" type="email" placeholder="Email Address"
                                            value="{{ $user->email }}" disabled/>
                                    </div>
                                </div>
                                @endrole
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Update</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <form action="{{ route('user.update.business', $user->id) }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="header">
                                <h2><strong>Business</strong> Information</h2>

                            </div>
                            <div class="body">
                                <div class="row clearfix">

                                    @role('admin|super admin')
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Business Name') }}" />
                                            <x-form.input name="business_name"  placeholder="Business Name"
                                                value="{{ $user->business->name ?? '' }}" />
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Business Name') }}" />
                                            <x-form.input disabled name="business_name"  placeholder="Business Name"
                                                value="{{ $user->business->name ?? '' }}" />
                                        </div>
                                    </div>
                                    @endrole

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Business Email') }}" />
                                            <x-form.input name="business_email" type="email"
                                                placeholder="Business Email"
                                                value="{{ $user->business->email ?? '' }}" />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Business Phone Number') }}" />
                                            <x-form.input name="business_phone" placeholder="Business Phone Number"
                                                value="{{ $user->business->mobile ?? '' }}" />
                                        </div>
                                    </div>



                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Business Website') }}" />
                                            <x-form.input name="business_website" type="text"
                                                placeholder="www.domain.com"
                                                value="{{ $user->business->website ?? '' }}" />
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <x-form.label value="{{ __('Business Description') }}" />
                                            <x-form.textarea name="business_description" type="email"
                                                placeholder="Tell us about your business"
                                                value="{{ $user->business->description ?? '' }}" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round">Update Business</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Business</strong> Photo</h2>

                        </div>
                        <div class="body">
                            <form method="POST" enctype="multipart/form-data" id="upload-image"
                                action="{{ route('user.logo.upload', $user->id) }}">
                                @csrf
                                <div class="row clearfix">

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="file" name="logo" placeholder="Choose image" id="logo"
                                                        class="filepond">
                                                    @error('image')
                                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-md-12 mb-2">
                                            
                                            <img src="{{ $user->getFirstMediaUrl('logos')? $user->getFirstMediaUrl('logos'): url('assets/images/avatar.jpg') }}"
                                                alt="preview image" style="width: 200px;">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" id="submit">Update
                                            Photo</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('scripts')
        <script>
            const regPond = FilePond.registerPlugin(
                FilePondPluginImagePreview,
                FilePondPluginImageResize,
                FilePondPluginImageCrop,
                FilePondPluginImageTransform,

            );


            // Get a reference to the file input element
            const inputElement = document.querySelector('input[id="logo"]');

            // Create a FilePond instance
            const pond = FilePond.create(inputElement, {
                labelIdle: `Click here to upload your logo`,
                imagePreviewMaxHeight: 50,
                imageCropAspectRatio: '1:1',
                imageResizeTargetWidth: 200,
                imageResizeTargetHeight: 200,
                stylePanelLayout: 'compact circle',
                styleLoadIndicatorPosition: 'center bottom',
                styleButtonRemoveItemPosition: 'center bottom'
            });
            FilePond.setOptions({
                server: {
                    url: '/dashboard/user/upload',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        </script>
    @endsection
</x-backend.app2>
