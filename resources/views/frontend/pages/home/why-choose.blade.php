
    <!-- Start Why choose -->
    <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ config('settings.why_choose_section_title') ?? '' }}</h2>
                        <img src="{{ asset(config('settings.common_image')) ?? '' }}" alt="image">
                       <p>{{ config('settings.why_choose_section_description') ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <!-- Start Choose Left -->
                    <div class="choose-left">
                        <h3>{{ config('settings.why_choose_title')  ?? '' }}</h3>
                        {!! config('settings.why_choose_f_title')  ?? '' !!}
                        {!! config('settings.why_choose_s_title')  ?? '' !!}
                        <div class="row">
                            {!! config('settings.why_choose_t_title')  ?? '' !!}
                        </div>
                    </div>
                    <!-- End Choose Left -->
                </div>
                <div class="col-lg-6 col-12">
                    <!-- Start Choose Rights -->
                    <div class="choose-right" style="background-image: url({{ asset(config('settings.why_choose_image'))  ?? '' }});">
                        <div class="video-image">
                            <!-- Video Animation -->
                            <div class="promo-video">
                                <div class="waves-block">
                                    <div class="waves wave-1"></div>
                                    <div class="waves wave-2"></div>
                                    <div class="waves wave-3"></div>
                                </div>
                            </div>
                            <!--/ End Video Animation -->
                            <a href="{{ config('why_choose_youtube_url')  ?? '' }}"
                                class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                    <!-- End Choose Rights -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Why choose -->
