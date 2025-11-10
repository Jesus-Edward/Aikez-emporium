<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">

    <div class="fp_dashboard_body address_body">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="" id="">Address</h3>
            <a class="dash_add_new_address" style="width: 100px"><i class="fas fa-plus"></i></a>
        </div>

        <style>
            .fp_dashboard_address li::marker {
                content: '' !important
            }
        </style>

        <div class="fp_dashboard_address">
            <div class="fp_dashboard_existing_address">
                <div class="row">
                    @foreach ($userAddresses as $userAddress)
                        <div class="col-md-6">
                            <div class="fp__checkout_single_address">
                                <div class="form-check">
                                    <label class="form-check-label">

                                        <span class="address profile_para">{{ @$userAddress->address }},
                                            {{ @$userAddress->deliveryArea?->area_name }}</span>

                                    </label>
                                </div>
                                <ul>
                                    <li><a class="dash_edit_btn show_edit_section"
                                            data-class="edit_section_{{ @$userAddress->id }}"><i
                                                class="far fa-edit"></i></a></li>
                                    <li><a href="{{ route('profile.address.delete', @$userAddress->id) }}"
                                            class="dash_del_icon delete-item"><i class="fas fa-trash-alt"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="fp_dashboard_new_address ">
                <form action="{{ route('profile.address.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h4>Add New Address</h4>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <select class="form-control select2" name="area">
                                    <option value="">Select Area</option>
                                    @foreach ($deliveryAreas as $deliveryArea)
                                        <option value="{{ @$deliveryArea->id }}">{{ @$deliveryArea->area_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                                    placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                                    placeholder="Last Name">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="fp__check_single_form">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="fp__check_single_form">
                                <textarea cols="3" rows="4" name="address" class="form-control" placeholder="Address">{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <div class="col-12 addresses">
                            <button type="button" class="address-btn cancel_new_address">cancel</button>
                            <button type="submit" class="address-btn">save address</button>
                        </div>
                    </div>
                </form>
            </div>
            @foreach ($userAddresses as $userAddress)
                <div class="fp_dashboard_edit_address edit_section_{{ $userAddress->id }}">
                    <form action="{{ route('profile.address.edit', $userAddress->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h4 class="profile_para">Edit Address</h4>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="fp__check_single_form">
                                    <select class="form-control select2" name="area">
                                        <option value="">Select Area</option>
                                        @foreach ($deliveryAreas as $deliveryArea)
                                            <option @selected($userAddress->delivery_area_id === $deliveryArea->id) value="{{ $deliveryArea->id }}">
                                                {{ $deliveryArea->area_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" class="form-control" name="first_name" value="{{ @$userAddress->first_name }}"
                                        placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" class="form-control" name="last_name" value="{{ @$userAddress->last_name }}"
                                        placeholder="Last Name">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" name="phone" class="form-control" value="{{ @$userAddress->phone }}"
                                        placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12 col-xl-6">
                                <div class="fp__check_single_form">
                                    <input type="text" class="form-control" name="email" value="{{ $userAddress->email }}"
                                        placeholder="Email">
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="fp__check_single_form">
                                    <textarea cols="3" class="form-control" rows="4" name="address" placeholder="Address">{!! @$userAddress->address !!}</textarea>
                                </div>
                            </div>

                            <div class="col-12 addresses">
                                <button type="button" class="address-btn cancel_edit_address">cancel</button>
                                <button type="submit" class="address-btn">update address</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>

    {{-- </div> --}}
</div>
</div>
@push('frontend')
    <script>
        $(document).ready(function() {
            $(".show_edit_section").on('click', function() {
                let className = $(this).data('class');
                $('.fp_dashboard_edit_address').removeClass('d-block');
                $('.fp_dashboard_edit_address').removeClass('d-none');
                $('.fp_dashboard_existing_address').addClass('d-none');
                $('.' + className).addClass('d-block');
                $('.dash_add_new_address').on('click', function() {
                    $('.' + className).addClass('d-none');
                });

            });

            $('.cancel_edit_address').on('click', function() {
                $('.fp_dashboard_edit_address').addClass('d-none');
                $('.fp_dashboard_existing_address').removeClass('d-none');
            })
        })
    </script>
@endpush
