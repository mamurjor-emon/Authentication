
    <!-- Start portfolio -->
    <section class="portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ $portfolioSection->title ?? '' }}</h2>
                        <img src="{{ asset('frontend/assets/img/section-img.png') }}" alt="#">
                        {!! $portfolioSection->discrption !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="owl-carousel portfolio-slider">
                        <div class="single-pf">
                            <img src="{{ asset('frontend/assets/img/pf1.jpg') }}" alt="#">
                            <a href="portfolio-details.html" class="btn">View Details</a>   
                        </div>
                        <div class="single-pf">
                            <img src="{{ asset('frontend/assets/img/pf2.jpg') }}" alt="#">
                            <a href="portfolio-details.html" class="btn">View Details</a>
                        </div>
                        <div class="single-pf">
                            <img src="{{ asset('frontend/assets/img/pf3.jpg') }}" alt="#">
                            <a href="portfolio-details.html" class="btn">View Details</a>
                        </div>
                        <div class="single-pf">
                            <img src="{{ asset('frontend/assets/img/pf4.jpg') }}" alt="#">
                            <a href="portfolio-details.html" class="btn">View Details</a>
                        </div>
                        <div class="single-pf">
                            <img src="{{ asset('frontend/assets/img/pf1.jpg') }}" alt="#">
                            <a href="portfolio-details.html" class="btn">View Details</a>
                        </div>
                        <div class="single-pf">
                            <img src="{{ asset('frontend/assets/img/pf2.jpg') }}" alt="#">
                            <a href="portfolio-details.html" class="btn">View Details</a>
                        </div>
                        <div class="single-pf">
                            <img src="{{ asset('frontend/assets/img/pf3.jpg') }}" alt="#">
                            <a href="portfolio-details.html" class="btn">View Details</a>
                        </div>
                        <div class="single-pf">
                            <img src="{{ asset('frontend/assets/img/pf4.jpg') }}" alt="#">
                            <a href="portfolio-details.html" class="btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End portfolio -->
