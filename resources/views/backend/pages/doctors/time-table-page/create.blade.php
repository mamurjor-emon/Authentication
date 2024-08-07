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
                    <form method="POST" action="{{ route('admin.doctor.time-table.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="user_id"
                                required="required" labelName="User" errorName="user_id">
                                <option value="">Select User</option>
                                @forelse ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->fname .'-'. $doctor->lname .'-'. $doctor->email }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="day_id"
                                required="required" labelName="Day" errorName="day_id">
                                <option value="">Select Day</option>
                                @forelse ($days as $day)
                                    <option value="{{ $day->id }}">{{ $day->name }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0">Pending</option>
                                <option value="1">Publish</option>
                            </x-form.selectbox>
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
