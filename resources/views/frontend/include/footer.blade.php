@php
    $footerone = DB::table('footer_ones')
        ->where('status', '1')
        ->first();
    $footer_socals = json_decode($footerone->socal_media);

    $footertwoleft = DB::table('footer_twos')
        ->where('status', '1')
        ->where('side', 0)
        ->get();
    $footertworight = DB::table('footer_twos')
        ->where('status', '1')
        ->where('side', 1)
        ->get();

    $footerthree = DB::table('footer_threes')
        ->where('status', '1')
        ->first();

    $footerfour = DB::table('footer_fours')
        ->where('status', '1')
        ->first();
    $footerBottom = DB::table('footer_bottoms')
        ->where('status', '1')
        ->first();

@endphp

<!-- Footer Area -->
<footer id="footer" class="footer ">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>{{ $footerone->title ?? '' }}</h2>
                        {!! $footerone->discrption !!}
                        <!-- Social -->
                        <ul class="social">
                            @if (!empty($footer_socals))
                                @forelse ($footer_socals as $footer_socal)
                                    @php
                                        $data = DB::table('socal_media')
                                            ->where('id', $footer_socal)
                                            ->first();
                                    @endphp
                                    <li><a target="_blank" href="{{ $data->url . asset('') }}">{!! $data->icon ?? '' !!}</a>
                                    </li>
                                @empty
                                @endforelse
                            @endif
                        </ul>
                        <!-- End Social -->
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer f-link">
                        <h2>{{ config('settings.footertwotitle') ?? '' }}</h2>
                        <div class="row">
                            @if (!empty($footertwoleft))
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        @forelse ($footertwoleft as $twoleft)
                                            <li><a href="{{ $twoleft->url ?? '' }}"
                                                    target="{{ $twoleft->target == 1 ? '_blank' : '' }}"><i
                                                        class="fa fa-caret-right"
                                                        aria-hidden="true"></i>{{ $twoleft->name ?? '' }}</a> </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @endif
                            @if (!empty($footertworight))
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        @forelse ($footertworight as $twoleft)
                                            <li><a href="{{ $twoleft->url ?? '' }}"
                                                    target="{{ $twoleft->target == 1 ? '_blank' : '' }}"><i
                                                        class="fa fa-caret-right"
                                                        aria-hidden="true"></i>{{ $twoleft->name ?? '' }}</a> </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>{{ $footerthree->title ?? '' }}</h2>
                        {!! $footerthree->sub_title ?? '' !!}
                        <ul class="time-sidual">
                            {!! $footerthree->discription ?? '' !!}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>{{ $footerfour->title ?? '' }}</h2>
                        {!! $footerfour->discription ?? '' !!}
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
    @if (!empty($footerBottom))
        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright-content">
                            <p>{{ $footerBottom->title ?? '' }}<a href="{{ $footerBottom->url ?? '' }}"
                                    target="{{ $footerBottom->target == 1 ? '_blank' : '' }}">{{ $footerBottom->name ?? '' }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Copyright -->
    @endif
</footer>
<!--/ End Footer Area -->
