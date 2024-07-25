<!-- Start Call to action -->
<section class="call-action overlay commonbg" data-stellar-background-ratio="0.5" style="background-image: url('{{ asset(config('settings.call_action_image') ?? '') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content">
                    <h2>{{ $callToAction->title ?? '' }}</h2>
                    {!! $callToAction->sub_title ?? '' !!}
                    <div class="button">
                        <a href="{{ $callToAction->f_btn_url ?? '' }}" target="{{ $callToAction->f_btn_target == 0 ? '_self' : '_blank' }}" class="btn">{{ $callToAction->f_btn_title ?? '' }}</a>
                        <a href="{{ $callToAction->l_btn_url ?? '' }}" target="{{ $callToAction->l_btn_target == 0 ? '_self' : '_blank' }}" class="btn second">{{ $callToAction->l_btn_title ?? '' }}<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Call to action -->
