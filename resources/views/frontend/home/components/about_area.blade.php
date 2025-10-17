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
                        <form>
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <div class="input-group">
                                            <input id="" type="text" class="form-control"
                                                placeholder="category">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <div class="input-group">
                                            <input id="" type="text" class="form-control"
                                                placeholder="brand">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Sizes</label>
                                        <select class="form-control">
                                            <option>80X80 M</option>
                                            <option>80X60 M</option>
                                            <option>80X30 M</option>
                                            <option>120X120 M</option>
                                            <option>40X40 M</option>
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
