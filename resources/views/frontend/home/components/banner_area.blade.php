<div class="banner-area-two">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-another">
                    <h1>{{ $banner->title }}</h1>
                    <p>
                        {{ $banner->description }}
                    </p>
                    <div class="banner-btn">
                        <a href="{{ $banner->button_link }}" class="default-btn btn-bg-two border-radius-50">Buy a
                            Tile</a>
                    </div>

                    <div class="banner-shape">
                        <img src="{{ asset('frontend/assets/img/home-two/shape.png') }}" alt="Images">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="banner-img">
                    <img src="{{ asset($banner->image) }}" alt="Images">
                </div>
            </div>
        </div>
    </div>
</div>
