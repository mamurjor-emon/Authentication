@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="row mt-3">
        <div class="col-12 col-md-12">
            <div class="card px-3 py-3">
                <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                    <h2 class="backend-title">{{ $title }}</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.email.templates.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <input type="hidden" name="update_id" value="{{ $emailtemplate->id }}">
                            <x-form.textbox labelName="Heading" parantClass="col-12 col-md-6" name="heading"
                                required="required" placeholder="Enter Heading..!" errorName="heading" class="py-2"
                                value="{{ $emailtemplate->heading }}"></x-form.textbox>

                            <x-form.textbox labelName="Subject" parantClass="col-12 col-md-6" name="subject"
                                required="required" placeholder="Enter Subject..!" errorName="subject" class="py-2"
                                value="{{ $emailtemplate->subject }}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="body" parantClass="col-md-12" name="body"
                                required="required" errorName="body"
                                value="{!! $emailtemplate->body !!}"></x-form.textarea>
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
@push('scripts')
    <script>
        $('#body').summernote({
            placeholder: 'Enter Your Body Text !!',
            tabsize: 2,
            height: 200
        });
    </script>
@endpush
