@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card px-3 py-3">
                <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                    <h2 class="backend-title">{{ $title }}</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.call.action.create.or.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            @if (isset($callToAction))
                                <input type="hidden" name="update_id" value="{{ $callToAction->id ?? '' }}">
                            @endif
                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ $callToAction->title ?? old('title') }}"></x-form.textbox>

                            <x-form.textbox labelName="First Button Title" parantClass="col-12 col-md-6" name="f_btn_title"
                                required="required" placeholder="Enter First Button Title..!" errorName="f_btn_title"
                                class="py-2"
                                value="{{ $callToAction->f_btn_title ?? old('f_btn_title') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="First Button Url" parantClass="col-12 col-md-6" name="f_btn_url"
                                required="required" placeholder="Enter First Button Url..!" errorName="f_btn_url"
                                class="py-2" value="{{ $callToAction->f_btn_url ?? old('f_btn_url') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="f_btn_target"
                                required="required" labelName="First Button Target" errorName="f_btn_target">
                                <option value="0"
                                    @if (isset($callToAction)) {{ $callToAction->f_btn_target == '0' ? 'selected' : '' }} @endif>
                                    Same Tab</option>
                                <option value="1"
                                    @if (isset($callToAction)) {{ $callToAction->f_btn_target == '1' ? 'selected' : '' }} @endif>
                                    New Tab</option>
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Last Button Title" parantClass="col-12 col-md-6" name="l_btn_title"
                                required="required" placeholder="Enter Last Button Title..!" errorName="l_btn_title"
                                class="py-2"
                                value="{{ $callToAction->l_btn_title ?? old('l_btn_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Last Button Url" parantClass="col-12 col-md-6" name="l_btn_url"
                                required="required" placeholder="Enter Last Button Url..!" errorName="l_btn_url"
                                class="py-2" value="{{ $callToAction->l_btn_url ?? old('l_btn_url') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="l_btn_target"
                                required="required" labelName="Last Button Target" errorName="l_btn_target">
                                <option value="0"
                                    @if (isset($callToAction)) {{ $callToAction->l_btn_target == '0' ? 'selected' : '' }} @endif>
                                    Same Tab</option>
                                <option value="1"
                                    @if (isset($callToAction)) {{ $callToAction->l_btn_target == '1' ? 'selected' : '' }} @endif>
                                    New Tab</option>
                            </x-form.selectbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0"
                                    @if (isset($callToAction)) {{ $callToAction->status == '0' ? 'selected' : '' }} @endif>
                                    Pending</option>
                                <option value="1"
                                    @if (isset($callToAction)) {{ $callToAction->status == '1' ? 'selected' : '' }} @endif>
                                    Publish</option>
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Sub Title" parantClass="col-md-12" name="sub_title"
                                required="required"
                                errorName="sub_title" value="{!! $callToAction ? $callToAction->sub_title : '' !!}"></x-form.textarea>
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
        function summerNote(id, title) {
            $(id).summernote({
                placeholder: title,
                tabsize: 2,
                height: 100
            });
        }
        summerNote('#sub_title', 'Enter Your Sub Title')
    </script>
@endpush
