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
                    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Icon" parantClass="col-12 col-md-6" name="icon"
                                required="required" placeholder="Enter Icon..!" errorName="icon" class="py-2"
                                value="{{ old('icon') }}"></x-form.textbox>

                            <x-form.textbox labelName="Name" parantClass="col-12 col-md-6" name="name"
                                required="required" placeholder="Enter Name..!" errorName="name" class="py-2"
                                value="{{ old('name') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                            required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                            value="{{ old('title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Heading" parantClass="col-12 col-md-6" name="heading"
                            required="required" placeholder="Enter Heading..!" errorName="heading" class="py-2"
                            value="{{ old('heading') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">First Image<span class="required"></span></label>
                                <div>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name="fimage" id="picture__input">
                                    @error('fimage')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="text-warning">Image Fixed Width 1920px & Height 1000px</p>
                            </div>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Second Image<span class="required"></span></label>
                                <div>
                                    <label class="first__picture" for="first__image" tabIndex="0">
                                        <span class="picture__first"></span>
                                    </label>
                                    <input type="file" name="simage" id="first__image">
                                    @error('simage')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="text-warning">Image Fixed Width 1920px & Height 1200px</p>
                            </div>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Short Description" parantClass="col-md-6" name="short_description"
                                required="required" errorName="short_description"
                                value="{{ old('short_description') }}"></x-form.textarea>

                            <x-form.textarea labelName="Special Text" parantClass="col-md-6" name="special_text"
                                required="required" errorName="special_text"
                                value="{{ old('special_text') }}"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="First Description" parantClass="col-md-6" name="fdescription"
                                required="required" errorName="fdescription"
                                value="{{ old('fdescription') }}"></x-form.textarea>

                            <x-form.textarea labelName="Second Description" parantClass="col-md-6" name="sdescription"
                                required="required" errorName="sdescription"
                                value="{{ old('sdescription') }}"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Third Description" parantClass="col-md-6" name="tdescription"
                                required="required" errorName="tdescription"
                                value="{{ old('tdescription') }}"></x-form.textarea>
                            <div class="row g-5 mt-2">
                                <x-form.textbox labelName="Order By" parantClass="col-12 col-md-12" name="order_by"
                                required="required" placeholder="Enter Order By..!" errorName="order_by" class="py-2"
                                value="{{ $totalService->count() > 0 ?  $totalService->count() + 1 : 1}}"></x-form.textbox>

                                <x-form.selectbox parantClass="col-12 col-md-12" class="form-control py-2" name="status"
                                    required="required" labelName="Status" errorName="status">
                                    <option value="0">Pending</option>
                                    <option value="1">Publish</option>
                                </x-form.selectbox>
                            </div>
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
@push('scripts')
    <script>
        function summernoteFunction(id, text) {
            $(id).summernote({
                placeholder: text,
                tabsize: 2,
                height: 100
            });
        }
        summernoteFunction('#short_description', 'Enter Your Short Description')
        summernoteFunction('#special_text', 'Enter Your Special Text')
        summernoteFunction('#fdescription', 'Enter Your First Description')
        summernoteFunction('#sdescription', 'Enter Your Second Description')
        summernoteFunction('#tdescription', 'Enter Your Third Description')

        $(function() {
            ImagePriviewInsert('picture__input', 'picture__image', 'Choose First Image');
            ImagePriviewInsert('first__image', 'picture__first', 'Choose Second Image');
        });
    </script>
@endpush
