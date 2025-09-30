<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage Logo Settings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Logo Settings
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <style>
        .custom-height {
            height: 200px !important;
        }
    </style>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.logo-settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Logo</label>
                                            <div id="image-preview1" class="image-preview logo">
                                                <label for="image-upload" id="image-label1">Choose File</label>
                                                <input type="file" class="custom-height" name="logo" id="image-upload1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Favicon Logo</label>
                                            <div id="image-preview2" class="image-preview favicon_logo">
                                                <label for="image-upload" id="image-label2">Choose File</label>
                                                <input type="file" class="custom-height" name="favicon_logo" id="image-upload2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Breadcrumb Logo</label>
                                            <div id="image-preview3" class="image-preview breadcrumb_logo">
                                                <label for="image-upload" id="image-label3">Choose File</label>
                                                <input type="file" class="custom-height" name="breadcrumb_logo" id="image-upload3">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Footer Logo</label>
                                            <div id="image-preview4" class="image-preview footer_logo">
                                                <label for="image-upload" id="image-label4">Choose File</label>
                                                <input type="file" class="custom-height" name="footer_logo" id="image-upload4">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div style="display: flex; justify-content:flex-end">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>

        $(document).ready(function() {
            $('.logo').css({
                'background-image': 'url({{ asset(config("settings.logo")) }})',
                'background-size': 'cover',
                'background-position': 'centre centre'
            })
        });

        $.uploadPreview({
            input_field: "#image-upload1", // Default: .image-upload
            preview_box: "#image-preview1", // Default: .image-preview
            label_field: "#image-label1", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {
            $('.favicon_logo').css({
                'background-image': 'url({{ asset(config("settings.favicon_logo")) }})',
                'background-size': 'cover',
                'background-position': 'centre centre'
            })
        });

        $.uploadPreview({
            input_field: "#image-upload2", // Default: .image-upload
            preview_box: "#image-preview2", // Default: .image-preview
            label_field: "#image-label2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {
            $('.breadcrumb_logo').css({
                'background-image': 'url({{ asset(config("settings.breadcrumb_logo")) }})',
                'background-size': 'cover',
                'background-position': 'centre centre'
            })
        });

        $.uploadPreview({
            input_field: "#image-upload3", // Default: .image-upload
            preview_box: "#image-preview3", // Default: .image-preview
            label_field: "#image-label3", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
        $(document).ready(function() {
            $('.footer_logo').css({
                'background-image': 'url({{ asset(config("settings.footer_logo")) }})',
                'background-size': 'cover',
                'background-position': 'centre centre'
            })
        });

        $.uploadPreview({
            input_field: "#image-upload4", // Default: .image-upload
            preview_box: "#image-preview4", // Default: .image-preview
            label_field: "#image-label4", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
