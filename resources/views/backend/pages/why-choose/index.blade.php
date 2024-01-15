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
                    <form method="POST" action="{{ route('admin.why.choose.create.or.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            @if (isset($chooseData))
                                <input type="hidden" name="update_id" value="{{ $chooseData->id ?? '' }}">
                            @endif
                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ $chooseData->title ?? old('title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Youtube Url" parantClass="col-12 col-md-6" name="youtube_url"
                                required="required" placeholder="Enter Youtube Url..!" errorName="youtube_url"
                                class="py-2"
                                value="{{ $chooseData->youtube_url ?? old('youtube_url') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="First Discription" parantClass="col-md-6" name="f_title"
                                required="required"
                                errorName="f_title" value="{!! $chooseData ? $chooseData->f_title : '' !!}"></x-form.textarea>

                            <x-form.textarea labelName="Second Description" parantClass="col-md-6" name="s_title"
                                required="required"
                                errorName="s_title" value="{!! $chooseData ? $chooseData->s_title : '' !!}"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Third Description" parantClass="col-md-6" name="t_title"
                                required="required"
                                errorName="t_title" value="{!! $chooseData ? $chooseData->t_title : '' !!}"></x-form.textarea>

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
                                <p class="text-warning">Image Fixed Width 2560px & Height 1200px</p>
                            </div>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0"
                                    @if (isset($chooseData)) {{ $chooseData->status == '0' ? 'selected' : '' }} @endif>
                                    Pending</option>
                                <option value="1"
                                    @if (isset($chooseData)) {{ $chooseData->status == '1' ? 'selected' : '' }} @endif>
                                    Publish</option>
                            </x-form.selectbox>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Create Or Update</button>
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
        summerNote('#f_title', 'Enter Your First Discription')
        summerNote('#s_title', 'Enter Your Second Discription')
        summerNote('#t_title', 'Enter Your Third Discription')

        $(function() {
            ImagePriviewInsert('picture__input', 'picture__image', 'Choose Image');
        });

        var editdata = "{{ $chooseData->image ?? '' }}";
        if (editdata != '') {
            var myData = "{{ asset($chooseData->image ?? '') }}";
            $(function() {
                ImagePriviewUpdate('picture__input', 'picture__image', 'Choose Image', myData);
            });
        }
    </script>
@endpush
