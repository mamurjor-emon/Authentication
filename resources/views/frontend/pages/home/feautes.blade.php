<!-- Start Feautes -->
<section class="Feautes section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ $feautesTitle->title }}</h2>
                    <img src="img/section-img.png" alt="#">
                    {!! $feautesTitle->discrption !!}
                </div>
            </div>
        </div>
        <div class="row">
            @if (!empty($feautes))
                @forelse ($feautes->take(3) as $feaute)
                    <div class="col-lg-4 col-12">
                        <!-- Start Single features -->
                        <div class="single-features {{ $loop->last ? 'last' : '' }}">
                            <div class="signle-icon">
                                {!! $feaute->icon !!}
                            </div>
                            <h3>{{ Str::limit($feaute->title, 20) }} </h3>
                            {!! Str::limit($feaute->discrption, 80) !!}
                        </div>
                        <!-- End Single features -->
                    </div>
                @empty
                @endforelse
            @endif
        </div>
    </div>
</section>
<!--/ End Feautes -->
