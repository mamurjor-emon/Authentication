<section id="team" class="team section overlay commonbg" data-stellar-background-ratio="0.5" style="background-image: url('{{ asset(config('settings.team_image') ?? '') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ config('settings.team_section_title') ?? '' }}</h2>
                    <img src="{{ asset(config('settings.common_white_image')) ?? '' }}" alt="image">
                    <p>{{ config('settings.team_section_description') ?? ''}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($teamMembers->take(4) as $teams)
                @forelse ($teams->doctors->take(1) as $doctor)
                <div class="col-lg-3 col-md-6 col-12" data-tilt="" style="will-change: transform; transform: perspective(300px) rotateX(0deg) rotateY(0deg);">
                    <!-- Single Team -->
                    <div class="single-team">
                        <div class="t-head">
                            <img src="{{ asset($doctor->image ?? '') }}" alt="user">
                            <div class="t-icon">
                                <a href="" class="btn">Get Appointment</a>
                            </div>
                        </div>
                        <div class="t-bottom">
                            <p>{{ $teams->name }}</p>
                            <h2><a href="{{ route('frontend.single.doctors',['id' => $doctor->id]) }}">{{  $doctor->user->fname ?? '--' .' '.  $doctor->user->fname != null ? $doctor->user->lname : '--' }}</a></h2>
                        </div>
                    </div>
                    <!-- End Single Team -->
                </div>
                @empty

                @endforelse
            @empty
            @endforelse
        </div>
        <div class="mt-5 d-flex justify-content-center align-items-center">
            <a href="{{ route('frontend.doctors') }}"  class="btn view-doctor mt-5">View All Doctors</a>
        </div>
    </div>
</section>
