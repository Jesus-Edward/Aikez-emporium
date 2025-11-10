@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="col">
            <h6 class="mb-0 text-uppercase">General Settings</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-warning" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#basic-settings" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Basic Settings</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#mail-settings" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-envelope font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Mail Settings</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#logo-settings" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-images font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Logo Settings</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#warning-mail" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">SEO Settings</div>
                                </div>
                            </a>
                        </li>
                        {{-- <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#pusher-setting" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Pusher Settings</div>
                                </div>
                            </a>
                        </li> --}}
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade show active" id="basic-settings" role="tabpanel">
                            @include('admin.settings.sections.basic-settings')
                        </div>
                        <div class="tab-pane fade" id="mail-settings" role="tabpanel">
                            @include('admin.settings.sections.mail-settings')
                        </div>
                        <div class="tab-pane fade" id="logo-settings" role="tabpanel">
                            @include('admin.settings.sections.logo-settings')
                        </div>
                        <div class="tab-pane fade" id="warning-mail" role="tabpanel">
                            @include('admin.settings.sections.seo-settings')
                        </div>
                        {{-- <div class="tab-pane fade" id="pusher-setting" role="tabpanel">
                            @include('admin.settings.sections.pusher-settings')
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
