
<!-- Footer Area -->
<footer id="footer" class="footer ">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>About Us</h2>
                         {!! config('settings.footer_title') ?? '' !!}
                        <!-- Social -->
                        <ul class="social">
                            @if (config('settings.facebook'))
                                <li><a href="{{ config('settings.facebook') }}"><i class="icofont-facebook"></i></a></li>
                            @endif
                            @if (config('settings.theme_email'))
                                <li><a href="mailto:{{ config('settings.theme_email') ?? '' }}"><i class="icofont-google-plus"></i></a></li>
                            @endif
                            @if (config('settings.twitter'))
                                <li><a href="{{ config('settings.twitter') }}"><i class="icofont-twitter"></i></a></li>
                            @endif
                            @if (config('settings.linkedin'))
                                <li><a href="{{ config('settings.linkedin') }}"><i class="icofont-linkedin"></i></a></li>
                            @endif
                            @if (config('settings.pinterest'))
                                <li><a href="{{ config('settings.pinterest') }}"><i class="icofont-pinterest"></i></a></li>
                            @endif
                        </ul>
                        <!-- End Social -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer f-link">
                        <h2>Quick Links</h2>
                        <div class="row">
                            @if (!empty(config('settings.quik_links_left')))
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        {!! config('settings.quik_links_left') ?? '' !!}
                                    </ul>
                                </div>
                            @endif
                            @if (!empty(config('settings.quik_links_right')))
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        {!! config('settings.quik_links_right') ?? '' !!}
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>Open Hours</h2>
                        {!! config('settings.open_hours_title') ?? '' !!}
                        <ul class="time-sidual">
                            {!! config('settings.open_hours_time') ?? '' !!}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>Newsletter</h2>
                        {!! config('settings.newslettter_title') ?? '' !!}
                        <form action="{{ route('subscribe.store') }}" method="POST" class="newsletter-inner">
                            @csrf
                            <input name="email" placeholder="Email Address" class="common-input"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'"
                                type="email" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}">
                            <button type="submit" class="button"><i class="icofont icofont-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Footer Top -->
    @if (!empty(config('settings.copy_rignts')))
        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright-content">
                            {!! config('settings.copy_rignts') ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Copyright -->
    @endif
</footer>
<!--/ End Footer Area -->
