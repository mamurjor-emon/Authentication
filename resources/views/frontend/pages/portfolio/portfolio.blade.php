@extends('layouts.frontend')
@section('title', $title)
@section('content')
    <!-- Single News -->
    <section class="news-single section">
        <div class="container">
            <div class="row">
              <!-- Start Portfolio Details Area -->
                <section class="pf-details section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="inner-content">
                                    @if (!empty($portfolioDetails->galleryImages))
                                    <div class="image-slider">
                                        <div class="pf-details-slider">
                                            @forelse ($portfolioDetails->galleryImages as $images)
                                                <img src="{{ asset($images->image ?? '') }}" alt="images">
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                    @endif
                                    <div class="date">
                                        @php
                                            $category = DB::table('porfolio_categories')->where('id',$portfolioDetails->category_id)->first();
                                        @endphp
                                        <ul>
                                            <li><span>Category :</span>{{$category->name ?? ''}}</li>
                                            <li><span>Date :</span> {{ $portfolioDetails->date }}</li>
                                            <li><span>Client :</span> {{ $portfolioDetails->client_name  ?? '' }}</li>
                                            <li><span>Ags :</span> {{ $portfolioDetails->age  ?? '' }} {{ 'Years' }}</li>
                                        </ul>
                                    </div>
                                    <div class="body-text">
                                        <h3>{{ $portfolioDetails->title ?? '' }}</h3>
                                       {!! $portfolioDetails->discription ?? '' !!}
                                        <div class="share">
                                            <h4>Share Now -</h4>
                                            <ul>
                                                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="https://twitter.com/intent/tweet?url=&text={{ url()->full() }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=&title={{ url()->full() }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
		<!-- End Portfolio Details Area -->
            </div>
        </div>
    </section>
    <!--/ End Single News -->
    <!--Include Comment Replay Modal-->
@endsection
@push('scripts')
@endpush
