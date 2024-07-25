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
                    <form  action="{{ route('admin.contact.contact.store') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="con_title" type="text"
                                required="required" placeholder="Enter Title..!" errorName="con_title" class="py-2"
                                value="{{ config('settings.con_title') ?? old('con_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Sub Title" parantClass="col-12 col-md-6" name="con_sub_title"
                                required="required" placeholder="Enter Sub title..!" errorName="con_sub_title" class="py-2"
                                value="{{ config('settings.con_sub_title') ?? old('con_sub_title') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Map Url" parantClass="col-12 col-md-6" name="con_map_url" type="text"
                                required="required" placeholder="Enter Map Url..!" errorName="con_map_url" class="py-2"
                                value="{!! config('settings.con_map_url') ?? old('con_map_url') !!}"></x-form.textbox>

                            <x-form.textbox labelName="Phone Number" parantClass="col-12 col-md-6" name="con_phone_number"
                                required="required" placeholder="Enter Phone Number..!" errorName="con_phone_number" class="py-2"
                                value="{{ config('settings.con_phone_number') ?? old('con_phone_number') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Email" parantClass="col-12 col-md-6" name="con_email"
                                required="required" placeholder="Enter Email..!" errorName="con_email" class="py-2"
                                value="{{ config('settings.con_email') ?? old('con_email') }}"></x-form.textbox>

                            <x-form.textbox labelName="Address" parantClass="col-12 col-md-6" name="con_address"
                                required="required" placeholder="Enter Contact Address..!" errorName="con_address" class="py-2"
                                value="{{ config('settings.con_address') ?? old('con_address') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Address Two" parantClass="col-12 col-md-6" name="con_address_two"
                                required="required" placeholder="Enter Contact Address Two..!" errorName="con_address_two" class="py-2"
                                value="{{ config('settings.con_address_two') ?? old('con_address_two') }}"></x-form.textbox>

                            <x-form.textbox labelName="Open Day" parantClass="col-12 col-md-6" name="con_open_day"
                                required="required" placeholder="Enter Open Day..!" errorName="con_open_day" class="py-2"
                                value="{{ config('settings.con_open_day') ?? old('con_open_day') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Weekend Day" parantClass="col-12 col-md-6" name="con_weekend_day"
                                required="required" placeholder="Enter Weekend Day..!" errorName="con_weekend_day" class="py-2"
                                value="{{ config('settings.con_weekend_day') ?? old('con_weekend_day') }}"></x-form.textbox>

                            <x-form.textbox labelName="Terms And Condition" parantClass="col-12 col-md-6" name="con_terms_and_condition"
                                required="required" placeholder="Enter Weekend Day..!" errorName="con_terms_and_condition" class="py-2"
                                value="{{ config('settings.con_terms_and_condition') ?? old('con_terms_and_condition') }}"></x-form.textbox>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

