<div class="testimonials-area-another pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Latest Testimonials and What Our Client Says</h2>
        </div>

        <style>
            .testi-img {
                width: 50px !important;
                height: 50px;
            }
        </style>
        <div class="testimonials-slider-three owl-carousel owl-theme pt-45 owl-loaded owl-drag">

            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(-2652px, 0px, 0px); transition: 0.25s; width: 4420px;">
                    @foreach ($testimonials as $testimonial)
                        <div class="owl-item cloned" style="width: 412px; margin-right: 30px;">
                            <div class="testimonials-item">
                                <i class="flaticon-left-quote text-color"></i>
                                <p>
                                    {{ $testimonial->testimony }}
                                </p>
                                <ul>
                                    <li>
                                        <img src="{{ asset($testimonial->image) }}" class="testi-img" alt="Images">
                                        <h3>{{ $testimonial->name }}</h3>
                                        <span>{{ $testimonial->location }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                        aria-label="Previous">‹</span></button><button type="button" role="presentation"
                    class="owl-next"><span aria-label="Next">›</span></button></div>
            <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button"
                    class="owl-dot active"><span></span></button></div>
        </div>
    </div>
</div>
