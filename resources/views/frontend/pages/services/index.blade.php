@extends('layouts.frontend')
@section('title', $title)
@section('content')
 <!-- Service -->
 @include('frontend.pages.home.services')
 <!--/ End service -->

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
