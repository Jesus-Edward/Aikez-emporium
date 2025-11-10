@extends('frontend.layouts.master')

@section('seo_title', 'Foreign and Local Tiles Store')
@section('seo_description', 'Checkout the best online tile store and purchase all sorts of tiles for your real estate decoration')
@section('frontend')
    <style>
        .breadcrumb-img {
            background-image: url('{{ asset(config('settings.breadcrumb_logo')) }}');
        }

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

        .prod-search:focus {
            border: none !important;
            outline: none !important;
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
                    <li>Our Store </li>
                </ul>
                <h3>Our Store</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <div class="service-area pt-45 pb-70">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 50px">
                <div style="" class="col-md-6">
                    <h2 class="text-center">Our Tiles Store</h2>
                </div>

                <div class="col-md-3">
                    <input type="text" class="form-control prod-search" id="searchField" placeholder="Search our Tiles" style="padding: .75rem;border-radius: 50px;background-color: beige;">
                </div>
            </div>

            <div class="row">
                @forelse ($products as $product)

                    <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp productCard" id="" data-wow-duration="1s">
                        <div class="room-item" style="position: relative" id="">
                            <a href="{{ route('single.product.page', $product->slug) }}">
                                <img src="{{ asset($product->image) }}" class="img-fluid prod-img" alt="Images">
                            </a>
                            <form id="addToCartForm">
                                <div class="d-flex"
                                    style="justify-content: flex-end; margin-right:10px; position: absolute;bottom:130px;right:30px; z-index:10">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    @if ($product->price)
                                        <span class="btn-primary offer">
                                            {{ config('settings.site_currency_symbol') }} {{ $product->price }}
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
                                <div class="content">
                                    <h3 class="product-name"><a
                                            href="{{ route('single.product.page', $product->slug) }}">{{ Str::limit($product->name, 17, ' ...') }}</a>
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

                                            <button type="button" data-product_id="{{ $product->id }}"
                                                class="wishlist-btn"
                                                style="border: none;width: 20px;height: 20px;background: none;"><i
                                                    class="fa-solid fa-heart prod_cta"></i></button>
                                        </div>

                                    </div>

                                    <span>{{ $product->brand->name }}</span>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No tiles found matching your search <a href="{{ url()->previous() }}">Go Back</a></p>
                @endforelse

                <div class="d-flex justify-content-center mr-3 pagination-area">
                    {{ $products->links('vendor.pagination.custom_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('frontend')
    <script>
        $(document).ready(function() {
            $('.wishlist-btn').on('click', function() {
                const product_id = $(this).data('product_id');
                // console.log(product_id);

                $.ajax({
                    url: "{{ route('product.add-to-wishlist', ':product_id') }}".replace(
                        ':product_id', product_id),
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
        });

        $(document).ready(function() {
            $("#searchField").on('input', function() {
                const query = $(this).val().toLowerCase();
                $(".productCard").each(function() {
                    const name = $(this).find('.product-name').text().toLowerCase();
                    $(this).toggle(name.includes(query));
                });
            });

        });

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
    </script>
@endpush
