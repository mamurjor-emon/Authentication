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
                    <form method="POST" action="{{ route('admin.appointment.create.or.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            @if (isset($appointmentData))
                                <input type="hidden" name="update_id" value="{{ $appointmentData->id ?? '' }}">
                            @endif
                            <x-form.textbox labelName="Button Title" parantClass="col-12 col-md-6" name="btn_title"
                                required="required" placeholder="Enter Button Title..!" errorName="btn_title" class="py-2"
                                value="{{ $appointmentData->btn_title ?? old('btn_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ $appointmentData->title ?? old('title') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0"
                                    @if (isset($appointmentData)) {{ $appointmentData->status == '0' ? 'selected' : '' }} @endif>
                                    Pending</option>
                                <option value="1"
                                    @if (isset($appointmentData)) {{ $appointmentData->status == '1' ? 'selected' : '' }} @endif>
                                    Publish</option>
                            </x-form.selectbox>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Image<span class="required"></span></label>
                                <div>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name="image" id="picture__input">
                                    @error('image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="text-warning">Image Fixed Width 522px & Height 523px</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Create
                                Or Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            ImagePriviewInsert('picture__input', 'picture__image', 'Choose Image');
        });

        var editdata = "{{ $appointmentData->image ?? '' }}";
        if (editdata != '') {
            var myData = "{{ asset($appointmentData->image ?? '') }}";
            $(function() {
                ImagePriviewUpdate('picture__input', 'picture__image', 'Choose Image', myData);
            });
        }
    </script>
@endpush
