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
                    <form method="POST" action="{{ route('admin.portfolio.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="category_id"
                                required="required" labelName="Category Id" errorName="category_id">
                                <option value="">Select Category Id</option>
                                @forelse ($portfolioCategories as $portfolio)
                                    <option value="{{ $portfolio->id }}">{{ $portfolio->name }}</option>
                                @empty
                                    <p class="text-danger">No Category Found !</p>
                                @endforelse
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

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="btn_target"
                                required="required" labelName="First Button Target" errorName="btn_target">
                                <option value="0">Same Page</option>
                                <option value="1">New Page</option>
                            </x-form.selectbox>

                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" errorName="order_by" class="py-3"
                                value="{{ $totalPortfolio->count() > 0 ? $totalPortfolio->count() + 1 : 1 }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Discription" parantClass="col-md-6" name="discription"
                                required="required" errorName="discription" value="{{ old('discription') }}"></x-form.textarea>

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
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0">Pending</option>
                                <option value="1">Publish</option>
                            </x-form.selectbox>

                            <div class="col-md-6">
                                <label class="required">Portfolio Gallery</label>
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p class="upload-label">Portfolio Gallery</p>
                                            <input type="file" name="portfolio_gallery[]" multiple=""
                                                data-max_length="20" class="upload__inputfile">
                                        </label>
                                    </div>
                                    <div class="upload__img-wrap"></div>
                                </div>
                                @error('portfolio_gallery')
                                    <p class="text-danger error-text">{{ $message }}</p>
                                @enderror
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
            summernoteFunction('#discription', 'Enter Your Discription')
            $(function() {
                ImagePriviewInsert('picture__input', 'picture__image', 'Choose Image');
            });
    </script>
    <script src="{{ asset('backend/assets/js/galleryImage.js') }}"></script>
@endpush
