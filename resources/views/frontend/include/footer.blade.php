
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
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont-vimeo"></i></a></li>
                            <li><a href="#"><i class="icofont-pinterest"></i></a></li>
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
                                type="email" name="email">
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
