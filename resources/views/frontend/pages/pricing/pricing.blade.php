@extends('layouts.frontend')
@section('title', $title)
@section('content')
 <!-- Service -->
 @include('frontend.pages.home.pricing-table')
 <!--/ End service -->

 <!-- Clients -->
 @include('frontend.pages.home.clients')
 <!--/ End Clients -->

  <!--  Newsletter Area -->
  @include('frontend.pages.home.newsletter')
  <!-- /End Newsletter Area -->
@endsection
