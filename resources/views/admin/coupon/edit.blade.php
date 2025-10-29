@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Coupon Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Coupon</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr />
                <div class="card">
                    <div class="card-header-wrapper">
                        <div class="card-header-action" style="">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>

                    <div class="card-custom-header">
                        <h6 class="mb-0 text-uppercase">Create Coupon</h6>
                    </div>
                    <hr />

                    <div class="card-body">
                        <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $coupon->name }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Code</label>
                                        <input type="text" class="form-control" name="code"
                                            value="{{ $coupon->code }}">
                                        @error('code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="quantity"
                                            value="{{ $coupon->quantity }}">
                                        @error('quantity')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Min Purchase Amount</label>
                                        <input type="text" class="form-control" name="min_purchase_amount"
                                            value="{{ $coupon->min_purchase_amount }}">
                                        @error('min_purchase_amount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Discount</label>
                                        <input type="text" class="form-control" name="discount"
                                            value="{{ $coupon->discount }}">
                                        @error('discount')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" name="expired_date"
                                            value="{{ $coupon->expired_date }}">
                                        @error('expired_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Discount Type</label>
                                        <div class="selectric-wrapper selectric-form-control">
                                            <select name="discount_type" id="" class="form-control selectric">
                                                <option value="percent" @selected($coupon->discount_type === 'percent')>Percent</option>
                                                <option value="amount" @selected($coupon->discount_type === 'amount')>Amount</option>
                                            </select>
                                        </div>
                                        @error('discount_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Status</label>
                                        <div class="selectric-wrapper selectric-form-control">
                                            <select name="status" id="" class="form-control selectric">
                                                <option value="1" @selected($coupon->status === 1)>Active</option>
                                                <option value="0" @selected($coupon->status === 0)>Inactive</option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

