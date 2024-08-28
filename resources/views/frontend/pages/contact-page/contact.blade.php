@extends('layouts.frontend')
@section('title', $title)
@push('styles')
    <style>
        .contact-us .contact-us-left {
            width: 100%;
            height: 100%;
        }

        .contact-us #myMap,
        .contact-us #myMap iframe {
            height: 100%;
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <!-- Contact Start -->
    <section class="contact-us section">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-us-left">
                            <div id="myMap">
                                {!! config('settings.con_map_url') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-us-form">
                            <h2>{{ config('settings.con_title') ?? '' }}</h2>
                            <p>{{ config('settings.con_sub_title') ?? '' }}</p>
                            <form class="form" method="POST" action="{{ route('frontend.frontend.contact.store') }}">
                                @csrf
                                <div class="row">
                                    <x-form.textbox parantClass="col-12 col-md-6" name="name" required="required"
                                        placeholder="Enter Name..!" errorName="name" class="py-2" value="{{ Auth::user()->fname ?? '' }}"></x-form.textbox>

                                    <x-form.textbox parantClass="col-12 col-md-6" name="email" required="required"
                                        placeholder="Enter Email..!" value="{{ Auth::user()->email ?? '' }}" errorName="email" class="py-2"
                                       ></x-form.textbox>

                                    <x-form.textbox parantClass="col-12 col-md-6" name="phone" required="required"
                                        placeholder="Enter Phone..!" value="{{ Auth::user()->phone ?? '' }}" errorName="phone" class="py-2" type="tel"
                                        ></x-form.textbox>

                                    <x-form.textbox parantClass="col-12 col-md-6" name="subject" required="required"
                                        placeholder="Enter Subject..!" errorName="subject" class="py-2"
                                        type="text"></x-form.textbox>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-0">
                                            <textarea name="message" placeholder="Enter Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="px-4">
                                            <div class="checkbox">
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" name="condition"  value="1">
                                                    <span class="ml-2">{{ config('settings.con_terms_and_condition') ?? '' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group login-btn"><button class="btn" type="submit">Send</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-info">
                <div class="row">
                    <div class="col-lg-4 col-12 ">
                        <div class="single-info"><i class="icofont icofont-ui-call"></i>
                            <div class="content">
                                <h3>{{ config('settings.con_phone_number') ?? '' }}</h3>
                                <p>{{ config('settings.con_email') ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 ">
                        <div class="single-info"><i class="icofont-google-map"></i>
                            <div class="content">
                                <h3>{{ config('settings.con_address') ?? '' }}</h3>
                                <p>{{ config('settings.con_address_two') ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 ">
                        <div class="single-info"><i class="icofont icofont-wall-clock"></i>
                            <div class="content">
                                <h3>{{ config('settings.con_open_day') ?? '' }}</h3>
                                <p>{{ config('settings.con_weekend_day') ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Contact  -->
    <!--  Newsletter Area -->
    @include('frontend.pages.home.newsletter')
    <!-- /End Newsletter Area -->
@endsection
