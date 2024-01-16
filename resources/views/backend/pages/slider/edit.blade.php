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
                    <form method="POST" action="{{ route('admin.slider.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <input type="hidden" name="update_id" value="{{ $editSilder->id }}">
                            <x-form.textbox labelName="First Title" parantClass="col-12 col-md-6" name="f_title"
                                required="required" placeholder="Enter First Title..!" errorName="f_title" class="py-2"
                                value="{{ $editSilder->f_title }}"></x-form.textbox>

                            <x-form.textbox labelName="First Spcial Title" parantClass="col-12 col-md-6"
                                name="f_spcial_title" required="required" placeholder="Enter First Spcial Title..!"
                                errorName="f_spcial_title" class="py-2"
                                value="{{ $editSilder->f_spcial_title }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Last Title" parantClass="col-12 col-md-6" name="l_title"
                                required="required" placeholder="Enter Last Title..!" errorName="l_title" class="py-2"
                                value="{{ $editSilder->l_title }}"></x-form.textbox>

                            <x-form.textbox labelName="Last Spcial Title" parantClass="col-12 col-md-6"
                                name="l_spcial_title" required="required" placeholder="Enter Last Spcial Title..!"
                                errorName="l_spcial_title" class="py-2"
                                value="{{ $editSilder->l_spcial_title }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="First Button Title" parantClass="col-12 col-md-6" name="f_btn_title"
                                required="required" placeholder="Enter First Button Title..!" errorName="f_btn_title" class="py-2"
                                value="{{ $editSilder->f_btn_title }}"></x-form.textbox>

                            <x-form.textbox labelName="First Button Url" parantClass="col-12 col-md-6"
                                name="f_btn_url" required="required" placeholder="Enter First Button Url..!"
                                errorName="f_btn_url" class="py-2"
                                value="{{ $editSilder->f_btn_url }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="f_btn_target"
                                required="required" labelName="First Button Target" errorName="f_btn_target">
                                <option value="0" {{ $editSilder->f_btn_target == 0 ? 'selected' : '' }}>Same Page</option>
                                <option value="1" {{ $editSilder->f_btn_target == 1 ? 'selected' : '' }}>New Page</option>
                            </x-form.selectbox>

                            <x-form.textbox labelName="Last Button Title" parantClass="col-12 col-md-6" name="l_btn_title"
                                required="required" placeholder="Enter Last Button Title..!" errorName="l_btn_title" class="py-2"
                                value="{{ $editSilder->l_btn_title }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Last Button Url" parantClass="col-12 col-md-6"
                                name="l_btn_url" required="required" placeholder="Enter Last Button Url..!"
                                errorName="l_btn_url" class="py-2"
                                value="{{ $editSilder->l_btn_url }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="l_btn_target"
                                required="required" labelName="Last Button Target" errorName="l_btn_target">
                                <option value="0" {{ $editSilder->l_btn_target == 0 ? 'selected' : '' }}>Same Page</option>
                                <option value="1" {{ $editSilder->l_btn_target == 1 ? 'selected' : '' }}>New Page</option>
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6"
                                name="order_by" required="required"
                                errorName="order_by" class="py-3"
                                value="{{ $editSilder->order_by }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editSilder->status == 0 ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $editSilder->status == 1 ? 'selected' : '' }}>Publish</option>
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Description" parantClass="col-md-6" name="description"
                                required="required" errorName="description" value="{!! $editSilder->description  !!}"></x-form.textarea>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Image<span
                                        class="required"></span></label>
                                <div>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name="image" id="picture__input">
                                    @error('image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="text-warning">Image Fixed Width 1600px & Height 830px</p>
                            </div>
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
        $('#description').summernote({
            placeholder: 'Enter Your Description',
            tabsize: 2,
            height: 100
        });
        $(function() {
            ImagePriviewInsert('picture__input', 'picture__image','Choose Image');
        });

        var editdata = "{{ $editSilder->image ?? '' }}";
        if (editdata != '') {
            var myData = "{{ asset($editSilder->image ?? '') }}";
            $(function() {
                ImagePriviewUpdate('picture__input', 'picture__image', 'Choose Image', myData);
            });
        }
    </script>
@endpush
