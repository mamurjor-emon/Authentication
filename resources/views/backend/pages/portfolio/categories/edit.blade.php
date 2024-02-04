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
                    <form method="POST" action="{{ route('admin.portfolio.categories.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="update_id" value="{{ $editPortfolioCategorie->id }}">
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Name" parantClass="col-12 col-md-6" name="name"
                            required="required" placeholder="Enter Name..!" errorName="name" class="py-2"
                            value="{{ $editPortfolioCategorie->name ?? old('name') }}"></x-form.textbox>

                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" errorName="order_by" class="py-3"
                                value="{{ $editPortfolioCategorie->order_by ??  1 }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editPortfolioCategorie->status == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $editPortfolioCategorie->status == '1' ? 'selected' : '' }}>Publish</option>
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
