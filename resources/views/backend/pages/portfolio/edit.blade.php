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
                    <form method="POST" action="{{ route('admin.portfolio.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="update_id" value="{{ $editPortfolio->id }}">
                        <div class="row g-5">
                            <x-form.textbox labelName="Button Title" parantClass="col-12 col-md-6" name="btn_title"
                                required="required" placeholder="Enter Button Title..!" errorName="btn_title" class="py-2"
                                value="{{ $editPortfolio->btn_title ??  old('btn_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Button Url" parantClass="col-12 col-md-6" name="btn_url"
                                required="required" placeholder="Enter Button Url..!" errorName="btn_url" class="py-2"
                                value="{{ $editPortfolio->btn_url ?? old('btn_url') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="btn_target"
                                required="required" labelName="First Button Target" errorName="btn_target">
                                <option value="0" {{ $editPortfolio->btn_target == 0 ? 'selected' : '' }}>Same Page</option>
                                <option value="1" {{ $editPortfolio->btn_target == 1 ? 'selected' : '' }}>New Page</option>
                            </x-form.selectbox>

                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" errorName="order_by" class="py-3"
                                value="{{ $editPortfolio->order_by ?? '' }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editPortfolio->status == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $editPortfolio->status == '1' ? 'selected' : '' }}>Publish</option>
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
                                <p class="text-warning">Image Fixed Width 320px & Height 253px</p>
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
       var editdata = "{{ $editPortfolio->image ?? '' }}";
        if (editdata != '') {
            var myData = "{{ asset($editPortfolio->image ?? '') }}";
            $(function() {
                ImagePriviewUpdate('picture__input', 'picture__image', 'Choose Image', myData);
            });
        }
    </script>
@endpush
