<div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
    <div class="fp_dash_personal_info">
        <h4>Change your password</h4>

        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="row my-4">
                <div class="col-lg-6 mb-2">
                    <div class="form-group">
                        <h6>Current Password</h6>
                        <input type="password" name="current_password" id=""
                            class="form-control">
                        @error('current_password')
                            <small class="tex-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 mb-2">
                    <div class="form-group">
                        <h6>New Password</h6>
                        <input class="form-control" type="password" name="password">
                        @error('password')
                            <small class="tex-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <h6>Confirm Password</h6>
                        <input class="form-control" type="password" name="password_confirmation">
                        @error('password_confirmation')
                            <small class="tex-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xl-12 mt-2">
                    <button type="submit" class="default-btn btn-bg-two py-1 px-3" style="border-radius: 50px;border: none;">Change</button>
                </div>
            </div>
        </form>
    </div>

</div>
