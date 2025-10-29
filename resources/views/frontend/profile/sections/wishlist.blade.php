<div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
<style>
    p,h1,h2,h3 {
        color: #000 !important;
    }
</style>
    <div class="fp_dash_personal_info">
        <h3> Wishlist</h3>
        <div class="fp_dashboard_order">
            <div class="table-responsive">
                <table class="table" style="overflow: auto">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Product</th>
                            <th>Brand</th>
                            <th>Size</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="overflow: auto">
                        @foreach ($wishlists as $wishlist)
                            @php
                                $products = App\Models\Product::where('id', $wishlist->product_id)->get();
                            @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->brand->name }}</td>
                                    <td>{{ $product->size->name }}</td>
                                    <td>
                                        @if ($product->quantity > 0)
                                            <span class="badge bg-primary text-white">In Stock</span>
                                        @else
                                            <span class="badge bg-danger text-white">Stock Out</span>
                                        @endif
                                    </td>
                                    <td>{{ currencyPosition($product->price) }}</td>
                                    <td><a href="{{ route('single.product.page', $product->slug) }}">View_Product</a></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
