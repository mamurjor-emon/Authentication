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
                    <form method="POST" action="{{ route('admin.doctor.time-table.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <input type="hidden" name="update_id" value="{{ $editTimeTable->id }}">

                            <x-form.textbox labelName="Time" parantClass="col-12 col-md-6" name="time"
                                type="time" required="required"
                                placeholder="Enter Time..!" errorName="time" class="py-2"
                                value="{{ $editTimeTable->time ?? old('time') }}"></x-form.textbox>

                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" placeholder="Enter Order By..!" errorName="order_by" class="py-2"
                                value="{{ $editTimeTable->order_by ?? old('order_by') }}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editTimeTable->status == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $editTimeTable->status == '1' ? 'selected' : '' }}>Publish</option>
                            </x-form.selectbox>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
