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
        <div class="col-md-6 col-sm-12 col-lg-3 mb-4">
            <div class="card size">
                <div class="card-body">
                    <div class="d-flex"
                        style="justify-content: flex-end; margin-right:10px; position: absolute;bottom:148px;right:30px; z-index:10">
                        <span class="btn-primary pay">
                            {{ config('settings.site_currency_symbol') }} {{ $product->price }}
                        </span>
                    </div>
                    <img src="{{ asset($product->image) }}" class="img-fluid prod-img" height="" width=""
                        alt="">
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

    <div class="d-flex justify-content-center mr-3 pagination-area">
        {{ $products->links('vendor.pagination.custom_pagination') }}
    </div>
</div>
</div>
</div>












{{-- $(document).on('click', '.brands-btn', function() {
let brandId = $(this).data('brand-id');
$.get(`/brands/${brandId}/products`, function(products) {
let html = '';
products.forEach(product => {
html += `

<div class="col-md-12 col-sm-12 col-lg-3 mb-4">
    <div class="card size">
        <div class="card-body">
            <div class="d-flex"
                style="justify-content: flex-end; margin-right:10px; position: absolute;bottom:148px;right:30px; z-index:10">
                <span class="btn-primary pay">
                    ${currency} ${product.price}
                </span>
            </div>
            <img src="${product.image}" class="img-fluid prod-img" height="" width="" alt="">
            <div class="body-details my-4">
                <h5>${product.name}</h5>
                <span>${product.brand.name}</span>
            </div>

            <div class="cta-btn">
                <button class="action-btn">Get Sample</button>
                <button class="action-btn">Buy Now</button>
            </div>
        </div>
    </div>
</div>
`;
});
$('#tile-products').html(html);
});
}) --}}
