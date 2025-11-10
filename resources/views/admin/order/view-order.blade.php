@extends('admin.layouts.master')
@section('admin')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Order Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="section-body mb-5">

            <div class="invoice">
                <div class="card-header-wrapper">
                    <div class="card-header-action" style="margin-top:0; margin-left:0;margin-bottom:25px">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">
                            Back
                        </a>
                    </div>
                </div>

                <div class="card-custom-header">
                    <h6 class="mb-0 text-uppercase">Create Brand</h6>
                </div>
                <div class="invoice-print" id="printable">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2>
                                <div class="invoice-number">Order #{{ $order->invoice_id }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Shipped To:</strong><br>
                                        <strong>Name: </strong> {!! @$order->userAddress->name !!}<br>
                                        <strong>Phone: </strong> {{ @$order->userAddress->phone }}<br>
                                        <strong>Email: </strong> {{ @$order->userAddress->email }}<br>
                                        <strong>Address: </strong> {!! @$order->userAddress->address !!}<br>
                                        <strong>Area: </strong> {!! @$order->userAddress->deliveryArea->area_name !!}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ date('F d, Y / H:i', strtotime($order->created_at)) }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Payment Method:</strong><br>
                                        {{ $order->payment_method }}<br>
                                        <strong>Payment Status:</strong>

                                        @if (strtoupper($order->payment_status) == 'COMPLETED')
                                            <span class="badge badge-success">COMPLETED</span>
                                        @elseif (strtoupper($order->payment_status) == 'PENDING')
                                            <span class="badge badge-warning">PENDING</span>
                                        @else
                                            <span class="badge badge-danger">{{ strtoupper($order->payment_status) }}</span>
                                        @endif

                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Order Status:</strong><br>
                                        @if ($order->order_status === 'delivered')
                                            <span class="badge badge-success">Delivered</span>
                                        @elseif($order->order_status === 'declined')
                                            <span class="badge badge-danger">Declined</span>
                                        @else
                                            <span class="badge badge-warning">{{ $order->order_status }}</span>
                                        @endif
                                        <br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Order Summary</div>
                            <p class="section-lead">All items here cannot be deleted.</p>
                            <div class="table-responsive">
                                <table class="table table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Item</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Totals</th>
                                    </tr>
                                    @foreach ($order->orderItems as $orderItem)
                                        @php
                                            $qty = $orderItem->qty;
                                            $unit_price = $orderItem->unit_price;
                                            $productTotal = $unit_price * $qty;
                                        @endphp
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>{!! $orderItem->product_name !!}</td>

                                            <td class="text-center">{{ currencyPosition($orderItem->unit_price) }}</td>
                                            <td class="text-center">{{ $orderItem->qty }}</td>
                                            <td class="text-right">{{ currencyPosition($productTotal) }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="col-md-6  d-print-none">
                                        <form action="{{ route('admin.orders.status.update', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group mb-2">
                                                <label for="">Payment Status</label>
                                                <select class="form-control" name="payment_status" id="" value>
                                                    <option @selected($order->payment_status === 'pending') value="pending">Pending
                                                    </option>
                                                    <option @selected($order->payment_status === 'completed') value="completed">Completed
                                                    </option>
                                                    <option @selected($order->payment_status === 'failed') value="failed">Failed</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-2">
                                                <label for="">Order Status</label>
                                                <select class="form-control" name="order_status" id="" value>
                                                    <option @selected($order->order_status === 'pending') value="pending">Pending
                                                    </option>
                                                    <option @selected($order->order_status === 'processing') value="processing">Processing
                                                    </option>
                                                    <option @selected($order->order_status === 'delivered') value="delivered">Delivered
                                                    </option>
                                                    <option @selected($order->order_status === 'declined') value="declined">Declined
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <button class="btn btn-info" type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">{{ currencyPosition($order->subtotal) }}
                                        </div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Shipping</div>
                                        <div class="invoice-detail-value">
                                            {{ currencyPosition($order->delivery_charge) }}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Discount</div>
                                        <div class="invoice-detail-value">{{ currencyPosition($order->discount) }}
                                        </div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Delivery Fee</div>
                                        @if (!$order->delivery_charge)
                                            <div class="invoice-detail-value">{{ currencyPosition($order->discount) }}
                                            </div>
                                        @else
                                            <div class="invoice-detail-value">To be paid on Pickup
                                            </div>
                                        @endif
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name" style="font-weight: bold">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            {{ currencyPosition($order->grand_total) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">

                    </div>
                    <button class="btn btn-warning btn-icon icon-left  d-print-none" id="print_btn"><i
                            class="fas fa-print"></i>
                        Print</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#print_btn").on("click", function() {
                let printContent = $('#printable').html();

                let printWindow = window.open('', '', 'width=600, height=600');
                printWindow.document.open();
                printWindow.document.write('<html>');

                printWindow.document.write(
                    '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">'
                    );

                printWindow.document.write('<body>');
                printWindow.document.write(printContent);
                printWindow.document.write('</body></html>');
                printWindow.document.close();

                printWindow.print();
                printWindow.close();

            });
        });
    </script>
@endpush
