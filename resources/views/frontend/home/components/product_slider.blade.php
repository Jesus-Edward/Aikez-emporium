<style>
    #featured-product {
        min-height: 400px
    }

    #featured-product .featured a {
        border: none;
        padding: 5px 10px;
        background: orange;
        color: #fff;
    }

    #featured-product .featured button:a {
        background: rgb(245, 195, 101);
        color: #fff;
    }

    .featured-heading {
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        margin-bottom: 30px;
    }

    #featured-product .featured img {
        width: 100%;
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    #featured-product .featured {
        position: relative;
    }

    #featured-product .owl-nav {
        display: flex;
        justify-content: flex-end;
        margin-right: 100px;
    }

    #featured-product .owl-prev {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #1B2132;
        color: #fff;
    }

    #featured-product .owl-prev:hover {
        background: #C890FF;
        color: #fff;
    }

    #featured-product .owl-next {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #1B2132;
        color: #fff;
    }

    #featured-product .owl-next:hover {
        background: #C890FF;
        color: #fff;
    }

    @media (max-width: 768px) {
        #featured-product .owl-prev {
            display: none !important;
        }

        #featured-product .owl-next {
            display: none !important;
        }
    }

    #featured-product .featured .details {
        position: absolute;
        top: 0;
        left: 0;
        color: burlywood;
        font-weight: bold;
        transition: 0.4s ease;
        opacity: 0.5;
        background-color: rgb(1, 1, 1);
        width: 100%;
        height: 100%;
    }

    #featured-product .owl-item .featured:nth-child(1) .details {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: column
    }

    #featured-product .featured .details {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column
    }

    .details[data-tile-one="second_tile"] {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column
    }

    /* #featured-product .owl-item .featured:nth-child(4) .details {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        flex-direction: column
    } */

    #featured-product .featured .details:hover {
        /* opacity: 0; */
        background-color: cornsilk;
    }

    #featured-product .featured .details h2,
    h4 {
        color: rgb(245, 195, 101);
    }

    .prod-img {
        width: 100%;
        height: 400px !important;
    }
</style>

<div id="featured-product" class="w-100 mb-5">
    <div class="featured-heading">
        <h2>Our Company Brand of Tiles</h2>
        <p>Check out our aesthetic brands of tiles below!</p>
    </div>

    <div class="featured-container owl-carousel owl-theme">

        @foreach ($brand_products as $product)
            <div class="featured col-sm-12 p-0">
                <a href="{{ route('single.product.page', $product->slug) }}">
                    <img src="{{ asset($product->image) }}" class="img-fluid prod-img" alt="">
                </a>
                <div class="details" data-tile-one="first_tile">
                    <h2>{{ $product->name }} - {{ $product->size->name }}</h2>
                    <h4>{{ $product->brand->name }}</h4>
                    <span>{{ $product->texture }}</span>
                    <a href="{{ route('single.product.page', $product->slug) }}" class="text-uppercase">Buy Now</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
