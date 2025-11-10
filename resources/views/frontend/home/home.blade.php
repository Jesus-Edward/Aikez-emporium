@extends('frontend.layouts.master')
@section('frontend')
    <!-- Sidebar Modal -->
    {{-- <div class="sidebar-modal">
        <div class="sidebar-modal-inner">
            <div class="sidebar-header">
                <h3>Filter Tiles Collections</h3>
                <span class="close-btn sidebar-modal-close-btn">
                    <i class="bx bx-x"></i>
                </span>
            </div>

            <style>
                #sizeFilter.form-control {
                    display: block !important;
                }

                .nice-select.form-control {
                    display: none !important;
                }
                .filter-group {
                    margin-bottom: 5px;
                }

                .form-check-input {
                    margin-right: 4px !important;
                    margin-top: 0.40rem !important;
                }

            </style>

            <div class="filter-group">
                <h5>Category</h5>
                @foreach ($categories as $category)
                    <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="category[]" id="" value="{{ $category->id }}">{{ $category->name }}</label>
                @endforeach
            </div>

            <div class="filter-group">
                <h5>Brand</h5>
                @foreach ($brands as $brand)
                    <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="brand[]" id="" value="{{ $brand->id }}">{{ $brand->name }}</label>
                @endforeach
            </div>

            <div class="filter-group">
                <h5>Finish</h5>
                <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="gloss" id="" value="gloss">Gloss</label>
                <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="matte" id="" value="matt">Matte</label>
                <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="satin" id="" value="satin">Satin</label>
            </div>

            <div class="filter-group">
                <h5>Color Family</h5>
                <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="white" id="" value="gloss">White</label>
                <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="grey" id="" value="matt">Grey</label>
                <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="brown" id="" value="satin">Brown</label>
                <label for="" class="form-check-label"><input type="checkbox" class="form-check-input" name="black" id="" value="satin">Black</label>
            </div>

            <div class="filter-group">
                <h5>Size</h5>
                <select id="sizeFilter" class="form-control">
                    <option value="">All</option>
                    <option>80X80 M</option>
                    <option>80X60 M</option>
                    <option>80X30 M</option>
                    <option>120X120 M</option>
                    <option>40X40 M</option>
                </select>
            </div>

            <div class="filter-group">
                <h5>Price Range</h5>
                <input type="range" name="" min="3000" max="100000" step="500" id="priceRange" style="width: 100%;">
                <p id="priceLabel">{{ config('settings.site_currency_symbol') }}3,000 to {{ config('settings.site_currency_symbol') }}100,000</p>
            </div>

            <div style="display: flex; justify-content:space-between">
                <button class="btn btn-danger">Clear Filters</button>
                <button class="btn btn-primary">Filter</button>
            </div>
        </div>
    </div> --}}
    <!-- End Sidebar Modal -->

    <!-- Banner Area Two -->
    {{-- @include('frontend.home.components.banner_area') --}}
    @include('frontend.home.components.slider_banner')
    <!-- Banner Area Two End -->

    <!-- About Area -->
    @include('frontend.home.components.about_area')
    <!-- About Area End -->

    <!-- Tile Collection Area Two -->
    @include('frontend.home.components.service_area')
    <!-- Tile Collection Area End -->

    <!-- Offer Area -->
    @include('frontend.home.components.product_slider')
    <!-- Offer Area End -->

    <!-- Services Area Two -->
    @include('frontend.home.components.product_area')
    <!-- Services Area Two End -->

    <!-- Ability Area -->
    @include('frontend.home.components.ability_area')
    <!-- Ability Area  End -->

    <!-- Team Area Two -->
    @include('frontend.home.components.team_area')
    <!-- Team Area Two End -->

    <!-- FAQ Area -->
    @include('frontend.home.components.faq_area')
    <!-- FAQ Area End -->

    <!-- Testimonials Area Two  -->
    @include('frontend.home.components.testimonial_area')
    <!-- Testimonials Area Two End -->

    <!-- Blog Area -->
    @include('frontend.home.components.blog_area')
    <!-- Blog Area End -->
@endsection

@push('frontend')
    <script>
        const currency = "{{ config('settings.site_currency_symbol') }}";
        $("#priceRange").on('input', function() {
            $("#priceLabel").text(`${currency}3,000 to ${currency}` + $(this).val());
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
