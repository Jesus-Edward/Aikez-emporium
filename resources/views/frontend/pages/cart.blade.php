@extends('frontend.layouts.master')
@section('frontend')
     <style>
        .breadcrumb-img {
            background-image: url('{{ asset(config("settings.breadcrumb_logo")) }}');
        }
    </style>
    <!-- Inner Banner -->
    <div class="inner-banner breadcrumb-img">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Cart View</li>
                </ul>
                <h3>Cart View</h3>
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
    </style>

    {{-- {{ Cart::destroy() }} --}}
    <div class="ability-area cart-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 mb-5 wow fadeInUp" data-wow-duration="1s">
                    <div class="cart">
                        <div class="d-flex justify-content-between">
                            <h6>Cart ({{ Cart::content()->count() }})</h6>
                            @if (Cart::content()->count() > 0)
                                <a href="{{ route('product.destroy.cart') }}" style="color: #000">Clear Cart</a>
                            @endif
                        </div>

                        @foreach (Cart::content() as $product)
                            {{-- @dd(Cart::content()) --}}
                            <div class="cart-content my-3">

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <div style="margin-right:8px">
                                            <img src="{{ asset($product->options['image']) }}" class="img-fluid cart-img"
                                                alt="">
                                        </div>
                                        <div class="product_name">
                                            <p>{{ $product->name }} <span>({{ $product->options['size'] }} )</span></p>
                                            <p>{{ config('settings.site_currency_symbol') }}{{ number_format($product->price) }}
                                            </p>
                                            @if ($product->options->prod_quan > 50)
                                                <span style="color: var(--colorPrimary)">
                                                    In Stock
                                                </span>
                                            @else
                                                <span class="text-danger">Limited Stock</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="sub">
                                        <span
                                            class="product_cart_total">{{ currencyPosition(productTotal($product->rowId)) }}</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <div style="cursor: pointer; color: var(--colorPrimary)">
                                        <span data-id="{{ $product->rowId }}" class="remove-cart-item">remove <i
                                                class="fas fa-trash"></i></span>
                                    </div>
                                    <div>
                                        <span class="decrease-btn qty-btn minus"><i class="fas fa-minus"></i></span> <input
                                            type="text" class="cart-input-field" value="{{ $product->qty }}"
                                            data-id="{{ $product->rowId }}" readonly> <span class="increase-btn qty-btn plus"><i
                                                class="fas fa-plus"></i></span>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endforeach

                        @if (Cart::content()->count() === 0)
                            <div class="d-flex justify-content-center text-dark" style="">
                                Cart is empty!
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 mb-5 wow fadeInUp" data-wow-duration="1s">

                    {{-- <form action=""> --}}

                        <div class=" mb-2">
                            <div class="cart">
                                <h6>Total Cart</h6>
                                <p class="summary_p">Subtotal <span
                                        id="subtotals">{{ currencyPosition(cartTotalPrice()) }}</span></p>
                                <p class="summary_p">Delivery <span id="delivery_fee">{{ currencyPosition(0.00) }}</span></p>
                                <p class="summary_p">Discount <span id="discount">{{ currencyPosition(0.00) }}</span></p>

                                <p class="total"><span>Total:</span><span id="final_total">
                                        @if (isset(session()->get('coupon')['discount']))
                                            {{ config('settings.site_currency_symbol') }}{{ cartTotalPrice() - session()->get('coupon')['discount'] }}
                                        @else
                                            {{ config('settings.site_currency_symbol') }}{{ cartTotalPrice() }}
                                        @endif
                                    </span>
                                </p>

                                <form id="coupon_form">
                                    <input type="text" id="coupon_code" class="coupon_input" name="code" placeholder="Enter Coupon Code">
                                    <button type="submit">apply</button>
                                </form>

                                <div class="coupon_cart my-2">
                                    @if (session()->has('coupon'))
                                        <div class="card mt-2" style="padding: 2px 4px;">
                                            <div class="m-2">
                                                <span><b class="v_coupon_code">Applied Coupon:
                                                        {{ session()->get('coupon')['code'] }}</b></span>
                                                <span>
                                                    <button id="destroy_coupon"><i class="fa fa-times"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <div class="cart u_address">
                                <div class="d-flex" style="justify-content: space-between">
                                    <h6>Select Your Address</h6>
                                    <span class="cart_add_address" id="cart_add_address" data-bs-toggle="modal"
                                        data-bs-target="#address_modal" style="color:rgb(178, 119, 11); cursor:pointer">
                                        <i class="fas fa-plus"></i> Add Address
                                    </span>
                                </div>

                                @foreach ($addresses as $address)
                                    <div class="d-flex" style="justify-content: space-between">
                                        <div class="address_p">
                                            <p>{{ Str::limit($address->address, 30, '...') }}</p>
                                            <small
                                                style="color: rgb(178, 119, 11)">{{ config('settings.site_currency_symbol') }}{{ $address->deliveryArea->delivery_fee }}</small>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input v_address" type="radio" name="address"
                                                value="{{ $address->id }}">
                                        </div>
                                    </div>
                                @endforeach

                                <hr>
                                <div class="d-flex" style="justify-content: space-between">
                                    <div class="address_p">
                                        <p>N/A, Delivery fee to area to be paid on pickup</p>
                                        <small style="color: rgb(178, 119, 11)">POP</small>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input v_address" type="radio" name="address"
                                            value="pay_on_pickup">
                                    </div>
                                </div>

                                <div class="my-2">
                                    <a href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#purchase_action" class="default-btn btn-bg-two">Pay Now</a>
                                </div>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>

    </div>
    </div>

    <div class="fp__address_modal">
        <div class="modal fade" id="address_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="address_modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="address_modalLabel">add new address
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fp_dashboard_new_address d-block">
                            <form action="{{ route('profile.address.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="fp__check_single_form">
                                            <select name="area" class="form-control">
                                                <option value="">Select Area</option>
                                                @foreach ($deliveryAreas as $deliveryArea)
                                                    <option value="{{ $deliveryArea->id }}">
                                                        {{ $deliveryArea->area_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="fp__check_single_form">
                                            <input type="text" class="form-control" name="first_name"
                                                value="{{ old('first_name') }}" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="fp__check_single_form">
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ old('last_name') }}" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="fp__check_single_form">
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ old('phone') }}" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="fp__check_single_form">
                                            <input type="text" class="form-control" name="email"
                                                value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="fp__check_single_form">
                                            <textarea cols="3" class="form-control" rows="4" name="address" placeholder="Address">{{ old('address') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="addresses" style="display: flex">
                                        <button style="width: 200px; margin-right:8px" type="button"
                                            class="address-btn  mr-2 cancel_address_modal">cancel</button>
                                        <button style="width: 200px" type="submit" class="address-btn ">save
                                            address</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fp__address_modal">
        <div class="modal fade" id="purchase_action" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="address_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="address_modalLabel">What Action?
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <style>
                    .buy-action .fp_dashboard_new_address .form-check {
                        background: none !important;
                        border: none !important;
                    }
                </style>
                <div class="modal-body buy-action">
                    <div class="fp_dashboard_new_address d-block">
                        {{-- <form action="{{ route('checkout.payment') }}" method="POST"> --}}
                            {{-- @csrf --}}
                            <div class="d-flex" style="justify-content: space-between; margin-bottom: 10px">
                                <div class="address_p">
                                    <p>Pay for items</p>
                                    <small style="color: rgb(178, 119, 11)">Make a purchase</small>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input payment-option" type="radio" name=""
                                        value="buy_tiles">
                                </div>
                            </div>

                            <div class="d-flex" style="justify-content: space-between">
                                <div class="address_p">
                                    <p>Get Samples(The actual amount you'll pay is the delivery fee only)</p>
                                    <small style="color: rgb(178, 119, 11)">Make a purchase</small>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input payment-option" type="radio" name=""
                                        value="get_sample">
                                </div>
                            </div>

                            {{-- <div class="d-flex justify-content-end">
                                <button type="submit" class="default-btn btn-bg-two">Proceed</button>
                            </div> --}}
                        {{-- </form> --}}
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
            $('.cancel_address_modal').on('click', function() {
                $('.modal-body input').val('');
                $('.modal-body textarea').val('');
                $('#address_modal').modal('hide');
            });

        });

        var cartTotal = parseInt("{{ cartTotalPrice() }}");

        $(document).on('click', '.qty-btn', function() {

            let inputField = $(this).siblings('.cart-input-field');
            let qty = parseInt(inputField.val());
            let rowId = inputField.data('id');

            if ($(this).hasClass('plus')) {
                inputField.val(qty++);
                updateCartQTY(rowId, qty, function(res) {
                    if (res.status === 'success') {
                        inputField.val(res.qty);
                        let productTotal = res.product_total;

                        inputField.closest('.cart-content').find('.product_cart_total').text(
                            "{{ currencyPosition(':productTotal') }}"
                            .replace(":productTotal", productTotal));

                        cartTotal = res.cart_total;

                        $("#subtotals").text("{{ config('settings.site_currency_symbol') }}" +
                            cartTotal);

                        let grandTotal = res.grand_cart_total;
                        $("#final_total").text(
                            "{{ config('settings.site_currency_symbol') }}" + grandTotal);

                    } else if (res.status === 'error') {
                        toastr.error(res.message);
                    }
                });

            } else if ($(this).hasClass('minus') && qty > 1) {
                inputField.val(qty--);
                updateCartQTY(rowId, qty, function(res) {
                    if (res.status === 'success') {
                        inputField.val(res.qty);
                        let productTotal = res.product_total;

                        inputField.closest('.cart-content').find('.product_cart_total').text(
                            "{{ currencyPosition(':productTotal') }}"
                            .replace(":productTotal", productTotal));

                        cartTotal = res.cart_total;

                        $("#subtotals").text("{{ config('settings.site_currency_symbol') }}" +
                            cartTotal);

                        let grandTotal = res.grand_cart_total;
                        $("#final_total").text(
                            "{{ config('settings.site_currency_symbol') }}" + grandTotal);

                    } else if (res.status === 'error') {
                        toastr.error(res.message);
                    }
                });

            }

            function updateCartQTY(rowId, qty, callback) {
                $.ajax({
                    url: "{{ route('product.update-cart') }}",
                    method: 'POST',
                    data: {
                        rowId: rowId,
                        qty: qty
                    },
                    success: function(res) {
                        if (callback && typeof callback === 'function') {
                            callback(res);
                        }
                    },
                    error: function(err) {
                        console.log(err);

                    }
                })
            }
        });

        $(document).on('click', '.remove-cart-item', function(e) {
            e.preventDefault();
            let rowId = $(this).data('id');
            removeCartProduct(rowId);
            $(this).closest('.cart-content').remove();
        });

        function removeCartProduct(rowId) {
            $.ajax({
                method: 'get',
                url: "{{ route('cart-product-remove', ':rowId') }}".replace(":rowId", rowId),
                // beforeSend: function() {
                //     showLoader();
                // },
                success: function(response) {

                    cartTotal = response.cart_total;
                    $("#subtotals").text("{{ config('settings.site_currency_symbol') }}" +
                        cartTotal);

                    grandTotal = response.grand_cart_total;
                    $("#final_total").text("{{ config('settings.site_currency_symbol') }}" +
                        grandTotal);
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    // hideLoader();
                    toastr.error(errorMessage);
                },
                // complete: function() {
                //     hideLoader();
                // }
            })
        }

        $(document).ready(function() {

            $('#coupon_form').on('submit', function(e) {
                e.preventDefault();
                let code = $("#coupon_code").val();
                let subtotal = cartTotal;

                couponApply(code, subtotal);

            });

            function couponApply(code, subtotal) {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('apply-coupon') }}",
                    data: {
                        code: code,
                        subtotal: subtotal
                    },
                    // beforeSend: function() {
                    //     showLoader();
                    // },
                    success: function(response) {
                        $("#coupon_code").val("");
                        $("#discount").text("{{ config('settings.site_currency_symbol') }}" + response
                            .discount);
                        $("#final_total").text("{{ config('settings.site_currency_symbol') }}" +
                            response.finalTotal);

                        $couponCartHtml = `
                            <div class="card mt-2" style="padding: 2px 4px">
                                <div class="m-2">
                                    <span><b class="v_coupon_code">Applied Coupon: ${ response.coupon_code }</b></span>
                                    <span>
                                        <button id="destroy_coupon"><i class="fa fa-times"></i></button>
                                    </span>
                                </div>
                            </div>
                        `
                        $(".coupon_cart").html($couponCartHtml);
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                    // complete: function() {
                    //     hideLoader();
                    // }
                })
            }
        });

        $(document).on("click", "#destroy_coupon", function() {
            destroyCoupon();
        })

        function destroyCoupon() {
            $.ajax({
                method: 'GET',
                url: "{{ route('destroy-coupon') }}",
                // beforeSend: function() {
                //     showLoader();
                // },
                success: function(response) {
                    $("#discount").text("{{ config('settings.site_currency_symbol') }}" + 0);
                    let grandTotal = response.grand_cart_total;
                    $("#final_total").text("{{ config('settings.site_currency_symbol') }}" +
                        grandTotal);
                    $(".coupon_cart").html("");

                    toastr.success(response.message);
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                },
                // complete: function() {
                //     hideLoader();
                // }
            })
        }

        $(document).ready(function() {
            $('.v_address').prop('checked', false);

            $('.v_address').on('change', function() {
                let addressId = $(this).val();
                let deliveryFee = $('#delivery_fee');
                let grandTotal = $('#final_total');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('checkout.delivery-cal') }}",
                    // .replace(":id", addressId),
                    // beforeSend: function() {
                    //     showLoader();
                    // },
                    data: {
                        id: addressId
                    },
                    success: function(response) {

                        deliveryFee.text("{{ currencyPosition(':amount') }}"
                            .replace(":amount", response.delivery_fee));
                        grandTotal.text("{{ currencyPosition(':amount') }}"
                            .replace(":amount", response.grand_total));
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                    // complete: function() {
                    //     hideLoader();
                    // }
                })
            })
        })

        $(document).ready(function() {
            $('.payment-option').on('click', function(e) {

                e.preventDefault();
                let addressId = $('.v_address:checked');
                let id = addressId.val();
                let user = "{{ auth()->user() }}";
                let orderType = $(this).val();

                if (addressId.length === 0) {
                    toastr.error('Please select your address!');
                    return;
                }

                if (!user) {
                    window.location.href = '/login';
                }
                $.ajax({
                    method: 'POST',
                    url: "{{ route('checkout.payment') }}",
                    data: {
                        id: id,
                        order_type: orderType
                    },
                    // beforeSend: function() {
                    //     showLoader();
                    // },
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                    // complete: function() {
                    //     hideLoader();
                    // }
                })
            })
        })

    </script>
@endpush



