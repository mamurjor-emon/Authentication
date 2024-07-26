@extends('layouts.frontend')
@section('title', $title)
@section('content')
    <!-- Single News -->
    <section class="news-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        @if (!empty($blogs))
                            @forelse ($blogs->take(5) as $blog)
                                <div class="col-12">
                                    <div class="single-main">
                                        <!-- News Head -->
                                        <div class="news-head">
                                            <img src="{{ asset($blog->image ?? '') }}" alt="Blog Image">
                                        </div>
                                        <!-- News Title -->
                                        <h1 class="news-title"><a onclick="countView({{ $blog->id }})"
                                                href="{{ route('frontend.blog', ['id' => $blog->id]) }}">{{ $blog->title }}</a>
                                        </h1>
                                        <!-- Meta -->
                                        <div class="meta">
                                            <div class="meta-left">
                                                <span class="author">
                                                    <a href="#">
                                                        @if ($blog->user->avatar != null)
                                                            <img
                                                                src="{{ asset($blog->user->avatar ?? '') }}"alt="{{ $blog->user->fname }}">
                                                        @else
                                                            <img src="{{ asset('common/5907-removebg-preview.png') }}"
                                                                alt="Avatar" />
                                                        @endif
                                                        {{ $blog->user->fname }} {{ $blog->user->lname }}
                                                    </a>
                                                </span>
                                                <span class="date"><i
                                                        class="fa fa-clock-o"></i>{{ $blog->created_at->format('d M, Y') }}</span>
                                            </div>
                                            <div class="meta-right">
                                                @php
                                                    $blogComments = App\Models\BlogComment::where('blog_id', $blog->id)
                                                        ->where('comment_id', null)
                                                        ->get();
                                                @endphp
                                                <span class="comments"><a href="javascript:"><i
                                                            class="fa fa-comments"></i>{{ $blogComments->count() > 1 ? $blogComments->count() . ' Comments' : $blogComments->count() . ' Comment' }}
                                                    </a></span>
                                                <span class="views"><i
                                                        class="fa fa-eye"></i>{{ formatNumber($blog->total_view ?? 0) }}
                                                    {{ 'View' }}</span>
                                            </div>
                                        </div>
                                        <!-- News Text -->
                                        <div class="news-text">
                                            {!! $blog->f_discrption ?? '' !!}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-danger text-center">No Categorie Blog Found !!</p>
                            @endforelse
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search position-relative">
                            <div class="form">
                                <input type="text" placeholder="Search Here..." id="blog_search">
                                <a class="button" href="javascrpt:"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div id="search-result">

                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        @if (!empty($resentPosts))
                            <div class="single-widget recent-post">
                                <h3 class="title">Recent post</h3>
                                @if (!empty($resentPosts))
                                    @forelse ($resentPosts as $posts)
                                        @php
                                            $blogComments = App\Models\BlogComment::where('blog_id', $posts->id)
                                                ->where('comment_id', null)
                                                ->get();
                                        @endphp
                                        <!-- Single Post -->
                                        <div class="single-post">
                                            <div class="image">
                                                <img src="{{ asset($posts->image ?? '') }}" alt="Image">
                                            </div>
                                            <div class="content">
                                                <h5><a onclick="countView({{ $posts->id }})" href="{{ route('frontend.blog',['id' =>$posts->id ]) }}">{{ $posts->title }}</a></h5>
                                                <ul class="comment">
                                                    <li><i class="fa fa-calendar"
                                                            aria-hidden="true"></i>{{ $posts->created_at->format('d M, Y') }}
                                                    </li>
                                                    <li><i class="fa fa-commenting-o"
                                                            aria-hidden="true"></i>{{ $blogComments->count() }}
                                                    </li>
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
                                            <li><a
                                                    href="{{ route('frontend.categorie.blog', ['id' => $categorie->id]) }}">{{ $categorie->categorie_name ?? '' }}</a>
                                            </li>
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </div>
                        @endif
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Single News -->
    <!--Include Comment Replay Modal-->
@endsection
@push('scripts')
    <script>
        $(document).on('keyup', '#blog_search', function() {
            var data = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('frontend.blog.search') }}",
                data: {
                    _token: _token,
                    data: data
                },
                success: function(res) {
                    var getId = $('#search-result').html('');
                    if (res.status == 'success') {
                        getId.html('');
                        getId.html(res.data);
                    } else {
                        getId.html('');
                    }
                }
            });
        })
    </script>
@endpush
