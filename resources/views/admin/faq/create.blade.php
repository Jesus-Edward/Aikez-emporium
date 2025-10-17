@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Manage FAQ</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create FAQ
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header-wrapper">
                        <div class="card-header-action" style="">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>

                    <div class="card-custom-header">
                        <h6 class="mb-0 text-uppercase">Create FAQ</h6>
                    </div>
                    <hr />
                    <div class="card-body">
                        <form action="{{ route('admin.faq.store') }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-6 mb-2">
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
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Question</label>
                                <div class="" text-secondary">
                                    <textarea type="text" name="question" class="form-control">{{ old('question') }}</textarea>
                                    @error('question')
                                        <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="text-secondary">
                                    <button type="submit" class="btn btn-primary px-4" value="">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
