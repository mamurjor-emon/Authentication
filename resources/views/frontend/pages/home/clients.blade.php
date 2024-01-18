   <!-- Start clients -->
   <div class="clients overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="owl-carousel clients-slider">
                    @forelse ($clientDatas as $clientData)
                    <div class="single-clients">
                        <img src="{{ asset($clientData->image ?? '') }}" alt="{{ $clientData->name ?? '' }}">
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!--/End clients -->
