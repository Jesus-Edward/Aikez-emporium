 <div class="services-area-two pb-70">
     <div class="container">
         <div class="section-title text-center">
             <h2>Our Tiles Collections and Rates</h2>
             <p>Explore our best collection of world aesthetic tiles and ceramics.</p>
         </div>

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

         <div class="row mt-5 mb-3">
             <div class="col-12 wow fadeInUp" data-wow-duration="1s"">
                 <div class="category_filter d-flex flex-wrap justify-content-center">
                     @foreach ($categories as $category)
                         <button class="default-btn btn-bg-two {{ $loop->index === 0 ? 'active button-click' : '' }}"
                             data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                     @endforeach
                 </div>
             </div>
         </div>

         <div class="row filtered" style="min-height: 200px">
             @foreach ($categories as $category)
                 {{-- @php
                     $products = App\Models\Product::where('status', 1)
                         ->where('category_id', $category->id)
                         ->orderBy('id', 'DESC')
                         ->take(8)
                         ->get();
                 @endphp --}}

                 @foreach ($category->products as $product)
                     <div class="col-lg-3 col-md-6 col-sm-6 {{ $category->slug }} wow fadeInUp" data-wow-duration="1s"">
                         <div class="room-item" style="position: relative">
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
                                     <h3><a
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
                                                     style="margin-right: 4px; color:blue"></i>
                                             </button>

                                             <button type="button" data-product_id="{{ $product->id }}"
                                                 class="wishlist-btn"
                                                 style="border: none;width: 20px;height: 20px;background: none;"><i
                                                     class="fa-solid fa-heart prod_cta" style="color: blue"></i></button>
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
         })
     </script>
 @endpush
