@extends('admin.layouts.master');
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Terms & Conditions Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create T&C</li>
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
                        <h6 class="mb-0 text-uppercase">Create T&C</h6>
                    </div>
                    <hr />

                    <div class="card-body">
                        <form action="{{ route('admin.t&c.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" value="{{ @$t_and_c->company_name }}">
                                        @error('company_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ @$t_and_c->title }}">
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="image" value="">
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <img src="{{ @$t_and_c->image }}" id="showImage" class="" width="80">
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Terms & Conditions</label>
                                          <textarea type="text" class="form-control summernote" name="terms_and_conditions" >{!! @$t_and_c->terms_and_conditions !!}</textarea>
                                        @error('terms_and_conditions')
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
@push('script')
    <script>
        $(document).ready(function() {
            $("#image").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showImage").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files[0])
            });
        });
    </script>
@endpush
