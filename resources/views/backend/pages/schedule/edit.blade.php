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
                    <form method="POST" action="{{ route('admin.schedule.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <input type="hidden" name="update_id" value="{{ $editSchedule->id }}">
                            <x-form.textbox labelName="Icon" parantClass="col-12 col-md-6" name="icon"
                                required="required" placeholder="Enter Fontawesome 4.7 Icon..!" errorName="icon"
                                class="py-2" value="{!! $editSchedule->icon !!}"></x-form.textbox>

                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ $editSchedule->title }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Sub Title" parantClass="col-12 col-md-6" name="sub_title"
                                required="required" placeholder="Enter Sub Title..!" errorName="sub_title" class="py-2"
                                value="{{ $editSchedule->sub_title }}"></x-form.textbox>

                            <x-form.textbox labelName="Button Title" parantClass="col-12 col-md-6" name="btn_title"
                                required="required" placeholder="Enter Button Title..!" errorName="btn_title" class="py-2"
                                value="{{ $editSchedule->btn_title }}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Button Url" parantClass="col-12 col-md-6" name="url"
                                required="required" placeholder="Enter Button Url..!" errorName="url" class="py-2"
                                value="{{ $editSchedule->url }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="target"
                                required="required" labelName="Button Target" errorName="target">
                                <option value="0" {{ $editSchedule->target == 0 ? 'selected' : '' }}>Same Page</option>
                                <option value="1" {{ $editSchedule->target == 1 ? 'selected' : '' }}>New Page</option>
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editSchedule->status == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $editSchedule->status == '1' ? 'selected' : '' }}>Publish</option>
                            </x-form.selectbox>

                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" placeholder="Enter Order By..!" errorName="order_by" class="py-2"
                                value="{{ $editSchedule->order_by }}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Description" parantClass="col-md-12" name="description"
                                required="required" errorName="description" value="{!! $editSchedule->discription !!}"></x-form.textarea>
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
    </script>
@endpush
