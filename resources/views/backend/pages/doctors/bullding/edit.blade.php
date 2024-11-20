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
                    <form method="POST" action="{{ route('admin.doctor.bullding.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="update_id" value="{{ $editBullding->id }}">
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Bullding Name" parantClass="col-12 col-md-6" name="name"
                            required="required" placeholder="Enter Name Number..!" errorName="name" class="py-2"
                            value="{{ $editBullding->name ?? old('name') }}"></x-form.textbox>

                            <x-form.textbox labelName="Location" parantClass="col-12 col-md-6" name="location"
                            required="required" placeholder="Enter Location..!" errorName="location" class="py-2"
                            value="{{ $editBullding->location ?? old('location') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                            required="required" placeholder="Enter Name Number..!" errorName="order_by" class="py-2"
                            value="{{ $editBullding->order_by ??  old('order_by') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editBullding->status == '0' ? 'selected' : ''}}>Pending</option>
                                <option value="1" {{ $editBullding->status == '1' ? 'selected' : ''}}>Publish</option>
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Image<span class="required"></span></label>
                                <div>
                                    <label class="picture" style="height: 192px" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name="image" id="picture__input">
                                    @error('image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
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
    $(function() {
        ImagePriviewInsert('picture__input', 'picture__image', 'Choose Image');
    });

    var image = "{{ $editBullding->image ?? '' }}";
    if (image != '') {
        var myData = "{{ asset($editBullding->image ?? '') }}";
        $(function() {
            ImagePriviewUpdate('picture__input', 'picture__image', 'Choose Image', myData);
        });
    }
</script>
@endpush
