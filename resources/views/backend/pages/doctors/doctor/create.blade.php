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
                    <form method="POST" action="{{ route('admin.doctor.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="user_id"
                                required="required" labelName="Select User" errorName="user_id">
                                <option value="">Select User</option>
                                @forelse ($allActiveClients as $client)
                                    <option value="{{ $client->id }}">{{ $client->fname ?? ''}} - {{ $client->lname ?? '' }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="department_id"
                                required="required" labelName="Select Department" errorName="department_id">
                                <option value="">Select Department</option>
                                @forelse ($allDepartments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="bullding_id"
                                required="required" id="bullding_id" labelName="Select Bullding" errorName="bullding_id">
                                <option value="">Select Bullding</option>
                                @forelse ($allBulldings as $bullding)
                                    <option value="{{ $bullding->id }}">{{ $bullding->name ?? ''}} - {{ $bullding->location ?? '' }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="department_id"
                                required="required" labelName="Select Department" errorName="department_id">
                                <option value="">Select Department</option>
                                @forelse ($allDepartments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Phone" parantClass="col-12 col-md-6" name="phone"
                            required="required" placeholder="Enter Phone Number..!" errorName="phone" class="py-2"
                            value="{{ old('phone') }}"></x-form.textbox>

                            <x-form.textbox labelName="Location" parantClass="col-12 col-md-6" name="location"
                            required="required" placeholder="Enter Location..!" errorName="location" class="py-2"
                            value="{{ old('location') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Facebook Profile Link" parantClass="col-12 col-md-6" name="facebook"
                            placeholder="Enter Facebook Profile Link..!" errorName="facebook" class="py-2"
                            value="{{ old('facebook') }}"></x-form.textbox>

                            <x-form.textbox labelName="Twitter Profile Link" parantClass="col-12 col-md-6" name="twitter"
                            placeholder="Enter Twitter Profile Link..!" errorName="twitter" class="py-2"
                            value="{{ old('twitter') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Vimo Profile Link" parantClass="col-12 col-md-6" name="vimo"
                            placeholder="Enter Vimo Profile Link..!" errorName="vimo" class="py-2"
                            value="{{ old('vimo') }}"></x-form.textbox>

                            <x-form.textbox labelName="Pinterest Profile Link" parantClass="col-12 col-md-6" name="pinterest"
                            placeholder="Enter Pinterest Profile Link..!" errorName="pinterest" class="py-2"
                            value="{{ old('pinterest') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="First Degree" parantClass="col-12 col-md-6" name="fdegree"
                            required="required" placeholder="Enter First Degree..!" errorName="fdegree" class="py-2"
                            value="{{ old('fdegree') }}"></x-form.textbox>

                            <x-form.textbox labelName="Second Degree" parantClass="col-12 col-md-6" name="sdegree"
                            placeholder="Enter Second Degree..!" errorName="sdegree" class="py-2"
                            value="{{ old('sdegree') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Third Degree" parantClass="col-12 col-md-6" name="tdegree"
                            placeholder="Enter Third Degree..!" errorName="tdegree" class="py-2"
                            value="{{ old('tdegree') }}"></x-form.textbox>

                            <x-form.textbox labelName="Fourth Degree" parantClass="col-12 col-md-6" name="ldegree"
                            placeholder="Enter Fourth Degree..!" errorName="ldegree" class="py-2"
                            value="{{ old('ldegree') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                             <x-form.textarea labelName="First Biography" parantClass="col-md-6" name="fbiography"
                                required="required" errorName="fbiography"></x-form.textarea>

                            <x-form.textarea labelName="Second Biography" parantClass="col-md-6" name="lbiography"
                            required="required" errorName="lbiography"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                             <x-form.textarea labelName="Education" parantClass="col-md-6" name="education"
                                required="required" errorName="education"></x-form.textarea>

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
                                <p class="text-warning">Image Fixed Width 704px & Height 827px</p>
                            </div>
                        </div>

                        <div class="row g-5 mt-2">
                             <x-form.textarea labelName="Working Day" parantClass="col-md-6" name="workday"
                                required="required" errorName="workday"></x-form.textarea>

                            <div class="col-md-6">
                                <x-form.textbox labelName="Position" parantClass="col-12 col-md-12" name="position"
                                    required="required" placeholder="Enter Position..!" errorName="position" class="py-2"
                                    value="{{ old('position') }}"></x-form.textbox>

                                <x-form.selectbox parantClass="col-12 col-md-12 mt-5" class="form-control" name="status"
                                    required="required" labelName="Status" errorName="status">
                                    <option value="0">Pending</option>
                                    <option value="1">Publish</option>
                                </x-form.selectbox>
                            </div>
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
@push('scripts')
<script>
    $(document).ready(function () {
        $('#bullding_id').on('change', function() {
            var bullding_id = $(this).val();
           $.ajax({
            type: "POST",
            url: "{{ route('admin.doctor.get.room') }}",
            data: {
                id : bullding_id,
            },
            dataType: 'json',
            async: true,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                console.log(res.data);
            }
           });
        });
    });
</script>
<script>
    function summerNote(id, title) {
        $(id).summernote({
            placeholder: title,
            tabsize: 2,
            height: 100
        });
    }
    summerNote('#fbiography', 'Enter Your First Biography');
    summerNote('#lbiography', 'Enter Your Second Biography');
    summerNote('#education', 'Enter Your Education');
    summerNote('#workday', 'Enter Your Working Day');
    $(function() {
        ImagePriviewInsert('picture__input', 'picture__image', 'Choose Image');
    });
</script>
@endpush
