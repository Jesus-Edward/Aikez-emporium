@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <h6 class="mb-0 text-uppercase">Social Links Section</h6>
                <hr />
                <div class="card">
                    <div class="card-header-wrapper">

                        <div class="card-header-action" style="">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                        <div class="card-header-action">
                            <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary">
                                Create Link
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table(['class' => 'table table-striped w-100']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
