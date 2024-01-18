<!-- Start Call to action -->
<section class="call-action overlay" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content">
                    <h2>{{ $callToAction->title ?? '' }}</h2>
                    {!! $callToAction->sub_title ?? '' !!}
                    <div class="button">
                        <a href="{{ $callToAction->f_btn_url ?? '' }}" target="{{ $callToAction->f_btn_target ?? '' }}" class="btn">{{ $callToAction->f_btn_title ?? '' }}</a>
                        <a href="{{ $callToAction->l_btn_url ?? '' }}" target="{{ $callToAction->l_btn_target ?? '' }}" class="btn second">{{ $callToAction->l_btn_title ?? '' }}<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Call to action -->
