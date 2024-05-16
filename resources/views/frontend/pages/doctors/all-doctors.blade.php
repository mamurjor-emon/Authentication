@extends('layouts.frontend')
@section('title', $title)
@section('content')
    <section id="team" class="team section single-page">
        <div class="container">
            <div class="row">
                @forelse ($doctors as $doctor)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Team -->
                        <div class="single-team">
                            <div class="t-head">
                                <img src="{{ asset($doctor->image) }}" alt="image">
                                <div class="t-icon">
                                    <a href="" class="btn">Get Appointment</a>
                                </div>
                            </div>
                            <div class="t-bottom">
                                <p>{{ $doctor->department->name }}</p>
                                <h2><a href="{{ route('frontend.single.doctors',['id' => $doctor->id]) }}">{{ $doctor->user->fname .' '. $doctor->user->lname }}</a></h2>
                            </div>
                        </div>
                        <!-- End Single Team -->
                    </div>
                @empty
                    <p class="text-center text-danger">No Doctor Found</p>
                @endforelse
            </div>
        </div>
    </section>
     <!--  Newsletter Area -->
     @include('frontend.pages.home.newsletter')
     <!-- /End Newsletter Area -->
@endsection
