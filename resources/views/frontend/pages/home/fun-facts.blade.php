 <!-- Start Fun-facts -->
 <div id="fun-facts" class="fun-facts section overlay commonbg" style="background-image: url('{{ asset(config('settings.funfact_image') ?? '') }}')">
     <div class="container">
         <div class="row">
             @if (!empty($funFacts))
                 @forelse ($funFacts->take(4) as $funFact)
                     <div class="col-lg-3 col-md-6 col-12">
                         <!-- Start Single Fun -->
                         <div class="single-fun">
                             {!! $funFact->icons !!}
                             <div class="content">
                                 <span class="counter">{{ $funFact->counter }}</span>
                                 <p>{{ $funFact->title }}</p>
                             </div>
                         </div>
                         <!-- End Single Fun -->
                     </div>
                 @empty
                 @endforelse
             @endif
         </div>
     </div>
 </div>
 <!--/ End Fun-facts -->
