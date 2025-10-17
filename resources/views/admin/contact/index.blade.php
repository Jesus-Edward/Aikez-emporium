@extends('admin.layouts.master');
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Contact Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Contact</li>
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
                        <h6 class="mb-0 text-uppercase">Create Contact Details</h6>
                    </div>
                    <hr />

                    <div class="card-body">
                        <form action="{{ route('admin.contact.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">First Title</label>
                                        <input type="text" class="form-control" name="up_title" value="{{ $contact->up_title }}">
                                        @error('up_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Second Title</label>
                                        <input type="text" class="form-control" name="down_title" value="{{ $contact->down_title }}">
                                        @error('down_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Short Text</label>
                                          <input type="text" class="form-control" name="short_text" value="{{ $contact->short_text }}">
                                        @error('short_text')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Map Link</label>
                                          <textarea type="text" class="form-control" name="map_link">{{ $contact->map_link }}</textarea>
                                        @error('map_link')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">First Phone</label>
                                          <input type="text" class="form-control" name="first_phone" value="{{ $contact->first_phone }}">
                                        @error('first_phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Second Phone</label>
                                          <input type="text" class="form-control" name="second_phone" value="{{ $contact->second_phone }}">
                                        @error('second_phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">First Email</label>
                                          <input type="text" class="form-control" name="first_email" value="{{ $contact->first_mail }}">
                                        @error('first_email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Second Email</label>
                                          <input type="text" class="form-control" name="second_email" value="{{ $contact->second_mail }}">
                                        @error('second_email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">First Address</label>
                                          <input type="text" class="form-control" name="first_address" value="{{ $contact->first_address }}">
                                        @error('first_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Second Address</label>
                                          <input type="text" class="form-control" name="second_address" value="{{ $contact->second_address }}">
                                        @error('second_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">First Image</label>
                                        <input type="file" class="form-control" name="image" id="image" value="{{ $contact->up_image }}">
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <img src="{{ $contact->up_image }}" id="showImage" class="" width="80">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="" class="form-label">Second Image</label>
                                        <input type="file" class="form-control" name="image2" id="image2" value="{{ $contact->down_image }}">
                                        @error('image2')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <img src="{{ $contact->down_image }}" id="showImage2" class="" width="80">
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
        });
    </script>
@endpush
