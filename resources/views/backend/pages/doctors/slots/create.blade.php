@extends('layouts.app')
@section('title', $title)
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo/image-style.css') }}">
@endpush
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card px-3 py-3">
                <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                    <h2 class="backend-title">{{ $title }}</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.doctor.slot.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Start Time" parantClass="col-12 col-md-5" name="start_time" optionalText="(Break 30 Minutes)"
                                type="time" required="required" placeholder="Enter Start Time..!" errorName="start_time"
                                class="py-2" value="{{ old('start_time') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-1" labelName="Start Zone" class="form-control" name="start_zone"
                                required="required" errorName="start_zone">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </x-form.selectbox>

                            <x-form.textbox labelName="End Time" parantClass="col-12 col-md-5" name="end_time" optionalText="(Break 30 Minutes)"
                                type="time" required="required" placeholder="Enter End Time..!" errorName="end_time"
                                class="py-2" value="{{ old('end_time') }}"></x-form.textbox>
                            <x-form.selectbox parantClass="col-12 col-md-1" labelName="End Zone" class="form-control" name="end_zone"
                                required="required" errorName="end_zone">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" placeholder="Enter Order By..!" errorName="order_by" class="py-2"
                                value="{{ $totalSlots ? $totalSlots->count() + 1 : old('order_by') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0">Pending</option>
                                <option value="1">Publish</option>
                            </x-form.selectbox>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection