   <!-- Start clients -->
   <div class="clients overlay commonbg" style="background-image: url('{{ asset(config('settings.client_image') ?? '') }}')">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 col-md-12 col-12">
                   <div class="owl-carousel clients-slider">
                       @if (!empty($clientDatas))
                           @forelse ($clientDatas as $clientData)
                               <div class="single-clients">
                                   <img src="{{ asset($clientData->image ?? '') }}" alt="{{ $clientData->name ?? '' }}">
                               </div>
                           @empty
                           @endforelse
                       @endif
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!--/End clients -->
