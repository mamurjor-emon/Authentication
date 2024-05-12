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
                    <form method="POST" action="{{ route('admin.title.discription.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <input type="hidden" name="update_id" value="{{ $editTitleDiscription->id }}">
                            <x-form.textbox labelName="Section Name" parantClass="col-12 col-md-6" name="name"
                                required="required" placeholder="Enter Section Name..!" errorName="name" class="py-2"
                                value="{{ $editTitleDiscription->section_name }}" readonly="readonly"></x-form.textbox>

                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ $editTitleDiscription->title }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">

                            <x-form.textarea labelName="Discrption" parantClass="col-md-6" name="discrption"
                                required="required" errorName="discrption"
                                value="{{ $editTitleDiscription->discrption  }}"></x-form.textarea>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editTitleDiscription->status == '0' ? 'selected' : ''  }}>Pending</option>
                                <option value="1" {{ $editTitleDiscription->status == '1' ? 'selected' : ''  }}>Publish</option>
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
