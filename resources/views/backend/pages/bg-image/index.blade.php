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

                    <form method="POST" action="{{ route('admin.title.discription.team.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Team Section</label>
                                <div>
                                    <label class="fourth_picture" for="fourth__image" tabIndex="0">
                                        <span class="picture_fourth_image"></span>
                                    </label>
                                    <input type="file" name="team_image" id="fourth__image">
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

                    <form method="POST" action="{{ route('admin.title.discription.client.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Client Section</label>
                                <div>
                                    <label class="fivth_picture" for="fivth__image" tabIndex="0">
                                        <span class="picture_fivth_image"></span>
                                    </label>
                                    <input type="file" name="client_image" id="fivth__image">
                                    @error('client_image')
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

                    <form method="POST" action="{{ route('admin.title.discription.breadcrumb.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Breadcrumb Image</label>
                                <div>
                                    <label class="sixth_picture" for="sixth__image" tabIndex="0">
                                        <span class="picture_sixth_image"></span>
                                    </label>
                                    <input type="file" name="breadcrumb_image" id="sixth__image">
                                    @error('breadcrumb_image')
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

                    <form method="POST" action="{{ route('admin.title.discription.common.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Common Image</label>
                                <div>
                                    <label class="seventh_picture" for="seventh__image" tabIndex="0">
                                        <span class="picture_seventh_image"></span>
                                    </label>
                                    <input type="file" name="common_image" id="seventh__image">
                                    @error('common_image')
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

                    <form method="POST" action="{{ route('admin.title.discription.common.white.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Common White Image</label>
                                <div>
                                    <label class="eghit_picture" for="eghit__image" tabIndex="0">
                                        <span class="picture_eghit_image"></span>
                                    </label>
                                    <input type="file" name="common_white_image" id="eghit__image">
                                    @error('common_white_image')
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
        ImagePriviewInsert('fourth__image', 'picture_fourth_image', 'Choose Team Image');
        ImagePriviewInsert('fivth__image', 'picture_fivth_image', 'Choose Client Image');
        ImagePriviewInsert('sixth__image', 'picture_sixth_image', 'Choose Breadcrumb Image');
        ImagePriviewInsert('seventh__image', 'picture_seventh_image', 'Choose Common Section Image');
        ImagePriviewInsert('eghit__image', 'picture_eghit_image', 'Choose Common White Section Image');
    });
</script>
<script>
    var fun_fact_image     =  "{{ config('settings.funfact_image') ?? '' }}";
    var call_action_image  =  "{{ config('settings.call_action_image') ?? '' }}";
    var testimonial_image  =  "{{ config('settings.testimonials_image') ?? '' }}";
    var team_image         =  "{{ config('settings.team_image') ?? '' }}";
    var client_image       =  "{{ config('settings.client_image') ?? '' }}";
    var breadcrumb_image   =  "{{ config('settings.breadcrumb_image') ?? '' }}";
    var common_image       =  "{{ config('settings.common_image') ?? '' }}";
    var common_white_image =  "{{ config('settings.common_white_image') ?? '' }}";

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

    if (team_image != '') {
        var myTeamData = "{{ asset(config('settings.team_image') ?? '') }}";
        $(function() {
            ImagePriviewUpdate('fourth__image', 'picture_fourth_image', 'Choose Team Image', myTeamData);
        });
    }

    if (client_image != '') {
        var myClientData = "{{ asset(config('settings.client_image') ?? '') }}";
        $(function() {
            ImagePriviewUpdate('fivth__image', 'picture_fivth_image', 'Choose Client Image', myClientData);
        });
    }

    if (breadcrumb_image != '') {
        var myBreadcrumbData = "{{ asset(config('settings.breadcrumb_image') ?? '') }}";
        $(function() {
            ImagePriviewUpdate('sixth__image', 'picture_sixth_image', 'Choose Breadcrumb Image', myBreadcrumbData);
        });
    }

    if (common_image != '') {
        var myCommonData = "{{ asset(config('settings.common_image') ?? '') }}";
        $(function() {
            ImagePriviewUpdate('seventh__image', 'picture_seventh_image', 'Choose Common Section Image', myCommonData);
        });
    }

    if (common_white_image != '') {
        var myCommonWhiteData = "{{ asset(config('settings.common_white_image') ?? '') }}";
        $(function() {
            ImagePriviewUpdate('eghit__image', 'picture_eghit_image', 'Choose Common White Section Image', myCommonWhiteData);
        });
    }

</script>
@endpush
