<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Manage SEO Settings</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create SEO Settings
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.seo-settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label for="">SEO Title</label>
                                        <input name="seo_title" value="{{ config('settings.seo_title') }}"
                                            type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">SEO Description</label>
                                        <textarea name="seo_description" type="text" class="form-control">{{ config('settings.seo_description') }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">SEO Keyword</label>
                                        <input name="seo_keywords" value="{{ config('settings.seo_keywords') }}"
                                            type="text" class="form-control inputtags">
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
