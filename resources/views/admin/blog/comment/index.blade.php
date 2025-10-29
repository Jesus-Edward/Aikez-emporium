@extends('admin.layouts.master')
@section('admin')
    <style>
        .large-checkbox {
            transform: scale(1.5);
        }
    </style>
    <!--start page wrapper -->
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center my-3">
            <div class="breadcrumb-title pe-3">Comment Management</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Comments</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="commentTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>User</th>
                                <th>Blog Title</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $index => $comment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ @$comment->user->name }}</td>
                                    <td>{{ \Str::limit(@$comment->blog->title, 50) }}</td>
                                    <td>{{ \Str::limit(@$comment->message, 50) }}</td>
                                    <td>
                                        @if (@$comment->status == 1)
                                            <span class="badge bg-primary toggling" id="toggled_status"
                                                style="margin-right: 2px">Published</span>
                                        @else
                                            <span class="badge bg-danger" style="margin-right: 2px">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-check-danger form-check form-switch">
                                            <input class="form-check-input large-checkbox toggle-status"
                                                value="{{ $comment->status }}" type="checkbox"
                                                data-comment-id={{ $comment->id }}
                                                {{ $comment->status == 1 ? 'checked' : '' }}
                                                id="flexSwitchCheckCheckedDanger">
                                            <label class="form-check-label" for="flexSwitchCheckCheckedDanger"></label>
                                            {{-- </div> --}}

                                            <a href="{{ route('admin.blog.comment.delete', $comment->id) }}"
                                                class="btn btn-danger delete-item"><i class='bx bxs-trash'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- </div>
    </div> --}}
        <!--end page wrapper -->
    @endsection

    @push('script')
        <script>
            $(document).ready(function() {
                $(".toggle-status").on('change', function() {
                    var commentId = $(this).data('comment-id');
                    var isChecked = $(this).is(":checked");
                    var activeStatus = $("#toggled_status")

                    $.ajax({
                        method: 'POST',
                        url: "{{ route('admin.comment.status.toggle') }}",
                        data: {
                            comment_id: commentId,
                            is_checked: isChecked ? 1 : 0,
                            // _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            toastr.success(res.message);
                            
                        },
                        error: function(error) {
                            console.log(error);

                        }
                    });
                });
            })
        </script>
    @endpush
