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
    <section class="doctor-calendar-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ config('settings.time_table_title') ??  '' }}</h2>
                        <img   width="48" height="24" src="{{ asset(config('settings.common_image')) ?? '' }}" alt="image">
                       {!! config('settings.time_table_description') ?? ''  !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="doctor-calendar-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="time">9.00</span></td>
                                    <td>
                                        <h3>Dr. Tanner</h3><span>Dermatologists</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Kwak</h3><span>Ear, Nose</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Slaughter</h3><span>Neurologist</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h3>Dr. Foley</h3><span>Oncologist</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Palmer</h3><span>Maxine lowe</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="time">12.00</span></td>
                                    <td></td>
                                    <td>
                                        <h3>Dr. Megahead</h3><span>Orthopedics</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Neupane</h3><span>Pain Management</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Breidin</h3><span>Radiologist</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h3>Dr. Pipe</h3><span>Surgeons</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="time">15.00</span></td>
                                    <td>
                                        <h3>Dr. Tanner</h3><span>Dermatologists</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Kwak</h3><span>Ear, Nose</span>
                                    </td>
                                    <td></td>
                                    <td>
                                        <h3>Dr. Slaughter</h3><span>Neurologist</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Foley</h3><span>Oncologist</span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><span class="time">18.00</span></td>
                                    <td>
                                        <h3>Dr. Slaughter</h3><span>Neurologist</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Megahead</h3><span>Orthopedics</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Neupane</h3><span>Pain Management</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Breidin</h3><span>Radiologist</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Kwak</h3><span>Ear, Nose</span>
                                    </td>
                                    <td>
                                        <h3>Dr. Pipe</h3><span>Surgeons</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
