<div class="about-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img-2">
                    <img src="{{ asset($about->about_image) }}" alt="Images">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title">
                        <h2>{{ $about->about_title }}</h2>
                        <p>
                            {{ $about->about_description }}
                        </p>
                    </div>

                    <div class="about-form">
                        <form method="GET" action="{{ route('search.products') }}">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">All Categories</option>
                                            @foreach ($cates as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="form-control" name="brand_id" id="brand_id">
                                            <option value="">All Brands</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Sizes</label>
                                        <select class="form-control" name="size_id">
                                            <option value="">All Sizes</option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }} {{ config('settings.site_selling_unit') }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn btn-bg-two border-radius-50">
                                        Check our Store
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('frontend')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorySelect = document.getElementById('category_id');
            // const text = categoryOption.textContent;
            const brandSelect = document.getElementById('brand_id');

            function loadBrands(categoryId = '', categoryText = '') {
                // Reset the brand dropdown

                if (categoryId) {
                    brandSelect.innerHTML = `<option value="">${categoryText} Brands</option>`;
                }else {
                    brandSelect.innerHTML = '<option value="">All Brands</option>';
                }

                const url = categoryId ? `/get-brands/${categoryId}` : 'get-brands';

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            data.forEach(brand => {
                                const option = document.createElement('option');
                                option.value = brand.id;
                                option.textContent = brand.name;
                                brandSelect.appendChild(option);
                            });
                        } else {
                            const option = document.createElement('option');
                            option.value = "";
                            option.textContent = "No brands found";
                            brandSelect.appendChild(option);
                        }
                    })
                    .catch(err => {
                        console.error('Error loading brands:', err);
                    });
            }

            categorySelect.addEventListener('change', function() {
                const categoryId = this.value;
                const categoryOption = this.options[this.selectedIndex];
                const text = categoryOption.textContent;
                loadBrands(categoryId, text);
            });
        });
    </script>
@endpush
