   <!-- Start Newsletter Area -->
   <section class="newsletter section">
       <div class="container">
           <div class="row ">
               <div class="col-lg-6  col-12">
                   <!-- Start Newsletter Form -->
                   <div class="subscribe-text ">
                       <h6>{{config('settings.newsletter_section_title') ?? '' }}</h6>
                      <p>{{ config('settings.newsletter_section_description') ?? '' }}</p>
                   </div>
                   <!-- End Newsletter Form -->
               </div>
               <div class="col-lg-6  col-12">
                   <!-- Start Newsletter Form -->
                   <div class="subscribe-form ">
                       <form action="{{ route('subscribe.store') }}" method="POST" class="newsletter-inner">
                           @csrf
                           <input name="email" placeholder="Your email address" class="common-input"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'"
                               required type="email" value="{{ Auth::check() ? Auth::user()->email : '' }}">
                           <button type="submit" class="btn">Subscribe</button>
                       </form>
                   </div>
                   <!-- End Newsletter Form -->
               </div>
           </div>
       </div>
   </section>
   <!-- /End Newsletter Area -->
