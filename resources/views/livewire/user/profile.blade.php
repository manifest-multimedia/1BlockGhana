<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Personal</strong> Information</h2>
                </div>
                <form wire:submit.prevent="store" method="post" enctype="multipart/form-data">
                    <div class="body">
                        <div class="row clearfix mb-3">
                            <div class="col-sm-6">
                                <x-form.label value="{{ __('First Name') }}" />
                                <x-form.input wire:model.defer="firstname" name="firstname" placeholder="Firstname" />
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Last Name') }}" />
                                    <x-form.input wire:model.defer='"lastname' name="lastname" placeholder="Lastname" />
                                </div>
                            </div>

                        </div>

                        {{-- <div class="row clearfix mb-3">
                         <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Phone Number') }}" />
                                    <x-form.input wire:model.defer="mobile" name="mobile" type="tel" placeholder="Phone Number" />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                <x-form.label value="{{ __('Physical Address') }}" />
                                    <x-form.input wire:model.defer="address" name="address" type="text" placeholder="Physical Address" />
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix mb-3">
                            <div class="col-sm-6">
                                <x-form.label value="{{ __('Gender') }}" />
                                <x-form.input wire:model.defer="gender" name="gender" placeholder="Gender" />
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <x-form.label value="{{ __('Email Address') }}" />
                                    <x-form.input wire:model.defer="email" name="email" type="email" placeholder="Email Address" />
                                </div>
                            </div>
                        </div> --}}
                        <div class="row clearfix">

                            <div class="col-sm-12">

                                <button type="submit" class="btn btn-primary btn-round">Submit</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Business</strong> Information</h2>
                   {{--  <ul class="header-dropdown">
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
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-form.label value="{{ __('Business Name') }}" />
                                <x-form.input name="business" placeholder="Business name" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-form.label value="{{ __('Business Type') }}" />
                                <x-form.input name="business_type" placeholder="Business Type" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-form.label value="{{ __('Business Phone Number') }}" />
                                <x-form.input name="business_phone" placeholder="Business Phone Number" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <x-form.label value="{{ __('Business Email') }}" />
                                <x-form.input name="business_email" type="email" placeholder="Business Email" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-round">Submit</button>
                            <button type="submit" class="btn btn-default btn-round btn-simple">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Business</strong> Logo</h2>
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
                <div class="body">
                    {{-- <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Facebook">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Twitter">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Google">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Linkdin">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-round">Submit</button>
                            <button type="submit" class="btn btn-default btn-round btn-simple">Cancel</button>
                        </div>
                    </div>  --}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                <div class="dz-message">
                                    <div class="drag-icon-cph"> <i class="material-icons py-5"></i> </div>
                                    </div>
                                <div class="fallback">
                                    <input type="hidden" name="file" type="file" multiple />
                                </div>
                            </form>
                            <button type="submit" class="btn btn-primary btn-round">Upload Logo</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
