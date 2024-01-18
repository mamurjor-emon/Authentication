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
                    <form method="POST" action="{{ route('admin.pricing.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Icon" parantClass="col-12 col-md-6" name="icon"
                                required="required" placeholder="Enter Icon..!" errorName="icon" class="py-2"
                                value="{{ old('icon') }}"></x-form.textbox>

                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ old('title') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Price" parantClass="col-12 col-md-6" name="price"
                                required="required" placeholder="Enter Price..!" errorName="price" class="py-2"
                                value="{{ old('price') }}"></x-form.textbox>

                            <x-form.textbox labelName="Price Label" parantClass="col-12 col-md-6" name="price_label"
                            required="required" placeholder="Enter Price Label..!" errorName="price_label" class="py-2"
                            value="{{ old('price_label') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Button Title" parantClass="col-12 col-md-6" name="btn_title"
                            required="required" placeholder="Enter Button Title..!" errorName="btn_title" class="py-2"
                            value="{{ old('btn_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Button Url" parantClass="col-12 col-md-6" name="btn_url"
                            required="required" placeholder="Enter Button Url..!" errorName="btn_url" class="py-2"
                            value="{{ old('btn_url') }}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="btn_target"
                                required="required" labelName="Button Target" errorName="btn_target">
                                <option value="0">Same Page</option>
                                <option value="1">New Page</option>
                            </x-form.selectbox>

                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                            required="required" placeholder="Enter Order By..!" errorName="order_by" class="py-2"
                            value="{{ $totalPricing->count() > 0 ?  $totalPricing->count() + 1 : 1}}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Discrption" parantClass="col-md-6" name="discrption"
                                required="required" errorName="discrption"
                                value="{{ old('discrption') }}"></x-form.textarea>

                                <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
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
@push('scripts')
    <script>
        $('#discrption').summernote({
            placeholder: 'Enter Your Discrption',
            tabsize: 2,
            height: 100
        });
    </script>
@endpush
