<!-- Start Testimonial -->
<section class="section testimonials overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{ asset(config('settings.testimonials_image') ?? '') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ $testimonialSection->title }}</h2>
                    <img src="{{ config('settings.common_white_image') ?? '' }}" alt="image">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel testimonial-slider">
                    @forelse ($testimonials as $data)
                    <div class="single-testimonial">
                        @if ($data->user->avatar != null)
                            <img src="{{ asset($data->user->avatar) }}" alt="image">
                        @else
                         <img src="{{ asset('common/5907-removebg-preview.png') }}"alt="Avatar" />
                        @endif
                        {!! $data->review !!}
                        <h4 class="name">{{ $data->user->fname . ' ' . $data->user->lname}}</h4>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial -->
