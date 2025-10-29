<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Pusher Settings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Pusher Settings
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.pusher-settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Pusher App ID</label>
                                            <input name="pusher_app_id" value="{{ config('settings.pusher_app_id') }}"
                                                type="text" class="form-control">
                                        </div>
                                        @error('pusher_app_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Pusher App Key</label>
                                            <input name="pusher_app_key" value="{{ config('settings.pusher_app_key') }}"
                                                type="text" class="form-control">
                                        </div>
                                        @error('pusher_app_key')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Pusher App Secret Key</label>
                                            <input name="pusher_app_secret_key"
                                                value="{{ config('settings.pusher_app_secret_key') }}" type="text"
                                                class="form-control">
                                        </div>
                                        @error('pusher_app_secret_key')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Pusher Cluster</label>
                                            <input name="pusher_cluster" value="{{ config('settings.pusher_cluster') }}"
                                                type="text" class="form-control">
                                        </div>
                                        @error('pusher_cluster')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div style="display: flex; justify-content:flex-end; margin-top:8px">
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
