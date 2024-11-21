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
                    <form method="POST" action="{{ route('admin.doctor.room.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Room Number" parantClass="col-12 col-md-6" name="room_no"
                                type="number" required="required" placeholder="Enter Room Number..!" errorName="room_no"
                                class="py-2" value="{{ old('room_no') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="bullding_id"
                                required="required" labelName="Bullding" errorName="bullding_id">
                                @forelse ($bulldings as $bullding)
                                    <option value="{{ $bullding->id ?? '' }}">{{ $bullding->name ?? '' }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                type="number" required="required" placeholder="Enter Order By..!" errorName="order_by"
                                class="py-2"
                                value="{{ $totalRooms ? $totalRooms->count() + 1 : old('order_by') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0">Pending</option>
                                <option value="1">Publish</option>
                            </x-form.selectbox>
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
