<div class="testimonials-area-two pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Latest Testimonials and What Our Client Says</h2>
        </div>


        <div class="testimonials-container owl-carousel owl-theme pt-45">
            @foreach ($testimonials as $testimonial)
                <div class="fp__single_testimonial">
                    <div class="fp__testimonial_header d-flex flex-wrap align-items-center">
                        <div class="img">
                            <img src="{{ asset($testimonial->image) }}" alt="clients" class="img-fluid w-100">
                        </div>
                        <div class="text">
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{!! $testimonial->location !!}</p>
                        </div>
                    </div>
                    <div class="fp__single_testimonial_body">
                        <p class="feedback">{!! $testimonial->testimony !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
