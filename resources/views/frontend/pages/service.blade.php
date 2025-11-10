<div class="choose-area pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Why You Choose Our Hotel &amp; Resort Form the All of the Other's</h2>
                </div>
                <div class="row pt-45">
                    @foreach ($services as $service)

                        <div class="col-lg-3 col-md-6">
                            <div class="choose-card">
                                <i class="{{ $service->icon }}"></i>
                                <h3>{{ $service->title }}</h3>
                                <p>{{ $service->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
