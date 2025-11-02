<div class="room-area-two pb-70 section-bg-2 mt-3">
    <div class="container">
        <div class="section-title text-center">
            <h2>Why Choose Us</h2>
        </div>
        <div class="room-slider owl-carousel owl-theme pt-45">
            @foreach ($services as $service)
                <div class="services-card">
                    <i class="{{ $service->icon }}"></i>
                    <h3><a href="service-details.html">{{ $service->title }}</a></h3>
                    <p>{{ $service->description }}</p>
                    {{-- <a href="{{ $service->button_link }}" class="get-btn">Get Service </a> --}}
                </div>
            @endforeach
        </div>
    </div>
</div>
