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
             <div class="col-12">
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
                     <div class="col-lg-4 col-s-6 {{ $category->slug }}">
                         <div class="room-item" style="position: relative">
                             <a href="room-details.html">
                                 <img src="{{ asset($product->image) }}" class="img-fluid prod-img" alt="Images">
                             </a>
                             <div class="d-flex"
                                 style="justify-content: flex-end; margin-right:
                    10px; position: absolute;bottom:130px;right:30px; z-index:10">
                                 <span class="btn-primary offer">
                                     {{ config('settings.site_currency_symbol') }} {{ $product->price }}
                                 </span>
                             </div>
                             <div class="content">
                                 <h3><a href="room-details.html">{{ $product->name }}</a></h3>

                                 <div style="display: flex; justify-content: space-between; align-items: center">

                                     <ul>
                                         <li>{{ config('settings.site_currency_symbol') }} {{ $product->price }}</li>
                                         <li><span>Per SQM</span></li>
                                     </ul>
                                     <div class="d-flex">
                                         <i class="fa-solid fa-ticket-simple" style="margin-right: 4px"></i>
                                         <i class="fa-solid fa-shopping-basket" style="margin-right: 4px"></i>
                                         <i class="fa-solid fa-heart"></i>
                                     </div>

                                 </div>

                                 <span>{{ $product->brand->name }}</span>
                             </div>
                         </div>
                     </div>
                 @endforeach
             @endforeach
         </div>
     </div>
 </div>
