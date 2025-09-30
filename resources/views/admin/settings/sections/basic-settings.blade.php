<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Site Settings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Site Settings
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.basic-settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Site Name</label>
                                            <input type="text" name="site_name" value="{{ config('settings.site_name') }}" class="form-control">
                                        </div>
                                        @error('site_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Site Email</label>
                                            <input type="email" name="site_email" value="{{ config('settings.site_email') }}" class="form-control">
                                        </div>
                                        @error('site_email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Site Phone</label>
                                            <input type="text" name="site_phone" value="{{ config('settings.site_phone') }}" class="form-control">
                                        </div>
                                        @error('site_phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Site Default Currency</label>
                                            <input type="text" name="site_default_currency" value="{{ config('settings.site_default_currency') }}" class="form-control">
                                        </div>
                                        @error('site_default_currency')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Site Currency Symbol</label>
                                            <input type="text" name="site_currency_symbol" value="{{ config('settings.site_currency_symbol') }}" class="form-control">
                                        </div>
                                        @error('site_currency_symbol')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Site Currency Symbol Position</label>
                                            <div class="selectric-wrapper selectric-form-control">
                                                <select class="form-control selectric" name="site_currency_symbol_position">
                                                    <option value="">Select Currency Position</option>
                                                    <option value="right" @selected(config('settings.site_currency_symbol_position') === 'right')>Right</option>
                                                    <option value="left" @selected(config('settings.site_currency_symbol_position') === 'left')>Left</option>
                                                </select>
                                            </div>
                                        </div>
                                        @error('site_currency_symbol_position')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Site Selling Unit</label>
                                            <input type="text" name="site_selling_unit" value="{{ config('settings.site_selling_unit') }}" class="form-control">
                                        </div>
                                        @error('site_selling_unit')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div style="display: flex; justify-content:flex-end">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
