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
                    <form method="POST" action="{{ route('admin.theme.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Support Phone Number" parantClass="col-12 col-md-6"
                                name="theme_phone" placeholder="Enter Support Phone Number..!" errorName="theme_phone"
                                class="py-2"
                                value="{{ config('settings.theme_phone') ?? old('theme_phone') }}"></x-form.textbox>

                            <x-form.textbox labelName="Support Email" parantClass="col-12 col-md-6" name="theme_email"
                                placeholder="Enter Support Email..!" errorName="theme_email" class="py-2"
                                value="{{ config('settings.theme_email') ?? old('theme_email') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Primary Logo</label>
                                <div>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name="theme_primary_logo" id="picture__input">
                                    @error('theme_primary_logo')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Secondary Logo</label>
                                <div>
                                    <label class="second_picture" for="second__image" tabIndex="0">
                                        <span class="picture_second_image"></span>
                                    </label>
                                    <input type="file" name="theme_secondary_logo" id="second__image">
                                    @error('theme_secondary_logo')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Appontment Button Text" parantClass="col-12 col-md-6"
                                name="theme_btn_text" placeholder="Enter Appontment Button Text..!"
                                errorName="theme_btn_text" class="py-2"
                                value="{{ config('settings.theme_btn_text') ?? old('theme_btn_text') }}"></x-form.textbox>

                            <x-form.textbox labelName="Appontment Button Url" parantClass="col-12 col-md-6"
                                name="theme_btn_url" placeholder="Enter Appontment Button Url..!" errorName="theme_btn_url"
                                class="py-2"
                                value="{{ config('settings.theme_btn_url') ?? old('theme_btn_url') }}"></x-form.textbox>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Feautes Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.feautes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Feautes Title" parantClass="col-12 col-md-6" name="feautes_title"
                                placeholder="Enter Feautes Title..!" errorName="feautes_title" class="py-2"
                                value="{{ config('settings.feautes_title') ?? old('feautes_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Feautes Description" parantClass="col-12 col-md-6"
                                name="feautes_description" placeholder="Enter Feautes Description..!"
                                errorName="feautes_description" class="py-2"
                                value="{{ config('settings.feautes_description') ?? old('feautes_description') }}"></x-form.textbox>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Fun Facts Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.feautes.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Fun Facts Section Image</label>
                                <div>
                                    <label class="third_picture" for="third__image" tabIndex="0">
                                        <span class="picture_third_image"></span>
                                    </label>
                                    <input type="file" name="funfact_image" id="third__image">
                                    @error('funfact_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Why Choose Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.why.choose.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Why Choose Section Title" parantClass="col-12 col-md-6"
                                name="why_choose_section_title" placeholder="Enter Why Choose Section Title..!"
                                errorName="why_choose_section_title" class="py-2"
                                value="{{ config('settings.why_choose_section_title') ?? old('why_choose_section_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Why Choose  Section Description" parantClass="col-12 col-md-6"
                                name="why_choose_section_description"
                                placeholder="Enter Why Choose Section Description..!"
                                errorName="why_choose_section_description" class="py-2"
                                value="{{ config('settings.why_choose_section_description') ?? old('why_choose_section_description') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Why Choose Title" parantClass="col-12 col-md-6"
                                name="why_choose_title" placeholder="Enter Why Choose Title..!"
                                errorName="why_choose_title" class="py-2"
                                value="{{ config('settings.why_choose_title') ?? old('why_choose_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Youtube Url" parantClass="col-12 col-md-6"
                                name="why_choose_youtube_url" placeholder="Enter Youtube Url..!" errorName="youtube_url"
                                class="py-2"
                                value="{{ config('settings.why_choose_youtube_url') ?? old('youtube_url') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="First Discription" parantClass="col-md-6"
                                name="why_choose_f_title" errorName="why_choose_f_title"
                                value="{{ config('settings.why_choose_f_title') ?? old('why_choose_f_title') }}"></x-form.textarea>

                            <x-form.textarea labelName="Second Description" parantClass="col-md-6"
                                name="why_choose_s_title" errorName="why_choose_s_title"
                                value="{{ config('settings.why_choose_s_title') ?? old('why_choose_s_title') }}"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Third Description" parantClass="col-md-6"
                                name="why_choose_t_title" errorName="why_choose_t_title"
                                value="{{ config('settings.why_choose_t_title') ?? old('why_choose_t_title') }}"></x-form.textarea>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Image</label>
                                <div>
                                    <label class="fourth_picture" for="fourth__image" tabIndex="0">
                                        <span class="picture_fourth_image"></span>
                                    </label>
                                    <input type="file" name="why_choose_image" id="fourth__image">
                                    @error('why_choose_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Call To Action</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.call.to.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Call To Action Title" parantClass="col-12 col-md-6"
                                name="call_to_title" placeholder="Enter Call To Action Title..!"
                                errorName="call_to_title" class="py-2"
                                value="{{ config('settings.call_to_title') ?? old('call_to_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Call To Action First Button Title" parantClass="col-12 col-md-6"
                                name="call_to_f_btn_title" placeholder="Enter  First Button Title..!"
                                errorName="call_to_f_btn_title" class="py-2"
                                value="{{ config('settings.call_to_f_btn_title') ?? old('call_to_f_btn_title') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Call To Action First Button Url" parantClass="col-12 col-md-6"
                                name="call_to_f_btn_url" placeholder="Enter First Button Url..!"
                                errorName="call_to_f_btn_url" class="py-2"
                                value="{{ config('settings.call_to_f_btn_url') ?? old('call_to_f_btn_url') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2"
                                name="call_to_f_btn_target" labelName="Call To Action First Button Target"
                                errorName="call_to_f_btn_target">
                                <option value="0"
                                    {{ config('settings.call_to_f_btn_target') == '0' ? 'selected' : '' }}>
                                    Same Tab</option>
                                <option value="1"
                                    {{ config('settings.call_to_f_btn_target') == '1' ? 'selected' : '' }}>
                                    New Tab</option>
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Call To Action Last Button Title" parantClass="col-12 col-md-6"
                                name="call_to_l_btn_title" placeholder="Enter Last Button Title..!"
                                errorName="call_to_l_btn_title" class="py-2"
                                value="{{ config('settings.call_to_l_btn_title') ?? old('call_to_l_btn_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Call To Action Last Button Url" parantClass="col-12 col-md-6"
                                name="call_to_l_btn_url" placeholder="Enter Last Button Url..!"
                                errorName="call_to_l_btn_url" class="py-2"
                                value="{{ config('settings.call_to_l_btn_url') ?? old('call_to_l_btn_url') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2"
                                name="call_to_l_btn_target" labelName="Call To Action Last Button Target"
                                errorName="call_to_l_btn_target">
                                <option value="0"
                                    {{ config('settings.call_to_l_btn_target') == '0' ? 'selected' : '' }}>
                                    Same Tab</option>
                                <option value="1"
                                    {{ config('settings.call_to_l_btn_target') == '1' ? 'selected' : '' }}>
                                    New Tab</option>
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Call To Action Sub Title" parantClass="col-md-6"
                                name="call_to_sub_title" errorName="call_to_sub_title"
                                value="{!! config('settings.call_to_sub_title') ?? old() !!}"></x-form.textarea>
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Section Bg Image</label>
                                <div>
                                    <label class="fivth_picture" for="fivth__image" tabIndex="0">
                                        <span class="picture_fivth_image"></span>
                                    </label>
                                    <input type="file" name="call_action_image" id="fivth__image">
                                    @error('call_action_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Portfolio Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.portfolio.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Portfolio Title" parantClass="col-12 col-md-6"
                                name="portfolio_section_title" placeholder="Enter Portfolio Title..!"
                                errorName="portfolio_section_title" class="py-2"
                                value="{{ config('settings.portfolio_section_title') ?? old('portfolio_section_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Portfolio Description" parantClass="col-12 col-md-6"
                                name="portfolio_section_description" placeholder="Enter Portfolio Description..!"
                                errorName="portfolio_section_description" class="py-2"
                                value="{{ config('settings.portfolio_section_description') ?? old('portfolio_section_description') }}"></x-form.textbox>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Services Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.services.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Services Title" parantClass="col-12 col-md-6"
                                name="services_section_title" placeholder="Enter Services Title..!"
                                errorName="services_section_title" class="py-2"
                                value="{{ config('settings.services_section_title') ?? old('services_section_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Services Description" parantClass="col-12 col-md-6"
                                name="services_section_description" placeholder="Enter Services Description..!"
                                errorName="services_section_description" class="py-2"
                                value="{{ config('settings.services_section_description') ?? old('services_section_description') }}"></x-form.textbox>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Testimonials Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.testimonials.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Testimonials Title" parantClass="col-12 col-md-6"
                                name="testimonials_section_title" placeholder="Enter Testimonials Title..!"
                                errorName="testimonials_section_title" class="py-2"
                                value="{{ config('settings.testimonials_section_title') ?? old('testimonials_section_title') }}"></x-form.textbox>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Testimonials Image</label>
                                <div>
                                    <label class="sixth_picture" for="sixth__image" tabIndex="0">
                                        <span class="picture_sixth_image"></span>
                                    </label>
                                    <input type="file" name="testimonials_image" id="sixth__image">
                                    @error('testimonials_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Departments Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.departments.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Departments Title" parantClass="col-12 col-md-6"
                                name="departments_section_title" placeholder="Enter Departments Title..!"
                                errorName="departments_section_title" class="py-2"
                                value="{{ config('settings.departments_section_title') ?? old('departments_section_title') }}"></x-form.textbox>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Pricing Table Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.pricing.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Pricing Table Title" parantClass="col-12 col-md-6"
                                name="pricing_section_title" placeholder="Enter Pricing Title..!"
                                errorName="pricing_section_title" class="py-2"
                                value="{{ config('settings.pricing_section_title') ?? old('pricing_section_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Pricing Description" parantClass="col-12 col-md-6"
                                name="pricing_section_description" placeholder="Enter Pricing Description..!"
                                errorName="pricing_section_description" class="py-2"
                                value="{{ config('settings.pricing_section_description') ?? old('pricing_section_description') }}"></x-form.textbox>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Team Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.team.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Team Section Title" parantClass="col-12 col-md-6"
                                name="team_section_title" placeholder="Enter Team Title..!"
                                errorName="team_section_title" class="py-2"
                                value="{{ config('settings.team_section_title') ?? old('team_section_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Team Section Description" parantClass="col-12 col-md-6"
                                name="team_section_description" placeholder="Enter Team Description..!"
                                errorName="team_section_description" class="py-2"
                                value="{{ config('settings.team_section_description') ?? old('team_section_description') }}"></x-form.textbox>
                        </div>
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Team Section Image</label>
                                <div>
                                    <label class="seventh_picture" for="seventh__image" tabIndex="0">
                                        <span class="picture_seventh_image"></span>
                                    </label>
                                    <input type="file" name="team_image" id="seventh__image">
                                    @error('team_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Blog Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.blog.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Blog Section Title" parantClass="col-12 col-md-6"
                                name="blog_section_title" placeholder="Enter Blog Title..!"
                                errorName="blog_section_title" class="py-2"
                                value="{{ config('settings.blog_section_title') ?? old('blog_section_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Blog Section Description" parantClass="col-12 col-md-6"
                                name="blog_section_description" placeholder="Enter Blog Description..!"
                                errorName="blog_section_description" class="py-2"
                                value="{{ config('settings.blog_section_description') ?? old('blog_section_description') }}"></x-form.textbox>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Client Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.client.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Client Image</label>
                                <div>
                                    <label class="eghit_picture" for="eghit__image" tabIndex="0">
                                        <span class="picture_eghit_image"></span>
                                    </label>
                                    <input type="file" name="client_image" id="eghit__image">
                                    @error('client_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Appointment Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.appointment.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Appointment Section Title" parantClass="col-12 col-md-6"
                                name="appointment_section_title" placeholder="Enter Appointment Section Title..!"
                                errorName="appointment_section_title" class="py-2"
                                value="{{ config('settings.appointment_section_title') ?? old('appointment_section_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Appointment Section Description" parantClass="col-12 col-md-6"
                                name="appointment_section_description"
                                placeholder="Enter Appointment Section Description..!"
                                errorName="appointment_section_description" class="py-2"
                                value="{{ config('settings.appointment_section_description') ?? old('appointment_section_description') }}"></x-form.textbox>
                        </div>
                        <div class="row g-5">
                            <x-form.textbox labelName="Appointment Title" parantClass="col-12 col-md-6"
                                name="appointment_title" placeholder="Enter Title..!" errorName="appointment_title"
                                class="py-2"
                                value="{{ config('settings.appointment_title') ?? old('appointment_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Appointment Button Title" parantClass="col-12 col-md-6"
                                name="appointment_btn_title" placeholder="Enter Appointment Button Title..!"
                                errorName="appointment_btn_title" class="py-2"
                                value="{{ config('settings.appointment_btn_title') ?? old('appointment_btn_title') }}"></x-form.textbox>
                        </div>
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Appointment Section Image</label>
                                <div>
                                    <label class="nine_picture" for="nine__image" tabIndex="0">
                                        <span class="picture_nine_image"></span>
                                    </label>
                                    <input type="file" name="appointment_image" id="nine__image">
                                    @error('appointment_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Newsletter Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.newsletter.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Newsletter Section Title" parantClass="col-12 col-md-6"
                                name="newsletter_section_title" placeholder="Enter Newsletter Section Title..!"
                                errorName="newsletter_section_title" class="py-2"
                                value="{{ config('settings.newsletter_section_title') ?? old('newsletter_section_title') }}"></x-form.textbox>

                            <x-form.textbox labelName="Newsletter Section Description" parantClass="col-12 col-md-6"
                                name="newsletter_section_description"
                                placeholder="Enter Newsletter Section Description..!"
                                errorName="newsletter_section_description" class="py-2"
                                value="{{ config('settings.newsletter_section_description') ?? old('newsletter_section_description') }}"></x-form.textbox>
                        </div>
                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Sosal Media</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.sosal.media.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Facebook" parantClass="col-12 col-md-6" name="facebook"
                                placeholder="Enter Facebook ..!" errorName="facebook" class="py-2"
                                value="{{ config('settings.facebook') ?? old('facebook') }}"></x-form.textbox>

                            <x-form.textbox labelName="Twitter" parantClass="col-12 col-md-6" name="twitter"
                                placeholder="Enter Twitter ..!" errorName="twitter" class="py-2"
                                value="{{ config('settings.twitter') ?? old('twitter') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Linkedin" parantClass="col-12 col-md-6" name="linkedin"
                                placeholder="Enter Linkedin ..!" errorName="linkedin" class="py-2"
                                value="{{ config('settings.linkedin') ?? old('linkedin') }}"></x-form.textbox>

                            <x-form.textbox labelName="Instagram" parantClass="col-12 col-md-6" name="instagram"
                                placeholder="Enter Instagram ..!" errorName="instagram" class="py-2"
                                value="{{ config('settings.instagram') ?? old('instagram') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Youtube" parantClass="col-12 col-md-6" name="youtube"
                                placeholder="Enter Youtube ..!" errorName="youtube" class="py-2"
                                value="{{ config('settings.youtube') ?? old('youtube') }}"></x-form.textbox>

                            <x-form.textbox labelName="Whatsapp" parantClass="col-12 col-md-6" name="whatsapp"
                                placeholder="Enter Whatsapp ..!" errorName="whatsapp" class="py-2"
                                value="{{ config('settings.whatsapp') ?? old('whatsapp') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Tiktok" parantClass="col-12 col-md-6" name="tiktok"
                                placeholder="Enter Tiktok ..!" errorName="tiktok" class="py-2"
                                value="{{ config('settings.tiktok') ?? old('tiktok') }}"></x-form.textbox>

                            <x-form.textbox labelName="Telegram" parantClass="col-12 col-md-6" name="telegram"
                                placeholder="Enter Telegram ..!" errorName="telegram" class="py-2"
                                value="{{ config('settings.telegram') ?? old('telegram') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Pinterest" parantClass="col-12 col-md-6" name="pinterest"
                                placeholder="Enter Pinterest ..!" errorName="pinterest" class="py-2"
                                value="{{ config('settings.pinterest') ?? old('pinterest') }}"></x-form.textbox>

                            <x-form.textbox labelName="Reddit" parantClass="col-12 col-md-6" name="reddit"
                                placeholder="Enter Reddit ..!" errorName="reddit" class="py-2"
                                value="{{ config('settings.reddit') ?? old('reddit') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Quora" parantClass="col-12 col-md-6" name="quora"
                                placeholder="Enter Quora ..!" errorName="quora" class="py-2"
                                value="{{ config('settings.quora') ?? old('quora') }}"></x-form.textbox>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Footer Section</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.footer.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Footer Title" parantClass="col-md-6" name="footer_title"
                                errorName="footer_title"
                                value="{{ config('settings.footer_title') ?? old('footer_title') }}"></x-form.textarea>

                            <x-form.textarea labelName="Quik Links Left" parantClass="col-md-6" name="quik_links_left"
                                errorName="quik_links_left"
                                value="{{ config('settings.quik_links_left') ?? old('quik_links_left') }}"></x-form.textarea>
                        </div>
                        <div class="row g-5">
                            <x-form.textarea labelName="Quik Links Right" parantClass="col-md-6" name="quik_links_right"
                                errorName="quik_links_right"
                                value="{{ config('settings.quik_links_right') ?? old('quik_links_right') }}"></x-form.textarea>

                            <x-form.textarea labelName="Open Hours Title" parantClass="col-md-6" name="open_hours_title"
                                errorName="open_hours_title"
                                value="{{ config('settings.open_hours_title') ?? old('open_hours_title') }}"></x-form.textarea>
                        </div>

                        <div class="row g-5">
                            <x-form.textarea labelName="Open Hours Time" parantClass="col-md-6" name="open_hours_time"
                                errorName="open_hours_time"
                                value="{{ config('settings.open_hours_time') ?? old('open_hours_time') }}"></x-form.textarea>

                            <x-form.textarea labelName="Newsletter Title" parantClass="col-md-6" name="newslettter_title"
                                errorName="newslettter_title"
                                value="{{ config('settings.newslettter_title') ?? old('newslettter_title') }}"></x-form.textarea>
                        </div>

                        <div class="row g-5">
                            <x-form.textarea labelName="Copy Rights" parantClass="col-md-6" name="copy_rignts"
                                errorName="copy_rignts"
                                value="{{ config('settings.copy_rignts') ?? old('copy_rignts') }}"></x-form.textarea>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
                    <h2 class="backend-title">Common Image</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.theme.common.image.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Breadcrumb Image</label>
                                <div>
                                    <label class="ten_picture" for="ten__image" tabIndex="0">
                                        <span class="picture_ten_image"></span>
                                    </label>
                                    <input type="file" name="breadcrumb_image" id="ten__image">
                                    @error('breadcrumb_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Common Image</label>
                                <div>
                                    <label class="eleven_picture" for="eleven__image" tabIndex="0">
                                        <span class="picture_eleven_image"></span>
                                    </label>
                                    <input type="file" name="common_image" id="eleven__image">
                                    @error('common_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Common White Image</label>
                                <div>
                                    <label class="twelve_picture" for="twelve__image" tabIndex="0">
                                        <span class="picture_twelve_image"></span>
                                    </label>
                                    <input type="file" name="common_white_image" id="twelve__image">
                                    @error('common_white_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Favicon</label>
                                <div>
                                    <label class="thirteen_picture" for="thirteen__image" tabIndex="0">
                                        <span class="picture_thirteen_image"></span>
                                    </label>
                                    <input type="file" name="favicon" id="thirteen__image">
                                    @error('favicon')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end align-items-center mt-3">
                            <button type="submit"
                                class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded">Save</button>
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
        summerNote('#why_choose_f_title', 'Enter Your First Discription');
        summerNote('#why_choose_s_title', 'Enter Your Second Discription');
        summerNote('#why_choose_t_title', 'Enter Your Third Discription');
        summerNote('#call_to_sub_title', 'Enter Your Call To Action Sub Title');
        summerNote('#footer_title', 'Enter Your Footer Title');
        summerNote('#quik_links_left', 'Enter Your Quik Links Left');
        summerNote('#quik_links_right', 'Enter Your Quik Links Right');
        summerNote('#open_hours_title', 'Enter Your Open Hours Title');
        summerNote('#open_hours_time', 'Enter Your Open Hours Time');
        summerNote('#newslettter_title', 'Enter Your Newslettter Title');
        summerNote('#copy_rignts', 'Enter Your Copy Rignts');

        $(function() {
            ImagePriviewInsert('picture__input', 'picture__image', 'Choose Primary Logo');
            ImagePriviewInsert('second__image', 'picture_second_image', 'Choose Secondary Logo');
            ImagePriviewInsert('third__image', 'picture_third_image', 'Choose Fun Facts Image');
            ImagePriviewInsert('fourth__image', 'picture_fourth_image', 'Who Choose Image');
            ImagePriviewInsert('fivth__image', 'picture_fivth_image', 'Choose Section Bg');
            ImagePriviewInsert('sixth__image', 'picture_sixth_image', 'Choose Testimonials Bg');
            ImagePriviewInsert('seventh__image', 'picture_seventh_image', 'Choose Team Bg');
            ImagePriviewInsert('eghit__image', 'picture_eghit_image', 'Choose Client Bg');
            ImagePriviewInsert('nine__image', 'picture_nine_image', 'Appointment Image');
            ImagePriviewInsert('ten__image', 'picture_ten_image', 'Breadcrumb Image');
            ImagePriviewInsert('eleven__image', 'picture_eleven_image', 'Common Image');
            ImagePriviewInsert('twelve__image', 'picture_twelve_image', 'Common White Image');
            ImagePriviewInsert('thirteen__image', 'picture_thirteen_image', 'Favicon');
        });
    </script>
    <script>
        var theme_primary_logo = "{{ config('settings.theme_primary_logo') ?? '' }}";
        var theme_secondary_logo = "{{ config('settings.theme_secondary_logo') ?? '' }}";
        var fun_fact_image = "{{ config('settings.funfact_image') ?? '' }}";
        var why_choose_image = "{{ config('settings.why_choose_image') ?? '' }}";
        var call_to_image = "{{ config('settings.call_action_image') ?? '' }}";
        var testimonials_image = "{{ config('settings.testimonials_image') ?? '' }}";
        var team_image = "{{ config('settings.team_image') ?? '' }}";
        var client_image = "{{ config('settings.client_image') ?? '' }}";
        var appointment_image = "{{ config('settings.appointment_image') ?? '' }}";
        var breadcrumb_image = "{{ config('settings.breadcrumb_image') ?? '' }}";
        var common_image = "{{ config('settings.common_image') ?? '' }}";
        var common_white_image = "{{ config('settings.common_white_image') ?? '' }}";
        var favicon_image = "{{ config('settings.favicon') ?? '' }}";


        if (theme_primary_logo != '') {
            var myData = "{{ asset(config('settings.theme_primary_logo') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('picture__input', 'picture__image', 'Choose Primary Logo', myData);
            });
        }

        if (theme_secondary_logo != '') {
            var myActionData = "{{ asset(config('settings.theme_secondary_logo') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('second__image', 'picture_second_image', 'Choose Secondary Logo',
                    myActionData);
            });
        }

        if (fun_fact_image != '') {
            var my_fun_fact = "{{ asset(config('settings.funfact_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('third__image', 'picture_third_image', 'Choose Fun Facts Image', my_fun_fact);
            });
        }

        if (why_choose_image != '') {
            var my_why_choose_image = "{{ asset(config('settings.why_choose_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('fourth__image', 'picture_fourth_image', 'Who Choose Image',
                    my_why_choose_image);
            });
        }

        if (call_to_image != '') {
            var my_call_to_image = "{{ asset(config('settings.call_action_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('fivth__image', 'picture_fivth_image', 'Choose Section Bg', my_call_to_image);
            });
        }

        if (testimonials_image != '') {
            var my_testimonials_image = "{{ asset(config('settings.testimonials_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('sixth__image', 'picture_sixth_image', 'Choose Testimonials Bg',
                    my_testimonials_image);
            });
        }

        if (team_image != '') {
            var my_team_image = "{{ asset(config('settings.team_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('seventh__image', 'picture_seventh_image', 'Choose Team Bg', my_team_image);
            });
        }

        if (client_image != '') {
            var myClientData = "{{ asset(config('settings.client_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('eghit__image', 'picture_eghit_image', 'Choose Client Bg', myClientData);
            });
        }

        if (appointment_image != '') {
            var my_appointment_image = "{{ asset(config('settings.appointment_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('nine__image', 'picture_nine_image', 'Appointment Image', my_appointment_image);
            });
        }

        if (breadcrumb_image != '') {
            var my_breadcrumb_image = "{{ asset(config('settings.breadcrumb_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('ten__image', 'picture_ten_image', 'Breadcrumb Image', my_breadcrumb_image);
            });
        }

        if (common_image != '') {
            var my_common_image = "{{ asset(config('settings.common_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('eleven__image', 'picture_eleven_image', 'Common Image', my_common_image);
            });
        }

        if (common_white_image != '') {
            var my_common_white_image = "{{ asset(config('settings.common_white_image') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('twelve__image', 'picture_twelve_image', 'Common White Image', my_common_white_image);
            });
        }

        if (favicon_image != '') {
            var my_favicon_image = "{{ asset(config('settings.favicon') ?? '') }}";
            $(function() {
                ImagePriviewUpdate('thirteen__image', 'picture_thirteen_image', 'Favicon', my_favicon_image);
            });
        }
    </script>
@endpush


