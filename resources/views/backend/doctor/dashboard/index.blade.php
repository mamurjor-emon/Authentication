@extends('layouts.app')
@section('title',$title)
@section('content')
    @if (Auth::user()->status == '1')
        <div class="mdc-layout-grid__inner mt-4">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--info">
                    <div class="card-inner">
                        <h5 class="card-title">Total Appointment</h5>
                        <h5 class="pb-2 mb-1 border-bottom fw-bolder">{{ $totalAppointments ?? 0 }} +</h5>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">dvr</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                    <div class="card-inner">
                        <h5 class="card-title">Total Pending Appointment</h5>
                        <h5 class="pb-2 mb-1 border-bottom fw-bolder">{{ $totalPendingAppointments ?? 0 }} +</h5>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">trending_up</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--info">
                    <div class="card-inner">
                        <h5 class="card-title">Total Visited Appointment</h5>
                        <h5 class="pb-2 mb-1 border-bottom fw-bolder">{{ $totalVisitedAppointments ?? 0 }} +</h5>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">credit_card</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                    <div class="card-inner">
                        <h5 class="card-title">Annual Profit</h5>
                        <h5 class="pb-2 mb-1 border-bottom fw-bolder">{{ $totalAnnualProfits ?? 0 }}</h5>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">attach_money</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4" role="alert">
           Your Account is Not Approved . Contact To : {{ $admin->email ?? '' }}
        </div>
    @endif
@endsection
