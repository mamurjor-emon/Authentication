@extends('layouts.app')
@section('title', $title)
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card px-3 py-3">
                <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                    <h2 class="backend-title">{{ $title }}</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.footer.create.or.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            @if (isset($footerOneData))
                                <input type="hidden" name="update_id" value="{{ $footerOneData->id ?? '' }}">
                            @endif
                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter Title..!" errorName="title" class="py-2"
                                value="{{ $footerOneData->title ?? old('title') }}"></x-form.textbox>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Socal Media<span
                                        class="required"></span></label>
                                <select class="js-select2 form-control" multiple="multiple" name="socal_media[]">
                                    @if (isset($footerOneData))
                                        @if (!empty($footerOneData->socal_media))
                                            @php
                                                $footerSocals = json_decode($footerOneData->socal_media);
                                            @endphp
                                            @forelse ($socalMedias as $socalMedia)
                                                <option value="{{ $socalMedia->id }}"
                                                    {{ in_array($socalMedia->id, $footerSocals) ? 'selected' : '' }}>
                                                    {!! $socalMedia->name !!}
                                                </option>
                                            @empty
                                            @endforelse
                                        @endif
                                    @else
                                        @if (!empty($socalMedias))
                                            @forelse ($socalMedias as $socalMedia)
                                                <option value="{{ $socalMedia->id }}">{!! $socalMedia->name !!}</option>
                                            @empty
                                            @endforelse
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Discription" parantClass="col-md-6" name="discrption"
                                required="required" errorName="discrption"
                                value="{!! $footerOneData ? $footerOneData->discrption : '' !!}"></x-form.textarea>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0"
                                    @if (isset($footerOneData)) {{ $footerOneData->status == '0' ? 'selected' : '' }} @endif>
                                    Pending</option>
                                <option value="1"
                                    @if (isset($footerOneData)) {{ $footerOneData->status == '1' ? 'selected' : '' }} @endif>
                                    Publish</option>
                            </x-form.selectbox>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-select2").select2({
                closeOnSelect: false,
                placeholder: "Choose Socal Media !",
                allowClear: true,
                tags: true
            });
        });

        function summerNote(id, title) {
            $(id).summernote({
                placeholder: title,
                tabsize: 2,
                height: 100
            });
        }
        summerNote('#discrption', 'Enter Your Discription')
    </script>
@endpush
