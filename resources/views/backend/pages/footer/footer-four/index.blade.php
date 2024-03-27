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
                    <form method="POST" action="{{ route('admin.footer.four.create.or.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            @if (isset($footerFourData))
                                <input type="hidden" name="update_id" value="{{ $footerFourData->id ?? '' }}">
                            @endif
                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ $footerFourData->title ?? old('title') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0"
                                    @if (isset($footerFourData)) {{ $footerFourData->status == '0' ? 'selected' : '' }} @endif>
                                    Pending</option>
                                <option value="1"
                                    @if (isset($footerFourData)) {{ $footerFourData->status == '1' ? 'selected' : '' }} @endif>
                                    Publish</option>
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Discription" parantClass="col-md-12" name="discription"
                                required="required" errorName="discription"
                                value="{!! $footerFourData ? $footerFourData->discription : '' !!}"></x-form.textarea>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Create
                                Or Update</button>
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
        summerNote('#discription', 'Enter Your Discription')
    </script>
@endpush