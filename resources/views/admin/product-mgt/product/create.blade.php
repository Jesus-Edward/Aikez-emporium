@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Product</li>
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
                        <h6 class="mb-0 text-uppercase">Create Product</h6>
                    </div>
                    <hr />

                    <div class="card-body">
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Texture</label>
                                        <input type="text" class="form-control" name="texture"
                                            value="{{ old('texture') }}">
                                        @error('texture')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price') }}">
                                        @error('price')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Color Family</label>
                                        <input type="text" class="form-control" name="color_family"
                                            value="{{ old('color_family') }}">
                                        @error('color_family')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Size</label>
                                        <div class="selectric-wrapper selectric-form-control">
                                            <select name="size" id="" class="form-control selectric">
                                                <option value="">-- Select Size --</option>
                                                @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('size')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" name="quantity"
                                            value="{{ old('quantity') }}">
                                        @error('quantity')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Brand</label>
                                        <div class="selectric-wrapper selectric-form-control">
                                            <select name="brand" id="" class="form-control selectric">
                                                <option value="">-- Select Brand --</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('brand')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Short Description</label>
                                        <textarea type="text" class="form-control" name="short_description">
                                            {{ old('short_description') }}
                                        </textarea>
                                        @error('short_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Long Description</label>
                                        <textarea type="text" class="form-control summernote" name="long_description">
                                            {{ old('long_description') }}
                                        </textarea>
                                        @error('long_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">SEO Title</label>
                                        <input type="text" class="form-control" name="seo_title"
                                            value="{{ old('seo_title') }}">
                                        @error('seo_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

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

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">SEO Description</label>
                                        <textarea type="text" class="form-control" name="seo_description">
                                            {{ old('seo_description') }}
                                        </textarea>
                                        @error('seo_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            multiple>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <img src="" id="showImage" class="" width="80">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Image 2</label>
                                        <input type="file" class="form-control" name="image2" id="image2"
                                            multiple>
                                        @error('image2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <img src="" id="showImage2" class="" width="80">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Image 3</label>
                                        <input type="file" class="form-control" name="image3" id="image3">
                                        @error('image3')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <img src="" id="showImage3" class="" width="80">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Image 4</label>
                                        <input type="file" class="form-control" name="image4" id="image4">
                                        @error('image4')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <img src="" id="showImage4" class="" width="80">
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
            $("#image2").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showImage2").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files[0])
            });
            $("#image3").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showImage3").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files[0])
            });
            $("#image4").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#showImage4").attr("src", e.target.result);
                }
                reader.readAsDataURL(e.target.files[0])
            });
        });
    </script>
@endpush
