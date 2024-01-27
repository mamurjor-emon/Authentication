  <!-- Start Schedule Area -->
  <section class="schedule">
      <div class="container">
          <div class="schedule-inner">
              <div class="row">
                  @if (!empty($schedules))
                      @forelse ($schedules->take(3) as $schedule)
                          <div class="col-lg-4 col-md-6 col-12 ">
                              <!-- single-schedule -->
                              <div class="single-schedule first">
                                  <div class="inner">
                                      <div class="icon">
                                          {!! $schedule->icon !!}
                                      </div>
                                      <div class="single-content">
                                          <span>{{ $schedule->title }}</span>
                                          <h4>{{ $schedule->sub_title }}</h4>
                                          {!! $schedule->discription !!}
                                          <a href="{{ $schedule->url }}"
                                              target="{{ $schedule->target == 0 ? '' : '_blank' }}">{{ $schedule->btn_title }}<i
                                                  class="fa fa-long-arrow-right"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @empty
                      @endforelse
                  @endif
              </div>
          </div>
      </div>
  </section>
  <!--/End Start schedule Area -->
