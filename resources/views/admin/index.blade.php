@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Today Orders</p>
                                <h4 class="my-1 text-info">{{ $todayOrder }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bxs-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Today Earning</p>
                                <h4 class="my-1 text-info">{{ config('settings.site_currency_symbol') }}{{ $todayEarning }}
                                </h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bx-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Monthly Orders</p>
                                <h4 class="my-1 text-info">{{ $monthlyOrder }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bxs-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Monthly Earning</p>
                                <h4 class="my-1 text-info">
                                    {{ config('settings.site_currency_symbol') }}{{ $monthlyEarning }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bx-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-secondary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Yearly Orders</p>
                                <h4 class="my-1 text-info">{{ $yearlyOrder }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bxs-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Yearly Earning</p>
                                <h4 class="my-1 text-info">{{ config('settings.site_currency_symbol') }}{{ $yearlyEarning }}
                                </h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bx-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Orders</p>
                                <h4 class="my-1 text-info">{{ $totalOrders }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bxs-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Earnings</p>
                                <h4 class="my-1 text-info">
                                    {{ config('settings.site_currency_symbol') }}{{ $totalEarnings }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bx-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-secondary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Products</p>
                                <h4 class="my-1 text-info">{{ $totalProducts }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bx-package"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Blogs</p>
                                <h4 class="my-1 text-info">{{ $totalBlogs }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bx-notepad"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Customers</p>
                                <h4 class="my-1 text-info">{{ $totalUsers }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bxs-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-secondary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Admins</p>
                                <h4 class="my-1 text-info">{{ $totalAdmins }}</h4>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class="bx bx-shield-quarter"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Today's Orders</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="order_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="address_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Order Status</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span style="font-size: 32px" aria-hidden="true">&times;</span>
                    </span>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="order_status_form">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Payment Status</label>
                            <select class="form-control payment_status" name="payment_status" id=""
                                value="payment_status">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="failed">Failed</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="">Order Status</label>
                            <select class="form-control order_status" name="order_status" id=""
                                value="order_status">
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="delivered">Delivered</option>
                                <option value="declined">Declined</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submit_btn">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            var orderId = '';
            $(document).on("click", ".ordering_status", function() {
                let id = $(this).data('id');
                orderId = id;
                let paymentStatus = $(".payment_status option");
                let orderStatus = $(".order_status option");

                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.orders.status.get', ':id') }}'.replace(":id", id),
                    beforeSend: function() {
                        $(".submit_btn").prop("disable", true);
                    },
                    success: function(response) {
                        paymentStatus.each(function() {
                            if ($(this).val() == response.payment_status) {
                                $(this).attr('selected', 'selected');
                            }
                        });

                        orderStatus.each(function() {
                            if ($(this).val() == response.order_status) {
                                $(this).attr('selected', 'selected');
                            }
                        });

                        $(".submit_btn").prop("disable", false);
                    },
                    error: function(xhr, status, error) {

                    },
                });

                $(".order_status_form").on("submit", function(e) {
                    e.preventDefault();
                    let formContents = $(this).serialize();
                    $.ajax({
                        method: 'POST',
                        url: '{{ route('admin.orders.status.update', ':orderId') }}'
                            .replace(":orderId", orderId),
                        data: formContents,
                        success: function(response) {
                            $("#order_modal").modal('hide');
                            $("#pending-table").DataTable().draw();
                            toastr.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            toastr.error(xhr.responseJSON.message);
                        },
                    })
                })
            })
        })
    </script>
@endpush
