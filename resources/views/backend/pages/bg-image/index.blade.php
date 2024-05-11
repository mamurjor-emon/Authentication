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
                    <form method="POST" action="{{ route('admin.title.discription.funfact.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium fw-bloder">Fun Facts Section Image</label>
                                <div>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name="funfact_image" id="picture__input">
                                    @error('funfact_image')
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

                    <form method="POST" action="{{ route('admin.title.discription.call.action.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Call To Action Section</label>
                                <div>
                                    <label class="second_picture" for="second__image" tabIndex="0">
                                        <span class="picture_second_image"></span>
                                    </label>
                                    <input type="file" name="call_action_image" id="second__image">
                                    @error('call_action_image')
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

                    <form method="POST" action="{{ route('admin.title.discription.testimonials.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Testimonials  Section</label>
                                <div>
                                    <label class="third_picture" for="third__image" tabIndex="0">
                                        <span class="picture_third_image"></span>
                                    </label>
                                    <input type="file" name="testimonials_image" id="third__image">
                                    @error('testimonials_image')
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

                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Team  Section</label>
                                <div>
                                    <label class="third_picture" for="third__image" tabIndex="0">
                                        <span class="picture_third_image"></span>
                                    </label>
                                    <input type="file" name="team_image" id="third__image">
                                    @error('team_image')
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
        ImagePriviewInsert('picture__input', 'picture__image', 'Choose Fun Facts Image');
        ImagePriviewInsert('second__image', 'picture_second_image', 'Choose Call To Action Image');
        ImagePriviewInsert('third__image', 'picture_third_image', 'Choose Testimonials  Image');
    });
</script>
<script>
    var fun_fact_image = "{{ config('settings.funfact_image') ?? '' }}";
    var call_action_image =  "{{ config('settings.call_action_image') ?? '' }}";
    var testimonial_image =  "{{ config('settings.testimonials_image') ?? '' }}";

    if (fun_fact_image != '') {
        var myData = "{{ asset(config('settings.funfact_image') ?? '') }}";
        $(function() {
            ImagePriviewUpdate('picture__input', 'picture__image', 'Choose Fun Facts Image', myData);
        });
    }

    if (call_action_image != '') {
        var myActionData = "{{ asset(config('settings.call_action_image') ?? '') }}";
        $(function() {
            ImagePriviewUpdate('second__image', 'picture_second_image', 'Choose Call To Action Image', myActionData);
        });
    }

    if (testimonial_image != '') {
        var myTestimonialData = "{{ asset(config('settings.testimonials_image') ?? '') }}";
        $(function() {
            ImagePriviewUpdate('third__image', 'picture_third_image', 'Choose Testimonials Image', myTestimonialData);
        });
    }

</script>
@endpush
