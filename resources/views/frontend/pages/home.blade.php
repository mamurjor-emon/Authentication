@extends('layouts.frontend')
@section('title',$title)
@section('content')
    <!-- Slider Area -->
    @include('frontend.pages.home.silder')
    <!--/ End Slider Area -->

    <!-- Start schedule Area -->
    @include('frontend.pages.home.schedule')
    <!--/End Start schedule Area -->

    <!-- Feautes -->
    @include('frontend.pages.home.feautes')
    <!--/ End Feautes -->

    <!-- Fun-facts -->
    @include('frontend.pages.home.fun-facts')
    <!--/ End Fun-facts -->

    <!-- Why choose -->
    @include('frontend.pages.home.why-choose')
    <!--/ End Why choose -->

    <!-- Call to action -->
    @include('frontend.pages.home.call-action')
    <!--/ End Call to action -->

    <!-- Portfolio -->
    @include('frontend.pages.home.portfolio')
    <!--/ End Portfolio -->

    <!-- Service -->
    @include('frontend.pages.home.services')
    <!--/ End service -->

    <!--Pricing Table -->
    @include('frontend.pages.home.pricing-table')
    <!--/ End Pricing Table -->

    <!--Team Section -->
    @include('frontend.pages.home.team')
    <!--/ End Team Section -->

    <!--  Blog Area -->
    @include('frontend.pages.home.blog')
    <!--/ End Blog Area -->

    <!-- Clients -->
    @include('frontend.pages.home.clients')
    <!--/ End Clients -->

    <!-- Appointment -->
    @include('frontend.pages.home.appointment')
    <!-- End Appointment -->

    <!--  Newsletter Area -->
    @include('frontend.pages.home.newsletter')
    <!-- /End Newsletter Area -->
@endsection
