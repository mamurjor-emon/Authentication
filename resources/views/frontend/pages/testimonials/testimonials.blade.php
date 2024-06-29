@extends('layouts.frontend')
@section('title', $title)
@section('content')
    <div class="pt-5 mt-5">
        <!-- Service -->
        @include('frontend.pages.home.feautes')
        <!--/ End service -->

        <!-- Clients -->
        @include('frontend.pages.home.clients')
        <!--/ End Clients -->

        <!-- Services -->
        @include('frontend.pages.home.services')
        <!-- End Services -->

        <!-- Testimonials -->
        @include('frontend.pages.home.testimonials')
        <!-- End Testimonials -->

        <!--  Newsletter Area -->
        @include('frontend.pages.home.newsletter')
        <!-- /End Newsletter Area -->
    </div>
@endsection
