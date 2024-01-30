@if (!empty($blogs))
    <div id="search-result" class="search-result">
        @forelse ($blogs as $blog)
            <!-- Single Post -->
            <div class="single-post">
                <div class="image">
                    @if ($blog->image != null)
                        <img src="{{ asset($blog->image ?? '') }}" alt="Avatar" />
                    @else
                        <img src="{{ asset('common/5907-removebg-preview.png') }}" alt="Avatar" />
                    @endif

                </div>
                <div class="content">
                    <h5><a onclick="countView({{ $blog->id }})"
                            href="{{ route('frontend.blog', ['id' => $blog->id]) }}">{{ $blog->title ?? '' }}</a></h5>
                </div>
            </div>
            <!-- End Single Post -->
        @empty
            <div class="single-post">
                <p class="text-center text-danger">No Blog Found !</p>
            </div>
        @endforelse
    </div>
@endif
