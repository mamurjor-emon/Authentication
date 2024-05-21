@extends('layouts.frontend')
@section('title', $title)
@section('content')
<div class="doctor-details-area section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="doctor-details-item doctor-details-left">
                    <img src="{{ asset($singleDoctor->image ?? '') }}" alt="#">
                    <div class="doctor-details-contact">
                        <h3>Contact info</h3>
                        <ul class="basic-info">
                            @if ($singleDoctor->phone)
                             <li><i class="icofont-ui-call"></i> Call : {{ $singleDoctor->phone ?? '' }}</li>
                            @endif

                            @if ($singleDoctor->user->email)
                             <li> <i class="icofont-ui-message"></i> Email : {{ $singleDoctor->user->email ?? '' }}</li>
                            @endif

                            @if ($singleDoctor->location)
                             <li> <i class="icofont-location-pin"></i> Location : {{ $singleDoctor->location }}</li>
                            @endif
                        </ul>
                        <!-- Social -->
                        <ul class="social">
                            @if ($singleDoctor->facebook)
                             <li><a href="{{ $singleDoctor->facebook }}"><i class="icofont-facebook"></i></a></li>
                            @endif
                            {{-- @if ($singleDoctor->user->email)
                            <li><a href="{{ $singleDoctor->user->email }}" target="_blank"><i class="icofont-google-plus"></i></a></li>
                            @endif --}}
                            @if ($singleDoctor->twitter)
                            <li><a href="{{  $singleDoctor->twitter }}"><i class="icofont-twitter"></i></a></li>
                            @endif
                            @if ($singleDoctor->vimo)
                            <li><a href="{{ $singleDoctor->vimo }}"><i class="icofont-vimeo"></i></a></li>
                            @endif
                            @if ($singleDoctor->pinterest)
                            <li><a href="{{ $singleDoctor->pinterest }}"><i class="icofont-pinterest"></i></a></li>
                            @endif
                        </ul>
                        <!-- End Social -->
                        <div class="doctor-details-work">
                            <h3>Working hours</h3>
                            {!! $singleDoctor->workday !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="doctor-details-item">
                    <div class="doctor-details-right">
                        <div class="doctor-name">
                            <h3 class="name">{{ $singleDoctor->user->fname .' '. $singleDoctor->user->lname}}</h3>
                            <p class="deg">{{ $singleDoctor->department->name }}.</p>
                            @if ($singleDoctor->fdegree != null)
                            <p class="degree">{{ $singleDoctor->fdegree }}</p>
                            @endif
                            @if ($singleDoctor->sdegree != null)
                            <p class="degree">{{ $singleDoctor->sdegree }}</p>
                            @endif
                            @if ($singleDoctor->tdegree != null)
                            <p class="degree">{{ $singleDoctor->tdegree }}</p>
                            @endif
                            @if ($singleDoctor->ldegree != null)
                            <p class="degree">{{ $singleDoctor->ldegree }}</p>
                            @endif
                        </div>
                        @if ($singleDoctor->fbiography)
                            <div class="doctor-details-biography">
                                <h3>Biography</h3>
                                {!! $singleDoctor->fbiography !!}
                            </div>
                        @endif
                        @if ($singleDoctor->education)
                            <div class="doctor-details-biography">
                                <h3>Education</h3>
                                {!! $singleDoctor->education !!}
                            </div>
                        @endif
                        @if ($singleDoctor->lbiography)
                            <div class="doctor-details-biography">
                                <h3>Biography</h3>
                                {!! $singleDoctor->lbiography !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
