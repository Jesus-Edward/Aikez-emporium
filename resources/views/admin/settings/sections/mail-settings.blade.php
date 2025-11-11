<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Mail Settings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Mail Settings
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
                            <form action="{{ route('admin.mail-settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mail Mailer</label>
                                            <input type="text" name="mail_mailer"
                                                value="{{ config('settings.mail_mailer') }}" class="form-control">
                                        </div>
                                        @error('mail_mailer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Resend API Key</label>
                                            <input type="text" name="resend_api_key"
                                                value="{{ config('settings.resend_api_key') }}" class="form-control">
                                        </div>
                                        @error('resend_api_key')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mail Host</label>
                                            <input type="text" name="mail_host"
                                                value="{{ config('settings.mail_host') }}" class="form-control">
                                        </div>
                                        @error('mail_host')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> --}}
                                    {{-- <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mail Port</label>
                                            <input type="text" name="mail_port"
                                                value="{{ config('settings.mail_port') }}" class="form-control">
                                        </div>
                                        @error('mail_port')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> --}}
                                    {{-- <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mail Encryption</label>
                                            <input type="text" name="mail_encryption"
                                                value="{{ config('settings.mail_encryption') }}" class="form-control">
                                        </div>
                                        @error('mail_encryption')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> --}}
                                    {{-- <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mail Username</label>
                                            <input type="text" name="mail_username"
                                                value="{{ config('settings.mail_username') }}" class="form-control">
                                        </div>
                                        @error('mail_username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> --}}
                                    {{-- <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mail Password</label>
                                            <input type="text" name="mail_password"
                                                value="{{ config('settings.mail_password') }}" class="form-control">
                                        </div>
                                        @error('mail_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> --}}

                                    <div class="col-md-4 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mail From Address</label>
                                            <input type="text" name="mail_from_address"
                                                value="{{ config('settings.mail_from_address') }}"
                                                class="form-control">
                                        </div>
                                        @error('mail_from_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">Mail Received Address</label>
                                            <input type="text" name="received_mail_address"
                                                value="{{ config('settings.received_mail_address') }}"
                                                class="form-control">
                                        </div>
                                        @error('received_mail_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> --}}
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
