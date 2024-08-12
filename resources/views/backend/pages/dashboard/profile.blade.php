@extends('layouts.app')
@section('title', $title)
@push('styles')
    <style>
        .picture {
            width: 200px;
            height: 200px;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            border: 2px dashed currentcolor;
            cursor: pointer;
            font-family: sans-serif;
            transition: color 300ms ease-in-out, background 300ms ease-in-out;
            outline: none;
            overflow: hidden;
            border-radius: 50%;
        }

        .picture, {
            color: #aaa;
            cursor: pointer;
            font-family: sans-serif;
        }
        #picture__input {
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card px-3 py-3">
                <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                    <h2 class="backend-title">{{ $title }}</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <div>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name="avatar" id="picture__input">
                                    @error('avatar')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="First Name" parantClass="col-12 col-md-6" name="fname"
                            required="required" placeholder="Enter First Name..!" errorName="fname" class="py-2"
                            value="{{ Auth::user()->fname ?? old('fname') }}"></x-form.textbox>

                            <x-form.textbox labelName="Last Name" parantClass="col-12 col-md-6" name="lname"
                            required="required" placeholder="Enter Last Name..!" errorName="lname" class="py-2"
                            value="{{ Auth::user()->lname ?? old('lname') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Email" parantClass="col-12 col-md-6" name="email"
                            required="required" placeholder="Enter Email..!" errorName="email" class="py-2"
                            value="{{ Auth::user()->email ?? old('email') }}" readonly="readonly"></x-form.textbox>

                            <x-form.textbox labelName="Phone" parantClass="col-12 col-md-6" name="phone"
                            required="required" placeholder="Enter Phone Number..!" errorName="phone" class="py-2"
                            value="{{ Auth::user()->phone ?? old('phone') }}"></x-form.textbox>
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

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card px-3 py-3">
                <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                    <h2 class="backend-title">Password Update</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.profile.password.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-5">
                            <x-form.textbox labelName="Current Password" parantClass="col-12 col-md-6" name="current_password"
                            required="required" placeholder="Enter Current Password..!" errorName="current_password" class="py-2"
                            value="{{  old('current_password') }}"></x-form.textbox>

                            <x-form.textbox labelName="New Password" parantClass="col-12 col-md-6" name="password"
                            required="required" placeholder="Enter New Password..!" errorName="password" class="py-2"
                            value="{{ old('password') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Confirm Password" parantClass="col-12 col-md-6" name="password_confirmation"
                            required="required" placeholder="Enter Confirm Password..!" errorName="password_confirmation" class="py-2"
                            value="{{  old('password_confirmation') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="action"
                                required="required" labelName="Action" errorName="action">
                                <option value="0">No Logout </option>
                                <option value="1">Logout</option>
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
        $(function() {
            ImagePriviewInsert('picture__input', 'picture__image', 'Profile Picture');
        });
        var authData = "{{ Auth::user()->avatar }}";
        if (authData != '') {
            var myData = "{{ asset( Auth::user()->avatar ?? '') }}";
            $(function() {
                ImagePriviewUpdate('picture__input', 'picture__image', 'Profile Picture', myData);
            });
        }
    </script>
@endpush
