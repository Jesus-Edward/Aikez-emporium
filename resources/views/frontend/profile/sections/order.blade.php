<div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">

    <style>
        .fp__invoice li::marker {
            content: none !important;
        }
    </style>
    <div class="fp_dashboard_body">
        <h3>Orders List</h3>
        <div class="col-md-12">
            <div class="fp_dashboard_order">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="t_header">
                            <tr>
                                <th>Order</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->invoice_id }}</td>
                                    <td>
                                        @if ($order->order_type === 'buy_tiles')
                                            BOUGHT
                                        @elseif ($order->order_type === 'get_sample')
                                            SAMPLE
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->grand_total }}</td>
                                    <td><a class="view_invoice"
                                            onclick="viewInvoice('{{ $order->id }}')">View_Details</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @foreach ($orders as $order)
            <div class="fp__invoice invoice_details_{{ $order->id }}">
                <a class="go_back  d-print-none"><i class="fas fa-long-arrow-alt-left"></i> go back</a>
                <div class="fp__track_order d-print-none">
                    <ul>
                        @if ($order->order_status === 'declined')
                            <li
                                class=" declined_status {{ in_array($order->order_status, ['declined']) ? 'active' : '' }}">
                                order declined</li>
                        @else
                            <li
                                class="{{ in_array($order->order_status, ['pending', 'processing', 'delivered', 'declined']) ? 'active' : '' }}">
                                order pending</li>
                            <li
                                class="{{ in_array($order->order_status, ['processing', 'delivered', 'declined']) ? 'active' : '' }}">
                                order processing</li>
                            <li class="{{ in_array($order->order_status, ['delivered']) ? 'active' : '' }}">order
                                delivered</li>
                        @endif

                        {{-- <li class="active">order declined</li> --}}
                    </ul>
                </div>
                <div class="fp__invoice_header">
                    <div class="header_address">
                        <h4>invoice to</h4>
                        <p>{{ @$order->user->name }}</p>
                        <p>{{ @$order->userAddress->address }}</p>
                        <p>{{ @$order->userAddress->phone }}</p>
                    </div>
                    <div class="header_address" style="width: 60%">
                        <p><b style="width: 140px">invoice no: </b><span>#{{ @$order->invoice_id }}</span></p>
                        <p><b style="width: 140px">Payment Status: </b> <span>{{ @$order->payment_status }}</span></p>
                        <p><b style="width: 140px">Payment Method: </b> <span>{{ @$order->payment_method }}</span></p>
                        {{-- <p><b style="width: 150px">Transaction ID: </b> <span>{{ @$order->transaction_id }}</span></p> --}}
                        <p><b>Date:</b style="width: 140px">
                            <span>{{ date('F d, Y', strtotime($order->created_at)) }}</span>
                        </p>
                    </div>
                </div>
                <div class="fp__invoice_body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr class="border_none">
                                    <th class="sl_no">S/N</th>
                                    <th class="package">item description</th>
                                    <th class="price">Price</th>
                                    <th class="qnty">Quantity</th>
                                    <th class="total">Total</th>
                                </tr>
                                @foreach ($order->orderItems as $orderItem)
                                    @php
                                        $qty = $orderItem->qty;
                                        $unit_price = $orderItem->unit_price;
                                        $productTotal = $unit_price * $qty;
                                    @endphp
                                    <tr>
                                        <td class="sl_no">{{ ++$loop->index }}</td>
                                        <td class="package">
                                            <p>{{ $orderItem->product_name }}</p>

                                        </td>
                                        <td class="price">
                                            <b>{{ currencyPosition($orderItem->unit_price) }}</b>
                                        </td>
                                        <td class="qnty">
                                            <b>{{ $orderItem->qty }}</b>
                                        </td>
                                        <td class="total">
                                            <b>{{ currencyPosition($productTotal) }}</b>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="package" colspan="3">
                                        <b>sub total</b>
                                    </td>
                                    <td class="qnty">
                                        <b>-</b>
                                    </td>
                                    <td class="total">
                                        <b>{{ currencyPosition($order->subtotal) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="package coupon" colspan="3">
                                        <b>(-) Discount coupon</b>
                                    </td>
                                    <td class="qnty">
                                        <b>-</b>
                                    </td>
                                    <td class="total coupon">
                                        <b>{{ currencyPosition($order->discount) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="package coast" colspan="3">
                                        <b>(+) Shipping Cost</b>
                                    </td>
                                    <td class="qnty">
                                        <b>-</b>
                                    </td>
                                    <td class="total coast">
                                        <b>{{ currencyPosition($order->delivery_charge) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="package" colspan="3">
                                        <b>Total Paid</b>
                                    </td>
                                    <td class="qnty">
                                        <b>-</b>
                                    </td>
                                    <td class="total">
                                        <b>{{ currencyPosition($order->grand_total) }}</b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <a class="print_btn common_btn fp__print_btn d-print-none text-end" onclick="printInvoice('{{ $order->id }}')"
                    href="javascript:;"><i class="fas fa-print"></i> print
                    PDF</a>
            </div>
        @endforeach
    </div>
</div>

@push('frontend')
    <script>
        function viewInvoice(id) {
            $(".fp_dashboard_order").fadeOut();
            $(".invoice_details_" + id).fadeIn();
        }

        function printInvoice(id) {
            let printContent = $('.invoice_details_' + id).html();

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
        }
    </script>
@endpush
