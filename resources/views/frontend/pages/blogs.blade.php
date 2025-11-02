@extends('frontend.layouts.master')
@section('frontend')
     <style>
        .breadcrumb-img {
            background-image: url('{{ asset(config("settings.breadcrumb_logo")) }}');
        }
    </style>

    <div class="inner-banner breadcrumb-img">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>SEARCHED CATEGORIES</li>
                </ul>
                <h3>SEARCHED CATEGORIES</h3>
            </div>
        </div>
    </div>

    <style>
        .fomInput .form-control {
            padding: 0.7rem 1.75rem !important;
            border-radius: 50px !important
        }

        .form-controls {
            display: block !important;
            padding: 0.7rem 1.75rem !important;
            border-radius: 50px !important;
            width: 100%;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .nice-select {
            display: none !important
        }

    </style>

     <div class="blog-style-area pt-100 pb-70">
        <div class="container">
            <form style="background: beige;padding: 15px;border-radius: 50px;" action="{{ route('blogs') }}" method="GET">
                <div class="row">
                    <div class="col-xl-6 col-md-5 fomInput">
                        <input type="text" class="form-control" placeholder="Search..." name="search" id="search"
                            value="{{ @request()->search }}">
                    </div>
                    <div class="col-xl-4 col-md-4 fomInput2">
                        <select class="form-controls" name="" id="">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option @selected(@request()->category === $category->slug) value="{{ $category->slug }}">{{ $category->category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-2 col-md-3">
                        <button type="submit" style="border-radius:50px; padding:0.6rem 4.4rem; border:none" id="search-btn">search</button>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__single_blog">
                            <a href="{{ route('blogs.details', $blog->slug) }}" class="fp__single_blog_img">
                                <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="img-fluid w-100">
                            </a>
                            <div class="fp__single_blog_text">
                                <a class="category" href="#">{{ $blog->category->category }}</a>
                                <ul class="d-flex flex-wrap mt_15">
                                    <li><i class="fas fa-user"></i>{{ $blog->user->name }}</li>
                                    <li><i
                                            class="fas fa-calendar-alt"></i>{{ date('d m Y', strtotime($blog->created_at)) }}
                                    </li>
                                    <li><i class="fas fa-comments"></i>{{ $blog->comments_count }} comment</li>
                                </ul>
                                <a class="title"
                                    href="{{ route('blogs.details', $blog->slug) }}">{!! truncateTitle($blog->title, 25) !!}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($blogs->isEmpty())
                    <h5 class="text-center my-4">No Blogs Found For This Category!</h5>
                @endif
            </div>
            @if ($blogs->hasPages())
                <div class="fp__pagination mt_35">
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    {{ $blogs->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
