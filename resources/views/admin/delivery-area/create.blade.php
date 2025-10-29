@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Delivery Area</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Delivery Area</li>
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
                        <h6 class="mb-0 text-uppercase">Create Area</h6>
                    </div>
                    <hr />

                    <div class="card-body">
                <form action="{{ route('admin.delivery-area.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2">
                        <label>Area Name</label>
                        <input type="text" name="area_name" value="{{ old('area_name') }}" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label>Min Delivery Time</label>
                                <input type="text" name="min_delivery_time" value="{{ old('min_delivery_time') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label>Max Delivery Time</label>
                                <input type="text" name="max_delivery_time" value="{{ old('max_delivery_time') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label>Delivery Fee</label>
                                <input type="text" name="delivery_fee" value="{{ old('delivery_fee') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Create Area</button>
                    </div>
                </form>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection

