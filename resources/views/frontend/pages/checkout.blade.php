@extends('frontend.layouts.master')
@section('frontend')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg12">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Checkout View</li>
                </ul>
                <h3>Payment View</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <style>
        .cart-bg {
            background-color: #f1f1f2
        }

        .cart {
            background: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: rgb(50 50 93 / 15%) 0px 0px 5px 0px;
            position: relative;
        }

        .cart h6 {
            border: none;
            color: #000;
            text-transform: capitalize;
            font-size: 18px;
            font-weight: 600;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .cart .summary_p {
            text-transform: capitalize;
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
            font-size: 15px;
            color: #000
        }

        .cart .total {
            border-top: 1px solid #eee;
            padding-top: 15px;
            color: #000;
            display: flex;
            justify-content: space-between;
            font-weight: bolder;
        }

        .cart form {
            margin-top: 15px;
            position: relative;
            border: 1px solid;
            /* border-radius: 30px; */
            overflow: hidden;
        }

        .cart .coupon_input {
            width: 100%;
            padding: 10px 20px;
            font-size: 15px;
            font-weight: 400;
            background: #faf6f3fa;
            border: 1px solid var(--colorPrimary);
        }

        .cart button {
            text-transform: capitalize;
            margin-left: 10px;
            padding: 8px 20px;
            text-align: center;
            /* border-radius: 30px; */
            border: none;
            background: var(--colorPrimary);
            color: var(--colorWhite);
            font-size: 14px;
            font-weight: 600;
            position: absolute;
            top: 24px;
            right: 4px;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -o-transform: translateY(-50%);
        }

        .address_p p {
            color: #000;
            margin-bottom: 0 !important;
            font-size: 14px;
        }

        .u_address .form-check input {
            padding: 0;
            border-color: var(--colorPrimary);
        }

        .u_address .form-check input:checked {
            background-color: var(--colorPrimary);
            border-color: var(--colorPrimary);
        }

        .u_address .btn-bg-two {
            background-color: var(--colorPrimary);
            width: 100% !important;
        }

        .cart-img {
            height: 100px;
            width: 80px;
        }

        .product_name p {
            margin-bottom: 0 !important;
        }

        .increase-btn,
        .decrease-btn {
            background: orange;
            color: #fff;
            padding: 5px 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .increase-btn:hover,
        .decrease-btn:hover {
            background: rgb(172, 114, 7);
            color: #fff;
            padding: 5px 5px;
            border-radius: 5px;
        }

        .cart-input-field {
            width: 50px;
            padding: 2px 10px;
            outline: none;
            background: #f1f1f2;
            border: none;
        }

        .payment-card {
            width: 50%;
        }

        @media (max-width: 768px) {
            .payment-card {
                width: 100% !important;
            }
        }
    </style>

    <div class="ability-area cart-bg pt-100 pb-70">
        <div class="container">
            <div class="row">

                <div class="col-md-8 mb-3 wow fadeInUp" data-wow-duration="1">
                    <div class="mb-2 d-flex flex-column">
                        <div class="cart payment-card" style="cursor: pointer;">
                            <a href="#" class="payment-path" data-name="paystack">
                                <div class="d-flex justify-content-between">
                                    <img src="{{ asset(config('payment_settings.paystack_logo')) }}" class="img-fluid" style="width: 70px; height:40px" alt="">

                                    <em><p style="color:#000">Pay with {{ config('payment_settings.payment_name') }}</p></em>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4 mb-5 wow fadeInUp" data-wow-duration="1s">
                    <div class="mb-2">
                        <div class="cart">
                            <h6>Total Cart</h6>
                            <p class="summary_p">Subtotal <span
                                    id="subtotals">{{ currencyPosition($subtotal) }}</span></p>
                            <p class="summary_p">Delivery <span id="delivery_fee">{{ currencyPosition($delivery) }}</span></p>
                            <p class="summary_p">Discount <span id="discount">
                                @if (session()->has('coupon'))
                                        {{ config('settings.site_currency_symbol') }}{{ $discount }}
                                    @else
                                        {{ config('settings.site_currency_symbol') }}{{ 0 }}
                                    @endif
                            </span></p>

                            <p class="total"><span>Grand Total:</span><span id="final_total">{{ currencyPosition($grandTotal) }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('frontend')
    <script>
        $(document).ready(function() {
            $('.payment-path').on('click', function(e) {
                e.preventDefault();

                let paymentPath = $(this).data('name');

                $.ajax({
                    method: 'POST',
                    url: "{{ route('paystack.make-payment') }}",

                    data: {
                        payment_path: paymentPath
                    },
                    beforeSend: function() {
                        // showLoader();
                    },
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        });
                    },
                    complete: function() {
                        // hideLoader();
                    }
                })
            })
        })
    </script>
@endpush
