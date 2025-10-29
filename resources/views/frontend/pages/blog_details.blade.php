@extends('frontend.layouts.master')
@section('frontend')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg12">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Blog Details</li>
                </ul>
                <h3>Blog Details Page</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

        <!-- Blog Details Area -->
    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="blog-article">
                        <div class="blog-article-img">
                            <img src="{{ asset($blog->image) }}" alt="Images" style="height: 600px; width:1000px">
                        </div>

                        <div class="blog-article-title">
                            <h2>{!! $blog->title !!}</h2>
                            <ul>

                                <li>
                                    <i class='bx bx-user'></i>
                                    By {{ $blog->user->name }}
                                </li>

                                <li>
                                    <i class='bx bx-calendar'></i>
                                    {{ date('Y-m-d', strtotime($blog->created_at)) }}
                                </li>

                                @php
                                    $comments = App\Models\Comment::where('blog_id', $blog->id)->where('status', 1)->count();
                                @endphp

                                <li>
                                    <i class='bx bx-comment'></i>
                                    {{ $comments }}
                                </li>
                            </ul>
                        </div>

                        <div class="article-content">
                            <p>
                                @if ($blog->post)
                                    {!! $blog->post !!}
                                @else
                                    {!! $blog->short_post !!}
                                @endif
                            </p>
                        </div>

                        @php
                            $comments = App\Models\Comment::where(['blog_id' => $blog->id, 'status' => 1])->limit(5)->get();
                        @endphp

                        <div class="comments-wrap">
                            <h3 class="title">Comments</h3>
                            {{-- @dd($comments) --}}
                            <ul>
                                @foreach ($comments as $comment)
                                    <li>
                                        <img class="rounded-pill" src="{{  asset($comment->user->image) }}" alt="Image" style="height:50px; width:50px">
                                        <h3>{{ $comment->user->name }}</h3>
                                        <span>{{ date('Y-m-d' ,strtotime($comment->created_at)) }}</span>
                                        <p>
                                            {!! $comment->message !!}
                                        </p>

                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="comments-form">
                            <div class="contact-form">
                                <h2>Leave A Comment</h2>
                                @auth
                                    <form id="" action="{{ route('blog.comment.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12">
                                                <button type="submit" class="default-btn btn-bg-three">
                                                    Post A Comment
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <p>Please <a href="{{ route('login') }}">Login</a> to add your comment</p>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="side-bar-wrap">
                        <div class="search-widget">
                            <form class="search-form" action="{{ route('blogs') }}" method="GET">
                                <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search...">
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
                                            <a href="{{ url('/blog/category/list/'.$category->id) }}">{!! $category->category !!}</a>
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
                                        <a href="{{ url('/blog/details/'.$latest->slug) }}" class="thumb">
                                            <span class="full-image cover"><img src="{{ asset($latest->image) }}" alt=""></span>
                                        </a>
                                        <div class="info">
                                            <h4 class="title-text">
                                                <a href="{{ url('blog/details/'.$latest->slug) }}">
                                                    {{Str::limit($latest->title, 20)}}
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
    <!-- Blog Details Area End -->
@endsection
