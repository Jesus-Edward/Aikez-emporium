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
                    <li>Guest Wishlist</li>
                </ul>
                <h3>Guest Wishlist</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <style>
        .offer {
            padding: 5px 10px;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .rating {
            color: #ff9933;
        }

        .prod-img {
            width: 100%;
            height: 300px !important;
        }
    </style>

    <div class="services-area-two pb-70">
        <div class="container">
            <div class="section-title text-center my-4">
                <h2>Guest Wishlist</h2>
            </div>

            <div class="row">
                @foreach ($wishlists as $wishlist)
                    @php
                        $products = App\Models\Product::where('id', $wishlist->product_id)->get();
                    @endphp

                    @foreach ($products as $product)
                        <div class="col-lg-4 col-s-6 wow fadeInUp" data-wow-duration="1s">
                            <div class="room-item" style="position: relative">
                                <a href="{{ route('single.product.page', $product->slug) }}">
                                    <img src="{{ asset($product->image) }}" class="img-fluid prod-img" alt="Images">
                                </a>
                                <form id="addToCartForm">
                                    <div class="d-flex"
                                        style="justify-content: flex-end; margin-right:10px; position: absolute;bottom:130px;right:30px; z-index:10">
                                        <span class="btn-primary offer">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <input type="hidden" name="quantity" value="1">
                                            {{ config('settings.site_currency_symbol') }} {{ $product->price }}
                                        </span>
                                    </div>
                                    <div class="content">
                                        <h3><a
                                                href="{{ route('single.product.page', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>

                                        <div style="display: flex; justify-content: space-between; align-items: center">

                                            <ul>
                                                <li>{{ config('settings.site_currency_symbol') }} {{ $product->price }}
                                                </li>
                                                <li><span>Per SQM</span></li>
                                            </ul>
                                            <div class="d-flex">
                                                {{-- <button style="border: none;width: 20px;height: 20px;background: none;"><i class="fa-solid fa-ticket-simple" style="margin-right: 4px"></i></button> --}}
                                                <button type="submit"
                                                    style="border: none;width: 20px;height: 20px;background: none;">
                                                    <i class="fa-solid fa-shopping-basket prod_cta"
                                                        style="margin-right: 4px"></i>
                                                </button>

                                                {{-- <button type="button" data-product_id="{{ $product->id }}"
                                                    class="wishlist-btn"
                                                    style="border: none;width: 20px;height: 20px;background: none;"><i
                                                        class="fa-solid fa-heart"></i></button> --}}
                                            </div>

                                        </div>

                                        <span>{{ $product->brand->name }}</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('frontend')
    <script>
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
        });
    </script>
@endpush
