@extends('layouts.app')
@section('title',$title)
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card px-3 py-3">
            <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                <h2 class="backend-title">{{ $title }}</h2>
            </div>
            <div class="menu-create-form">
                <form method="POST" action="{{ route('admin.portfolio.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-5">
                        <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="category_id"
                            required="required" labelName="Category Id" errorName="category_id">
                            <option value="">Select Category Id</option>
                        </x-form.selectbox>

                        <x-form.textbox labelName="Client Name" parantClass="col-12 col-md-6" name="client_name"
                            required="required" placeholder="Enter Client Name..!" errorName="client_name" class="py-2"
                            value="{{ old('client_name') }}"></x-form.textbox>
                    </div>

                    <div class="row g-5">
                        <x-form.textbox labelName="Date" parantClass="col-12 col-md-6" name="date" type="date"
                            required="required" placeholder="Enter Date..!" errorName="date" class="py-2"
                            value="{{ old('date') }}"></x-form.textbox>

                        <x-form.textbox labelName="Phone Number" parantClass="col-12 col-md-6" name="phone"
                            required="required" placeholder="Enter Phone Number..!" errorName="phone" class="py-2"
                            value="{{ old('phone') }}"></x-form.textbox>
                    </div>

                    <div class="row g-5">
                        <x-form.textbox labelName="Age" parantClass="col-12 col-md-6" name="age" type="number"
                            required="required" placeholder="Enter Age..!" errorName="age" class="py-2"
                            value="{{ old('age') }}"></x-form.textbox>

                        <x-form.textbox labelName="Protfolio Title" parantClass="col-12 col-md-6" name="title"
                            required="required" placeholder="Enter Protfolio Title..!" errorName="title" class="py-2"
                            value="{{ old('title') }}"></x-form.textbox>
                    </div>

                    <div class="row g-5">
                        <x-form.textbox labelName="Button Title" parantClass="col-12 col-md-6" name="btn_title"
                            required="required" placeholder="Enter Button Title..!" errorName="btn_title" class="py-2"
                            value="{{ old('btn_title') }}"></x-form.textbox>

                        <x-form.textbox labelName="Button Url" parantClass="col-12 col-md-6" name="btn_url"
                            required="required" placeholder="Enter Button Url..!" errorName="btn_url" class="py-2"
                            value="{{ old('btn_url') }}"></x-form.textbox>
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
