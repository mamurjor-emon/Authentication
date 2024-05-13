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
                @dd($testimonials)
                <div class="owl-carousel testimonial-slider">
                    <div class="single-testimonial">
                        <img src="img/testi3.png" alt="#">
                        <p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit
                            turpis, vel pretium eros. </p>
                        <h4 class="name">Naimur Rahman</h4>
                    </div>
                    <div class="single-testimonial">
                        <img src="img/testi3.png" alt="#">
                        <p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit
                            turpis, vel pretium eros. </p>
                        <h4 class="name">Naimur Rahman</h4>
                    </div>
                    <div class="single-testimonial">
                        <img src="img/testi3.png" alt="#">
                        <p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit
                            turpis, vel pretium eros. </p>
                        <h4 class="name">Naimur Rahman</h4>
                    </div>
                    <div class="single-testimonial">
                        <img src="img/testi3.png" alt="#">
                        <p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit
                            turpis, vel pretium eros. </p>
                        <h4 class="name">Naimur Rahman</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial -->
