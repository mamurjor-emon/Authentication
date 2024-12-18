<!-- Start portfolio -->
<section class="portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ config('settings.portfolio_section_title') ?? '' }}</h2>
                    <img src="{{ asset(config('settings.common_image')) ?? '' }}" alt="image">
                    <p>{{ config('settings.portfolio_section_description') ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel portfolio-slider">
                    @if (!empty($portfolioDatas))
                        @forelse ($portfolioDatas as $portfolioData)
                            <div class="single-pf">
                                <img src="{{ asset($portfolioData->image ?? '') }}" alt="image">
                                <a href="{{ route('frontend.portfolio',['id' =>$portfolioData->id ]) }}"
                                    target="{{ $portfolioData->btn_target == 1 ? '_blank' : '' }}"
                                    class="btn">{{ $portfolioData->btn_title }}</a>
                            </div>
                        @empty
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End portfolio -->
