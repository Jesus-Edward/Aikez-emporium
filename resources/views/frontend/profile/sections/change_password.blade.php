<div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
    <div class="fp_dash_personal_info">
        <h4 class="profile_para">Change your password</h4>

        <style>
            .profile_para {
                color: var(--colorBlack) !important;
            }
        </style>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row my-4">
                <div class="col-lg-6 mb-2">
                    <div class="form-group">
                        <h6 class="profile_para">Current Password</h6>
                        <input type="password" name="current_password" id=""
                            class="form-control">
                        @error('current_password')
                            <small class="tex-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6 mb-2">
                    <div class="form-group">
                        <h6 class="profile_para">New Password</h6>
                        <input class="form-control" type="password" name="password">
                        @error('password')
                            <small class="tex-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <h6 class="profile_para">Confirm Password</h6>
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
