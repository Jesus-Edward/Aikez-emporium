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
                                <div class="col-md-6 col-sm-12 col-lg-3 mb-4">
                                    <div class="card size">
                                        <div class="card-body">
                                            <div class="d-flex"
                                                style="justify-content: flex-end; margin-right:10px; position: absolute;bottom:148px;right:30px; z-index:10">
                                                <span class="btn-primary pay">
                                                    {{ config('settings.site_currency_symbol') }} {{ $product->price }}
                                                </span>
                                            </div>
                                            <img src="{{ asset($product->image) }}" class="img-fluid prod-img" height=""
                                                width="" alt="">
                                            <div class="body-details my-4">
                                                <h5>{{ $product->name }}</h5>
                                                <span>{{ $product->brand->name }}</span>
                                            </div>

                                            <div class="cta-btn">
                                                <button class="action-btn">Get Sample</button>
                                                <button class="action-btn">Buy Now</button>
                                            </div>
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
