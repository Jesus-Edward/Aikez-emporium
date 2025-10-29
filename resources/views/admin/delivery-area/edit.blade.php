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
                        <li class="breadcrumb-item active" aria-current="page">Update Delivery Area</li>
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
                        <h6 class="mb-0 text-uppercase">Update Area</h6>
                    </div>
                    <hr />

                    <div class="card-body">
                        <form action="{{ route('admin.delivery-area.update', $area->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-2">
                                <label>Area Name</label>
                                <input type="text" name="area_name" value="{{ $area->area_name }}" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label>Min Delivery Time</label>
                                        <input type="text" name="min_delivery_time"
                                            value="{{ $area->min_delivery_time }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label>Max Delivery Time</label>
                                        <input type="text" name="max_delivery_time"
                                            value="{{ $area->max_delivery_time }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label>Delivery Fee</label>
                                        <input type="text" name="delivery_fee" value="{{ $area->delivery_fee }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control" id="">
                                            <option @selected($area->status === 1) value="1">Active</option>
                                            <option @selected($area->status === 0) value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="btn btn-primary">Update Area</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
