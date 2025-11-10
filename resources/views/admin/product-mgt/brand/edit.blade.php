@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Brand Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Brand</li>
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
                        <h6 class="mb-0 text-uppercase">Update Brand</h6>
                    </div>
                    <hr />

                    <div class="card-body">
                        <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $brand->name }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Category</label>
                                        <div class="selectric-wrapper selectric-form-control">
                                            <select name="category" id="" class="form-control selectric">
                                                <option value="">-- Select Category --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @selected($brand->category_id === $category->id)>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Status</label>
                                        <div class="selectric-wrapper selectric-form-control">
                                            <select name="status" id="" class="form-control selectric">
                                                <option value="1" @selected($brand->status === 1)>Active</option>
                                                <option value="0" @selected($brand->status === 0)>Inactive</option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
