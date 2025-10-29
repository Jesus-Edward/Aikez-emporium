<div class="blog-area pb-70" style="background-color: #F5F5F5">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Latest Blogs in the Real Estate World</h2>
        </div>
        <div class="row pt-45">
            @foreach ($blogs as $blog)
                <div class="col-lg-4">
                    <div class="blog-card">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4 p-0">
                                <div class="blog-img">
                                    <a href="{{ route('blog.details', $blog->slug) }}">
                                        <img src="{{ asset($blog->image) }}" alt="Images">
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-8 p-0">
                                <div class="blog-content blog-color">
                                    <span>{{ $blog->created_at->diffForHumans() }}</span>
                                    <h3>
                                        <a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p>{{ $blog->short_post }}</p>
                                    <a href="{{ route('blog.details', $blog->slug) }}" class="read-btn">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
