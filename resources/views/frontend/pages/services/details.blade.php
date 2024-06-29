@extends('layouts.frontend')
@section('title', $title)
@push('styles')
<style>
    .service-details-area #special_text p{
        color: #fff !important;
    }
</style>
@endpush
@section('content')
    <div class="service-details-area section">
        <div class="container">
            {{-- @dd($servicesData) --}}
            <div class="services-details-img">
                <img src="{{ asset($servicesData->fimage) ?? '' }}" alt="images"/>
                <h2>{{ $servicesData->title }}</h2>
                {!! $servicesData->fdescription ?? '' !!}
               @if ($servicesData->special_text != null)
                <blockquote id="special_text">
                    <i class="icofont-quote-left"></i>
                   {!! $servicesData->special_text ?? '' !!}
                </blockquote>
               @endif
                {!! $servicesData->sdescription ?? '' !!}
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="service-details-inner-left" style="background-image: url({{ asset($servicesData->simage) ?? '' }})">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="service-details-inner">
                        <h2>{!! $servicesData->heading ?? '' !!}</h2>
                        {!! $servicesData->tdescription ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
