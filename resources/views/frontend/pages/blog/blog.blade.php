@extends('layouts.frontend')
@section('title', $title)
@section('content')
    <section class="blog grid section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        @if (!empty($blogs))
                        @forelse ($blogs as $blog)
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="single-news">
                                <div class="news-head">
                                    <img alt="{{ $blog->title ?? '' }}" loading="lazy" width="557" height="373" decoding="async"  style="color: transparent;"
                                        src="{{ asset($blog->image ?? '')}}">
                                </div>
                                <div class="news-body">
                                    <div class="news-content">
                                        <div class="date">{{ $blog->created_at->format('d M, Y') }}</div>
                                        <h2><a onclick="countView({{ $blog->id }})" href="{{ route('frontend.blog', ['id' => $blog->id]) }}">{{ Str::limit($blog->title, 50, '...') }}</a></h2>
                                        <p class="text">{!! Str::limit($blog->f_discrption, 100, '...') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <p class="text-danger text-center">No Blog Found !!</p>
                        @endforelse
                        @endif
                    </div>
                   <div class="mt-5 d-flex justify-content-end align-items-center" id="blogs_pagination">
                        {{ $blogs->links() }}
                   </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <div class="single-widget search position-relative">
                            <div class="form">
                                <input type="text" placeholder="Search Here..." id="blog_search">
                                <a class="button" href="javascrpt:"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div id="search-result">

                        </div>
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
                                                <h5><a onclick="countView({{ $posts->id }})"
                                                        href="{{ route('frontend.blog', ['id' => $posts->id]) }}">{{ $posts->title }}</a>
                                                </h5>
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
                                                $dbTag = DB::table('blog_tags')->where('id', $getTag)->first();
                                            @endphp
                                            <li><a href="javascript:">{{ $dbTag->tag_name }}</a></li>
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
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
