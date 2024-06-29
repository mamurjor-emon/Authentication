<!-- Pricing Table -->
<section class="pricing-table section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ $pricingSection->title }}</h2>
                    <img src="{{ asset(config('settings.common_image')) ?? '' }}" alt="image">
                    {!! $pricingSection->discrption !!}
                </div>
            </div>
        </div>
        <div class="row">
            @if (!empty($pricingDatas))
                @forelse ($pricingDatas->take(3) as $pricingData)
                    <!-- Single Table -->
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="single-table">
                            <!-- Table Head -->
                            <div class="table-head">
                                <div class="icon">
                                    {!! $pricingData->icon ?? '' !!}
                                </div>
                                <h4 class="title">{{ $pricingData->title ?? '' }}</h4>
                                <div class="price">
                                    <p class="amount">
                                        {{ $pricingData->price ?? '' }}<span>{{ $pricingData->price_label ?? '' }}</span>
                                    </p>
                                </div>
                            </div>
                            <!-- Table List -->
                            {!! $pricingData->discrption ?? '' !!}
                            <div class="table-bottom">
                                <a class="btn" href="{{ $pricingData->btn_url ?? '' }}"
                                    target="{{ $pricingData->btn_target == 1 ? '_blank' : '' }}">{{ $pricingData->btn_title ?? '' }}</a>
                            </div>
                            <!-- Table Bottom -->
                        </div>
                    </div>
                    <!-- End Single Table-->
                @empty
                @endforelse
            @endif
        </div>
    </div>
</section>
<!--/ End Pricing Table -->
