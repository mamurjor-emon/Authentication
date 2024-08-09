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
@php
    use App\Models\TimePageModel;
    use App\Models\DoctorModel;
@endphp
@section('content')
    <section class="doctor-calendar-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ config('settings.time_table_title') ?? '' }}</h2>
                        <img width="48" height="24" src="{{ asset(config('settings.common_image')) ?? '' }}"
                            alt="image">
                        {!! config('settings.time_table_description') ?? '' !!}
                    </div>
                </div>
            </div>
            @if (count($days) > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="doctor-calendar-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        @forelse ($days as $day)
                                            <th>{{ $day->name }}</th>
                                        @empty
                                            <p class="text-danger text-center">Not Day Found !</p>
                                        @endforelse
                                    </tr>
                                </thead>
                                @if (count($times) > 0)
                                    <tbody>
                                        @forelse ($times as $time)
                                            <tr>
                                                <td><span class="time">{{ $time->time ?? '' }}</span></td>
                                                @forelse ($days as $day)
                                                    @php
                                                        $doctor = TimePageModel::with('user')
                                                            ->where('time_id', $time->id)
                                                            ->where('day_id', $day->id)
                                                            ->first();
                                                    @endphp
                                                    @if ($doctor)
                                                        @php
                                                            $doctorCategory = DoctorModel::with('department')->where('user_id', $doctor->user->id)->first();
                                                        @endphp
                                                        <td>
                                                            <h3>{{ $doctor->user->fname ?? '' }}</h3><span>{{ $doctorCategory->department->name ?? '' }}</span>
                                                        </td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </tr>
                                        @empty
                                            <p class="text-danger text-center">Not Time Found !</p>
                                        @endforelse
                                    </tbody>
                                @else
                                    <p class="text-danger text-center">Not Time Found !</p>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-danger text-center">Not Time Table Found !</p>
            @endif
        </div>
    </section>
@endsection
