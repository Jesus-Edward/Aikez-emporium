<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Paystack Settings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Paystack Settings
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
                            <form action="{{ route('admin.paystack-settings.index') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">Payment Name</label>
                                            <input name="payment_name"
                                                value="{{ @$paymentGateway['payment_name'] }}" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3 mb-3">
                                        <div class="form-group">
                                            <label for="">PayStack Status</label>
                                            <select name="paystack_status" id="" class="select2 form-control">
                                                <option @selected(@$paymentGateway['paystack_status'] == 1) value="1">Active</option>
                                                <option @selected(@$paymentGateway['paystack_status'] == 0) value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">PayStack Payment URL</label>
                                            <input type="text" class="form-control" name="payment_url" value="{{ @$paymentGateway['payment_url'] }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">PayStack Client ID</label>
                                            <input name="paystack_client_id"
                                                value="{{ @$paymentGateway['paystack_client_id'] }}" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">PayStack Secret Key</label>
                                            <input name="paystack_secret_key"
                                                value="{{ @$paymentGateway['paystack_secret_key'] }}" type="text"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="" class="form-label">PayStack Logo</label>
                                            <input type="file" class="form-control" name="paystack_logo" id="image">
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mt-2">
                                            <img src="{{ asset(@$paymentGateway['paystack_logo']) }}" id="showImage" class=""
                                                width="80">
                                        </div>
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
@push('script')
    <script>
        $(document).ready(function() {
            $("#image").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showImage").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files[0])
            });
        });
    </script>
@endpush

