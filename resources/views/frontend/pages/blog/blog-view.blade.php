@extends('layouts.frontend')
@section('title', $title)
@section('content')
    <!-- Single News -->
    <section class="news-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-main">
                                <!-- News Head -->
                                <div class="news-head">
                                    <img src="{{ asset($blog->image ?? '') }}" alt="Blog Image">
                                </div>
                                <!-- News Title -->
                                <h1 class="news-title"><a
                                        href="{{ route('frontend.blog', ['id' => $blog->id]) }}">{{ $blog->title }}</a>
                                </h1>
                                <!-- Meta -->
                                <div class="meta">
                                    <div class="meta-left">
                                        <span class="author"><a href="#"><img
                                                    src="{{ asset($blog->user->avatar ?? '') }}"
                                                    alt="{{ $blog->user->fname }}">{{ $blog->user->fname }}
                                                {{ $blog->user->lname }}</a></span>
                                        <span class="date"><i
                                                class="fa fa-clock-o"></i>{{ $blog->created_at->format('d M, Y') }}</span>
                                    </div>
                                    <div class="meta-right">
                                        <span class="comments"><a href="#"><i class="fa fa-comments"></i>05
                                                Comments</a></span>
                                        <span class="views"><i
                                                class="fa fa-eye"></i>{{ formatNumber($blog->total_view ?? 0) }}</span>
                                    </div>
                                </div>
                                <!-- News Text -->
                                <div class="news-text">
                                    {!! $blog->f_discrption ?? '' !!}
                                    @if ($blog->f_image != null || $blog->l_image != null)
                                        <div class="image-gallery">
                                            <div class="row">
                                                @if ($blog->f_image != null)
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="single-image">
                                                            <img src="{{ asset($blog->f_image ?? '') }}" alt="First Image">
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($blog->l_image != null)
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="single-image">
                                                            <img src="{{ asset($blog->l_image ?? '') }}"
                                                                alt="Second Image">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    {!! $blog->s_discrption ?? '' !!}
                                    @if ($blog->t_discrption != null)
                                        <blockquote class="overlay">
                                            {!! $blog->t_discrption ?? '' !!}
                                        </blockquote>
                                    @endif
                                    {!! $blog->l_discrption ?? '' !!}
                                </div>
                                <div class="blog-bottom">
                                    <!-- Social Share -->
                                    <ul class="social-share">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="blog-comments">
                                <h2>All Comments</h2>
                                <div class="comments-body">
                                    <!-- Single Comments -->
                                    <div class="single-comments">
                                        <div class="main">
                                            <div class="head">
                                                <img src="img/author1.jpg" alt="#" />
                                            </div>
                                            <div class="body">
                                                <h4>Afsana Mimi</h4>
                                                <div class="comment-meta"><span class="meta"><i
                                                            class="fa fa-calendar"></i>March 05, 2019</span><span
                                                        class="meta"><i class="fa fa-clock-o"></i>03:38 AM</span></div>
                                                <p>Lorem Ipsum available, but the majority have suffered alteration in some
                                                    form, by injected humour, or randomised words Mirum est notare quam
                                                    littera gothica, quam nunc putamus parum claram, anteposuerit litterarum
                                                    formas</p>
                                                <a href="#"><i class="fa fa-reply"></i>replay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Single Comments -->
                                    <!-- Single Comments -->
                                    <div class="single-comments left">
                                        <div class="main">
                                            <div class="head">
                                                <img src="img/author2.jpg" alt="#" />
                                            </div>
                                            <div class="body">
                                                <h4>Naimur Rahman</h4>
                                                <div class="comment-meta"><span class="meta"><i
                                                            class="fa fa-calendar"></i>March 05, 2019</span><span
                                                        class="meta"><i class="fa fa-clock-o"></i>03:38 AM</span></div>
                                                <p>Lorem Ipsum available, but the majority have suffered alteration in some
                                                    form, by injected humour, or randomised words Mirum est notare quam
                                                    littera gothica, quam nunc putamus parum claram, anteposuerit litterarum
                                                    formas</p>
                                                <a href="#"><i class="fa fa-reply"></i>replay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Single Comments -->
                                    <!-- Single Comments -->
                                    <div class="single-comments">
                                        <div class="main">
                                            <div class="head">
                                                <img src="img/author3.jpg" alt="#" />
                                            </div>
                                            <div class="body">
                                                <h4>Suriya Molharta</h4>
                                                <div class="comment-meta"><span class="meta"><i
                                                            class="fa fa-calendar"></i>March 05, 2019</span><span
                                                        class="meta"><i class="fa fa-clock-o"></i>03:38 AM</span></div>
                                                <p>Lorem Ipsum available, but the majority have suffered alteration in some
                                                    form, by injected humour, or randomised words Mirum est notare quam
                                                    littera gothica, quam nunc putamus parum claram, anteposuerit litterarum
                                                    formas</p>
                                                <a href="#"><i class="fa fa-reply"></i>replay</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Single Comments -->
                                </div>
                            </div>
                        </div>
                        @if (Auth::check() && Auth::user())
                            <div class="col-12">
                                <div class="comments-form">
                                    <h2>Leave Comments</h2>
                                    <!-- Contact Form -->
                                    <form class="form" method="post" action="">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" name="first-name" placeholder="First name"
                                                        required="required" value="{{ Auth::user()->fname ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <i class="fa fa-envelope"></i>
                                                    <input type="text" name="last-name" placeholder="Last name"
                                                        required="required" value="{{ Auth::user()->lname ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <i class="fa fa-envelope"></i>
                                                    <input type="email" name="email" placeholder="Your Email"
                                                        required="required" value="{{ Auth::user()->email ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group message">
                                                    <i class="fa fa-pencil"></i>
                                                    <textarea name="message" rows="7" placeholder="Type Your Message Here"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button type="submit" class="btn primary"><i
                                                            class="fa fa-send"></i>Submit Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/ End Contact Form -->
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <div class="form">
                                <input type="email" placeholder="Search Here...">
                                <a class="button" href="#"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        @if (!empty($resentPosts))
                            <div class="single-widget recent-post">
                                <h3 class="title">Recent post</h3>
                                @if (!empty($resentPosts))
                                    @forelse ($resentPosts as $posts)
                                        <!-- Single Post -->
                                        <div class="single-post">
                                            <div class="image">
                                                <img src="{{ asset($posts->image ?? '') }}" alt="Image">
                                            </div>
                                            <div class="content">
                                                <h5><a href="#">{{ $posts->title }}</a></h5>
                                                <ul class="comment">
                                                    <li><i class="fa fa-calendar"
                                                            aria-hidden="true"></i>{{ $posts->created_at->format('d M, Y') }}
                                                    </li>
                                                    <li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Single Post -->
                                    @empty
                                    @endforelse
                                @endif
                            </div>
                        @endif
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        @if (!empty($categories))
                            <div class="single-widget category">
                                <h3 class="title">Blog Categories</h3>
                                <ul class="categor-list">
                                    @if (!empty($categories))
                                        @forelse ($categories as $categorie)
                                            <li><a href="#">{{ $categorie->categorie_name ?? '' }}</a></li>
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </div>
                        @endif
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        @if ($blog->tag_ids != null)
                            <div class="single-widget side-tags">
                                <h3 class="title">Tags</h3>
                                <ul class="tag">
                                    @if ($blog->tag_ids != null)
                                        @php
                                            $getTags = json_decode($blog->tag_ids);
                                        @endphp
                                    @endif
                                    @if (!empty($getTags))
                                        @forelse ($getTags as $getTag)
                                            @php
                                                $dbTag = DB::table('blog_tags')
                                                    ->where('id', $getTag)
                                                    ->first();
                                            @endphp
                                            <li><a href="javascript:">{{ $dbTag->tag_name }}</a></li>
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </div>

                        @endif
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Single News -->
@endsection
