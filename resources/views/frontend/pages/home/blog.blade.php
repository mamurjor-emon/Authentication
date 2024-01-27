  <!-- Start Blog Area -->
  <section class="blog section" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ $blogsSection->title ?? ''}}</h2>
                    <img src="{{ asset('frontend/assets/img/section-img.png') }}" alt="#">
                    {!! $blogsSection->discrption ?? '' !!}
                </div>
            </div>
        </div>
        <div class="row">
            @if (!empty($blogsDatas))
            @forelse ($blogsDatas->take(3) as $blog)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Blog -->
                <div class="single-news">
                    <div class="news-head positon-relative">
                        <img src="{{ asset($blog->image ?? '') }}" alt="image">
                    </div>
                    @if ($blog->tag == 1)
                    <span id="tag" class="btn btn-sm btn-primary text-white px-4 py-2">New</span>
                    @endif
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date">{{ $blog->created_at->format('d M, Y') }}</div>
                            <h2><a href="{{ route('frontend.blog',['id' => $blog->id ]) }}" onclick="countView({{ $blog->id }})">{{ Str::limit($blog->title,56)  }}</a></h2>
                            {!! Str::limit($blog->sub_title,156) !!}
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            @empty
            @endforelse
            @endif
        </div>
    </div>
</section>
<!-- End Blog Area -->
