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
                    <form method="POST" action="{{ route('admin.socal.media.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="update_id" value="{{ $editSocalMedia->id }}">
                        <div class="row g-5">
                            <x-form.textbox labelName="Icon" parantClass="col-12 col-md-6" name="icon"
                                required="required" placeholder="Enter Icon..!" errorName="icon" class="py-2"
                                value="{!! $editSocalMedia->icon ?? old('icon') !!}"></x-form.textbox>

                            <x-form.textbox labelName="Name" parantClass="col-12 col-md-6" name="name"
                                placeholder="Enter Name..!" errorName="name" class="py-2"  required="required"
                                value="{{ $editSocalMedia->name ?? old('name') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Url" parantClass="col-12 col-md-6" name="url" required="required"
                                placeholder="Enter Url..!" errorName="url" class="py-2"
                                value="{{ $editSocalMedia->url ?? old('url') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="target"
                                required="required" labelName="Target" errorName="target">
                                <option value="0" {{ $editSocalMedia->target == '0' ? 'selected' : '' }}>Same Page</option>
                                <option value="1" {{ $editSocalMedia->target == '1' ? 'selected' : '' }}>New Page</option>
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" errorName="order_by" class="py-3"
                                value="{{ $editSocalMedia->order_by ?? 1 }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editSocalMedia->status == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $editSocalMedia->status == '1' ? 'selected' : '' }}>Publish</option>
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
