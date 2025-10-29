@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Manage Blogs</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update Blogs
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">

                <div class="row">
                    <div class="col-xl-12 mx-auto">

                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Update Blogs</h5>
                                <form class="row g-3" action="{{ route('admin.blog.post.update', $blog->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-6">
                                        <label for="input5" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="input5"
                                            value="{{ $blog->title }}" placeholder="Title">

                                        @error('title')
                                            <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input4" class="form-label">Category
                                        </label>
                                        <select name="category" id="" class="form-select">
                                            <option value="">Select a category...</option>
                                            @foreach ($categories as $cat)
                                                <option @selected($blog->category_id === $cat->id) value="{{ $cat->id }}">{{ $cat->category }}</option>
                                            @endforeach
                                        </select>

                                        @error('category')
                                            <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="input8" class="form-label">Short Post
                                        </label>
                                        <textarea type="text" rows="3" class="form-control" id="input8" name="short_post" placeholder="Short Post">{{ $blog->short_post }}</textarea>
                                        @error('short_post')
                                            <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="input8" class="form-label">Post
                                        </label>
                                        <textarea type="text" class="form-control summernote" id="input8" name="post" placeholder="Blog">{{ $blog->post }}</textarea>
                                        @error('post')
                                            <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label for="input7" class="form-label">Status</label>
                                        <select name="status" id="" class="form-select">
                                            <option @selected($blog->status === 1) value="1">Published</option>
                                            <option @selected($blog->status === 0) value="0">Pending</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label for="input7" class="form-label">
                                            Image</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            value="">
                                        @error('image')
                                            <span class="text-danger text-sm mt-1">{{ $message }}</span>
                                        @enderror

                                        <div class="mt-1">
                                            <img id="showImage" src="{{ asset($blog->image) }}" class="w-25 h-25" width=""
                                                height="">
                                        </div>
                                    </div>

                                    <div class="my-3" style="display: flex; justify-content:end">
                                        <button type="submit" class="btn btn-primary px-3">Save</button>
                                    </div>
                            </div>
                        </div>
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
