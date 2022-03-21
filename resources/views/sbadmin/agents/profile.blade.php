<x-sbadmin.app >    
    
    <a href="{{ route('agent.view')}}"><button class="btn btn-primary mb-2">Agent Profile</button></a>
     
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5><strong>Personal</strong> Information</h5>
                    {{-- <ul class="header-dropdown">
                        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right slideUp">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul> --}}
                </div>

                <form action="{{ route('agent.update', $user->id)}}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="row clearfix mb-3">
                            <div class="col-sm-6">
                                <x-form.label value="{{ __('First Name') }}" />
                                <x-form.input name="firstname" placeholder="Firstname" value="{{$user->firstname}}" readonly />
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Last Name') }}" />
                                    <x-form.input name="lastname" placeholder="Lastname" value="{{$user->lastname}}" readonly />
                                </div>
                            </div>

                        </div>

                        <div class="row clearfix mb-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Phone Number') }}" />
                                    <x-form.input name="phone" type="tel" placeholder="Phone Number" value="{{$user->mobile}}" />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Email Address') }}" />
                                    <x-form.input name="email" type="email" placeholder="Email Address" value="{{$user->email}}" />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-round">Update</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-8 col-md-12">
            <form action="{{ route('agent.update.business', $user->id)}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5><strong>Business</strong> Information</h5>

                    </div>
                    <div class="card-body">
                        <div class="row clearfix">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Business Email') }}" />
                                    <x-form.input name="business_email" type="email" placeholder="Business Email" value="{{$user->business->email ??''}}" />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Business Phone Number') }}" />
                                    <x-form.input name="business_phone" placeholder="Business Phone Number" value="{{$user->business->mobile ??''}}" />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Business Website') }}" />
                                    <x-form.input name="business_website" type="text" placeholder="www.domain.com" value="{{$user->business->website ??''}}" />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Business Description') }}" />
                                    <x-form.textarea name="business_description" type="email" placeholder="Tell us about your business" value="{{$user->business->description ??''}}"/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-round">Update</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><strong>Business</strong> Logo</h5>

                </div>
                <div class="card-body">

                    <div class="row clearfix">
                        <div class="col-sm-12">
                            {{-- <form action="{{route('agent.logo.upload', $user->id)}}" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                @csrf

                            </form>
                            <button type="button" class="btn btn-primary btn-round" id="submit-all">Upload Logo</button>--}}
                            <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('agent.logo.upload', $user->id) }}" >
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="image" placeholder="Choose image" id="image">
                                              @error('image')
                                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <img id="preview-image-before-upload" src="/{{ $user->business->path ?? 'assets/images/no-image.png'}}"
                                            alt="preview image" width="150">
                                    </div>
                                    <input type="hidden" name="old_image" value="{{$user->business->path ?? ''}}">
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary" id="submit">Upload Logo</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-sbadmin.app>
