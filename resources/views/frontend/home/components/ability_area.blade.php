<div class="ability-area section-bg-2 pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="ability-content">
                    <div class="section-title">
                        <h2>{{ $ability->title }}</h2>
                        <p>
                            {{ $ability->description }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="ability-counter">
                                <h3>{{ $stat->value }}</h3>
                                <p>{{ $stat->title }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="ability-counter">
                                <h3>{{ $stat->value1 }}</h3>
                                <p>{{ $stat->title1 }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="ability-counter">
                                <h3>{{ $stat->value2 }}</h3>
                                <p>{{ $stat->title2 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ability-img">
                    <img src="{{ asset($ability->image) }}" alt="Images">
                </div>
            </div>
        </div>
    </div>
</div>
