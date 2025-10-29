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
</style>

<div class="row">
    @foreach ($products as $product)
        <div class="col-md-6 col-sm-12 col-lg-3 mb-4 wow fadeInUp" data-wow-duration="1s"">
            <div class="card size">
                <form id="addToCartForm">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex"
                            style="justify-content: flex-end; margin-right:10px; position: absolute;bottom:148px;right:30px; z-index:10">
                            <span class="btn-primary pay">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="quantity" value="1">
                                {{ config('settings.site_currency_symbol') }} {{ $product->price }}
                            </span>
                        </div>
                        <a href="{{ route('single.product.page', $product->slug) }}">
                            <img src="{{ asset($product->image) }}" class="img-fluid prod-img" height=""
                                width="" alt="">
                        </a>
                        <div class="body-details my-4">
                            <a href="{{ route('single.product.page', $product->slug) }}">
                                <h5>{{ $product->name }}</h5>
                            </a>
                            <span>{{ $product->brand->name }}</span>
                        </div>

                        <div class="cta-btn">
                            <button disabled type="button" class="action-btn">Get Sample</button>
                            <button type="submit" class="action-btn">Buy Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center mr-3 pagination-area">
        {{ $products->links('vendor.pagination.custom_pagination') }}
    </div>
</div>
</div>
</div>








