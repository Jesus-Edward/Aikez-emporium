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
            width: 100%;
            height: 200px !important;
        }

        .category-btn,
        .brands-btn {
            padding-top: .5rem;
            padding-bottom: .5rem;
            padding-right: .75rem;
            padding-left: .75rem;
            --bs-text-opacity: 1;
            color: #6c757d !important;
            background: transparent;
            margin-right: 8px;
            border: solid 2px gray;
            transition: 0.4s linear;
        }

        .category-btn.active,
        .brands-btn.active {
            background: #6c757d;
            color: #ffffff !important;
            border: none !important;
        }
    </style>

    <div class="service-area pt-100 pb-70">
        <div class="container-fluid">
            <h2 class="mb-4 text-center">Our Tiles Categories</h2>

            <div class="d-flex flex-wrap justify-content-center wow fadeInUp" data-wow-duration="1s"" id="cat-btn">
                @foreach ($categories as $category)
                    <button data-category-id="{{ $category->id }}" class="category-btn "
                        >{{ $category->name }}</button>
                @endforeach
            </div>

            <div id="tile-brands" class="d-flex justify-content-between my-3" style="overflow: auto">

            </div>

            <div class="" style="padding-top: 8px">
                <div class="row" id="tile-products">

                </div>
            </div>

        </div>
    </div>
@endsection

@push('frontend')
    <script>
        const currency = "{{ config('settings.site_currency_symbol') }}";

        $('.category-btn').on('click', function() {
            $('.category-btn').removeClass('active');
            $(this).addClass('active');

            $('#tile-products').empty('');
            let categoryId = $(this).data('category-id');
            $.get(`/categories/${categoryId}/brands`, function(brands) {
                let html = '';
                brands.forEach(brand => {
                    html += `
                            <button class="brands-btn wow fadeInLeft" data-wow-duration="1s" data-brand-id="${brand.id}">${brand.name}</button>
                   `;
                });
                $('#tile-brands').html(html);
            });
        });

        let brandId = null;

        $(document).on('click', '.brands-btn', function() {
            $('.brands-btn').removeClass('active');
            $(this).addClass('active');
            brandId = $(this).data('brand-id');
            loadProducts(`/brands/${brandId}/products`);
        });

        function loadProducts(url) {

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(res) {
                    $('#tile-products').html(res.html);
                }
            })
            // $.get(url, function(res) {
            //     $('#tile-products').html(res);
            // });
        }

        $(document).on('click', '#tile-products .page-numbers', function(e) {
            e.preventDefault();

            const url = $(this).attr('href');
            loadProducts(url);
        })

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
