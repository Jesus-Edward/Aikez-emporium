@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Service Section</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create Service</li>
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
                        <h6 class="mb-0 text-uppercase">Create Service</h6>
                    </div>
                    <hr />

                    <div class="card-body">
                        <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Service Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Button Link</label>
                                        <input type="text" class="form-control" name="button_link" value="{{ old('button_link') }}">
                                        @error('button_link')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Service Description</label>
                                        <textarea type="text" class="form-control" name="description">
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Service Icon</label>
                                        <input type="text" class="form-control" name="icon" value="{{ old('icon') }}" id="">
                                        @error('icon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Service Status</label>
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
                                </div>
                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
