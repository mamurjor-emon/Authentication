 <!-- Slider Area -->
 <section class="slider">
     <div class="hero-slider">
         <!-- Start Single Slider -->
         @if (!empty($silders))
             @forelse ($silders->take(5) as $silder)
                 <div class="single-slider" style="background-image:url({{ asset($silder->image) }})">
                     <div class="container">
                         <div class="row">
                             <div class="col-lg-7">
                                 <div class="text">
                                     <h1>{{ $silder->f_title ?? '' }}<span>{{ $silder->f_spcial_title }}</span>
                                         {{ $silder->l_title }}<span>{{ $silder->l_spcial_title }}</span></h1>
                                     {!! $silder->description !!}
                                     <div class="button">
                                         <a href="{{ $silder->f_btn_url }}" class="btn"
                                             target="{{ $silder->f_btn_target == 0 ? '' : '_blank' }}">{{ $silder->f_btn_title }}</a>
                                         <a href="{{ $silder->l_btn_url }}" class="btn primary"
                                             target="{{ $silder->l_btn_target == 0 ? '' : '_blank' }}">{{ $silder->l_btn_title }}</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             @empty
             @endforelse
         @endif
         <!-- End Single Slider -->
     </div>
 </section>
 <!--/ End Slider Area -->
