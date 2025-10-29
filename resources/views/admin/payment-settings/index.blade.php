@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="col">
            <h6 class="mb-0 text-uppercase">Payment Settings</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-warning" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#basic-settings" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-credit-card font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Payment Settings</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade show active" id="basic-settings" role="tabpanel">
                            @include('admin.payment-settings.sections.paystack')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
