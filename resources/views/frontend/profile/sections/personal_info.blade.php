<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="service-article">
        <div class="service-article-title">
            <h2>{{ auth()->user()->name }} Dashboard </h2>
        </div>

        <div class="service-article-content">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white bg-primary mb-3 mx-auto" style="max-width: 18rem;">
                        <div class="card-header">Total Orders</div>
                        <div class="card-body">
                            <h3 class="card-title" style="font-size: 25px;">{{ $orders->count() }} Total Orders</h3>

                        </div>
                    </div>
                </div>

                @php
                    $completedOrders = App\Models\Order::where(['user_id' => Auth::user()->id, 'order_status' => 'delivered']);
                    $cancelledOrders = App\Models\Order::where(['user_id' => Auth::user()->id, 'order_status' => 'declined']);
                    // @dd($cancelledOrders->count());
                @endphp

                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3 mx-auto" style="max-width: 18rem;">
                        <div class="card-header">Delivered </div>
                        <div class="card-body">
                            <h1 class="card-title" style="font-size: 25px;">{{ $completedOrders->count() }} Delivered</h1>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3 mx-auto" style="max-width: 18rem;">
                        <div class="card-header">Cancelled</div>
                        <div class="card-body">
                            <h1 class="card-title" style="font-size: 25px;">{{ $cancelledOrders->count() }} Cancelled</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fp_dash_personal_info">
            <h4 class="profile_para">Personal Information
                <a class="dash_info_btn">
                    <span class="edit">edit</span>
                    <span class="cancel">cancel</span>
                </a>
            </h4>

            <div class="personal_info_text">
                <h6 class="profile_para"><span>Name:</span> {{ auth()->user()->name }}</h6>
                <h6 class="profile_para"><span>Email:</span> {{ auth()->user()->email }}<h6>
                        <h6 class="profile_para"><span>Phone:</span> {{ auth()->user()->phone ?? 'N/A' }}</h6>
                        <h6 class="profile_para"><span>Address:</span> {{ auth()->user()->address ?? 'N/A' }}</h6>
            </div>

            <div class="fp_dash_personal_info_edit comment_input p-0">
                <form action="{{ route('profile.update') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label profile_para">name</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}"
                                     name="name">
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label profile_para">email</label>
                                <input type="email" class="form-control" value="{{ auth()->user()->email }}"
                                     name="email">
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label profile_para">Phone</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->phone }}"
                                    name="phone">
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label profile_para">Address</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->address }}"
                                     name="address">
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label profile_para">Country</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->country }}"
                                     name="country">
                            </div>

                        </div>
                        {{-- <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="" class="form-label">Status</label>
                                <div class="selectric-wrapper selectric-form-control">
                                        <select name="status" id="" class="form-control selectric">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div> --}}

                        <div class="col-xl-12 mt-3">
                            <button type="submit" class="default-btn btn-bg-two py-1 px-3"
                                style="border-radius: 50px;border: none;">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
