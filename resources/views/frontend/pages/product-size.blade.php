@extends('frontend.layouts.master')
@section('frontend')
    <style>
        .breadcrumb-img {
            background-image: url('{{ asset(config('settings.breadcrumb_logo')) }}');
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
                    <li>Checkout Our Tiles</li>
                </ul>
                <h3>Tiles</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->


    <style>
        .pay {
            padding: 5px 10px;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .action-btn {
            border: none;
            padding: 5px 10px;
            background: orange;
            color: #fff;
        }

        .action-btn:hover {
            background: rgb(245, 195, 101);
            color: #fff;
        }

        .size .cta-btn {
            display: flex;
            justify-content: space-between;
            opacity: 0;
        }

        .size .cta-btn:hover {
            opacity: 1;
        }

        .prod-img {
            width: 300px;
            height: 200px !important;
        }
    </style>

    <div class="contact-area pt-100 pb-70">
        <div class="container-fluid">
            <h2 class="mb-4 text-center">Our Tiles by Sizes</h2>
            <div class="align-items-center">
                @foreach ($sizes as $size)
                    <div class="mb-3">
                        <h3 class="mb-3 text-center text-muted border-bottom pb-1">{{ $size->name }}</h3>

                        <div class="row">
                            @foreach ($productBySize[$size->id] as $product)
                                <div class="col-md-6 col-sm-12 col-lg-3 mb-4 wow fadeInUp" data-wow-duration="1s"">
                                    <div class="card size">
                                        <div class="card-body">
                                            <form id="addToCartForm">
                                                <div class="d-flex"
                                                    style="justify-content: flex-end; margin-right:10px; position: absolute;bottom:148px;right:30px; z-index:10">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    @if ($product->price)
                                                        <span class="btn-primary pay">
                                                            {{ config('settings.site_currency_symbol') }}
                                                            {{ $product->price }}
                                                        </span>
                                                    @else
                                                        <a target="_blank"
                                                            href="https://wa.me/{{ config('settings.site_whatsapp') }}?text={{ urlencode(
                                                                "Hello I'm interested in: \nProduct: $product->name
                                                                                                        \nBrand: {$product->brand->name}
                                                                                                        \nPlease send me the price, thank you",
                                                            ) }}"
                                                            class="btn-primary offer" style="cursor: pointer"><i
                                                                class="bx bxl-whatsapp"></i>Ask for Price</a>
                                                    @endif
                                                </div>
                                                <a href="{{ route('single.product.page', $product->slug) }}">
                                                    <img src="{{ asset($product->image) }}" class="img-fluid prod-img"
                                                        height="" width="" alt="">
                                                </a>
                                                <div class="body-details my-4">
                                                    <a href="{{ route('single.product.page', $product->slug) }}">
                                                        <h5>{{ $product->name }}</h5>
                                                    </a>
                                                    <span>{{ $product->brand->name }}</span>
                                                </div>

                                                <div class="cta-btn">
                                                    <button type="button" data-product_id="{{ $product->id }}"
                                                        class="wishlist-btn"
                                                        style="border: none;width: 20px;height: 20px;background: none;"><i
                                                            class="fa-solid fa-heart prod_cta"></i></button>
                                                    <button type="submit" class="action-btn">Buy Now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-center mr-3 pagination-area">
                            {{ $productBySize[$size->id]->links('vendor.pagination.custom_pagination') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@push('frontend')
    <script>
        // $(document).ready(function() {
        $(document).on('submit', "#addToCartForm", function(e) {
            e.preventDefault();
            let form = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: "{{ route('product.add-to-cart') }}",
                data: form,
                success: function(res) {
                    if (res.status === 'success') {
                        $('.cart-num').text(res.count);
                        toastr.success(res.message);
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.responseJSON.message;
                    toastr.error(errorMessage);
                },
            })
        })
        // })

        $(document).on('click', '.wishlist-btn', function() {
            const product_id = $(this).data('product_id');
            // console.log(product_id);

            $.ajax({
                url: "{{ route('product.add-to-wishlist', ':product_id') }}".replace(':product_id',
                    product_id),
                method: 'POST',
                success: function(res) {
                    if (res.status === 'success') {
                        toastr.success(res.message);
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        })
    </script>
@endpush
