@extends('frontend.layouts.master')

@section('frontend')
     <style>
        .breadcrumb-img {
            background-image: url('{{ asset(config("settings.breadcrumb_logo")) }}');
        }
    </style>
    <!-- Inner Banner -->
    <div class="inner-banner breadcrumb-img">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>All Blogs</li>
                </ul>
                <h3>All Blogs</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Blog Style Area -->
    <div class="blog-style-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-12">
                            <div class="blog-card">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 col-md-4 p-0">
                                        <div class="blog-img">
                                            <a href="{{ url('/blog/details/' . $blog->slug) }}">
                                                <img src="{{ asset($blog->image) }}" alt="Images">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-8 p-0">
                                        <div class="blog-content">
                                            <span>{{ date('Y-m-d', strtotime($blog->created_at)) }}</span>
                                            <h3>
                                                <a
                                                    href="{{ url('/blog/details/' . $blog->slug) }}">{!! $blog->title !!}</a>
                                            </h3>
                                            <p>{{ $blog->short_post }}</p>
                                            <a href="{{ url('/blog/details/' . $blog->slug) }}" class="read-btn">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            {{ $blogs->links('vendor.pagination.custom_pagination') }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="side-bar-wrap">
                        <div class="search-widget">
                            <form class="search-form">
                                <input type="search" class="form-control" placeholder="Search...">
                                <button type="submit">
                                    <i class="bx bx-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="services-bar-widget">
                            <h3 class="title">Blog Category</h3>
                            <div class="side-bar-categories">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a
                                                href="{{ url('/blog/category/list/' . $category->id) }}">{{ $category->category }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="side-bar-widget">
                            <h3 class="title">Recent Posts</h3>
                            <div class="widget-popular-post">
                                @foreach ($latest_blogs as $latest)
                                    <article class="item">
                                        <a href="{{ url('/blog/details/' . $latest->slug) }}" class="thumb">
                                            <span class="full-image cover"><img src="{{ asset($latest->image) }}"
                                                    alt=""></span>
                                        </a>
                                        <div class="info">
                                            <h4 class="title-text">
                                                <a href="{{ url('blog/details/' . $latest->slug) }}">
                                                    {{ Str::limit($latest->title, 20) }}
                                                </a>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <i class='bx bx-user'></i>
                                                    {{ $latest->user->name }}
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Style Area End -->
@endsection
