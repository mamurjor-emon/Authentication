<!-- Start Call to action -->
<section class="call-action overlay commonbg" data-stellar-background-ratio="0.5" style="background-image: url('{{ asset(config('settings.call_action_image') ?? '') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content">
                    <h2>{{ config('settings.call_to_title') ?? '' }}</h2>
                    {!! config('settings.call_to_sub_title') ?? '' !!}
                    <div class="button">
                        <a href="{{ config('settings.call_to_f_btn_url') ?? '' }}" target="{{ config('settings.call_to_f_btn_target') == 0 ? '_self' : '_blank' }}" class="btn">{{ config('settings.call_to_f_btn_title') ?? '' }}</a>
                        <a href="{{ config('settings.call_to_l_btn_url') ?? '' }}" target="{{ config('settings.call_to_l_btn_target') == 0 ? '_self' : '_blank' }}" class="btn second">{{ config('settings.call_to_l_btn_title') ?? '' }}<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Call to action -->




