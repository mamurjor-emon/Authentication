  <!-- Start service -->
  <section class="services section">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="section-title">
                      <h2>{{ $servicesSection->title ?? '' }}</h2>
                      <img src="{{ config('settings.common_image') ?? '' }}" alt="image">
                      {!! $servicesSection->discrption !!}
                  </div>
              </div>
          </div>
          <div class="row">
              @if (!empty($servicesDatas))
                  @forelse ($servicesDatas->take(6) as $servicesData)
                      <div class="col-lg-4 col-md-6 col-12">
                          <!-- Start Single Service -->
                          <div class="single-service">
                              {!! $servicesData->icon !!}
                              <h4><a href="{{ $servicesData->title_url }}"
                                      target="{{ $servicesData->title_target == 1 ? '_blank' : '' }}">{{ $servicesData->title ?? '' }}</a>
                              </h4>
                              {!! $servicesData->discrption !!}
                          </div>
                          <!-- End Single Service -->
                      </div>
                  @empty
                  @endforelse
              @endif
          </div>
      </div>
  </section>
  <!--/ End service -->
