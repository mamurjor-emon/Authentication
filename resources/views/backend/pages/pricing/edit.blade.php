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
                    <form method="POST" action="{{ route('admin.pricing.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="update_id" value="{{ $editPricing->id }}">
                        <div class="row g-5">
                            <x-form.textbox labelName="Icon" parantClass="col-12 col-md-6" name="icon"
                                required="required" placeholder="Enter Icon..!" errorName="icon" class="py-2"
                                value="{!! $editPricing->icon ??  old('icon') !!}"></x-form.textbox>

                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ $editPricing->title ?? old('title') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Price" parantClass="col-12 col-md-6" name="price"
                                required="required" placeholder="Enter Price..!" errorName="price" class="py-2"
                                value="{{ $editPricing->price ?? old('price') }}"></x-form.textbox>

                            <x-form.textbox labelName="Price Label" parantClass="col-12 col-md-6" name="price_label"
                            required="required" placeholder="Enter Price Label..!" errorName="price_label" class="py-2"
                            value="{{ $editPricing->price_label ?? old('price_label') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Button Title" parantClass="col-12 col-md-6" name="btn_title"
                            required="required" placeholder="Enter Button Title..!" errorName="btn_title" class="py-2"
                            value="{{ $editPricing->btn_title ?? old('btn_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Button Url" parantClass="col-12 col-md-6" name="btn_url"
                            required="required" placeholder="Enter Button Url..!" errorName="btn_url" class="py-2"
                            value="{{ $editPricing->btn_url ?? old('btn_url') }}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="btn_target"
                                required="required" labelName="Button Target" errorName="btn_target">
                                <option value="0" {{ $editPricing->btn_target == 0 ? 'selected' : ''  }}>Same Page</option>
                                <option value="1" {{ $editPricing->btn_target == 1 ? 'selected' : ''  }}>New Page</option>
                            </x-form.selectbox>

                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                            required="required" placeholder="Enter Order By..!" errorName="order_by" class="py-2"
                            value="{{ $editPricing->order_by ?? 1 }}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Discrption" parantClass="col-md-6" name="discrption"
                                required="required" errorName="discrption"
                                value="{{ $editPricing->discrption ?? old('discrption') }}"></x-form.textarea>

                                <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0"  {{ $editPricing->status == '0' ? 'selected' : ''  }}>Pending</option>
                                <option value="1"  {{ $editPricing->status == '1' ? 'selected' : ''  }}>Publish</option>
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
@push('scripts')
    <script>
        $('#discrption').summernote({
            placeholder: 'Enter Your Discrption',
            tabsize: 2,
            height: 100
        });
    </script>
@endpush
