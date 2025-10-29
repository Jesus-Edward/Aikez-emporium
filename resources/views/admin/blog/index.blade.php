@extends('admin.layouts.master')
@section('admin')
    <!--start page wrapper -->
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center my-3">
            <div class="breadcrumb-title pe-3">Blog Management</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Posts</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.blog.post.create') }}" class="btn btn-primary">Add Blog</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="card-header-action" style="margin-bottom: 15px; margin-left: auto;">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>User</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Short Post</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $index => $blog)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><img class="rounded-pill" src="{{ asset(@$blog->image) }}" alt="" width="80" height="80"></td>
                                    <td>{{ @$blog->category->category }}</td>
                                    <td>{{ @$blog->user->name }}</td>
                                    <td>{{ \Str::limit(@$blog->title, 50) }}</td>
                                    <td>{{ \Str::limit(@$blog->slug, 50) }}</td>
                                    <td>{{ \Str::limit(@$blog->short_post, 50)}}</td>
                                    <td>
                                        @if (@$blog->status == 1)
                                            <span class="badge bg-primary">Active</span>
                                        @else
                                            <span class="badge bg-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.blog.post.edit', $blog->id) }}" class="btn btn-warning px-3 radius-30"><i
                                                class='bx bx-edit'></i>Edit</a>

                                        <a href="{{ route('admin.blog.post.delete', $blog->id) }}" class="btn btn-danger px-3 radius-30 delete-item"><i
                                                class='bx bxs-trash'></i>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--end page wrapper -->
    @endsection

