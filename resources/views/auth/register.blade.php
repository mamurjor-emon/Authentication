<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - {{ env('APP_NAME') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.png') }}" />
</head>

<body>
    <script src="{{ asset('backend/assets/js/preloader.js') }}"></script>
    <div class="body-wrapper">
        <div class="main-wrapper">
            <div class="page-wrapper full-page-wrapper d-flex align-items-center justify-content-center">
                <main class="auth-page">
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet">
                            </div>
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-6-tablet">
                                <div class="mdc-card">
                                    <form method="POST" action="{{ route('user.register') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="logo d-flex align-items-center justify-content-center">
                                            <a href="{{ url('/') }}"><img src="{{ asset('frontend/assets/img/logo.png') }}"
                                                    alt="Logo"></a>
                                        </div>
                                        <div class="mdc-layout-grid">
                                            <div class="mdc-layout-grid__inner">
                                                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                                                    <div class="mdc-text-field w-100">
                                                        <input class="mdc-text-field__input" id="text-field-hero-input"
                                                            name="fname" type="text">
                                                        <div class="mdc-line-ripple"></div>
                                                        <label for="text-field-hero-input"
                                                            class="mdc-floating-label">First Name <span
                                                                class="required"></span></label>
                                                    </div>
                                                    @error('fname')
                                                        <span class="text-danger error-text mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div
                                                    class="mdc-layout-grid__cell  mdc-layout-grid__cell--span-12">
                                                    <div class="mdc-text-field w-100">
                                                        <input class="mdc-text-field__input" id="text-field-hero-input"
                                                            name="lname" type="text">
                                                        <div class="mdc-line-ripple"></div>
                                                        <label for="text-field-hero-input"
                                                            class="mdc-floating-label">Last Name <span
                                                                class="required"></span></label>
                                                    </div>
                                                    @error('lname')
                                                        <span class="text-danger error-text mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div
                                                    class="mdc-layout-grid__cell  mdc-layout-grid__cell--span-12">
                                                    <div class="mdc-text-field w-100">
                                                        <input class="mdc-text-field__input" id="text-field-hero-input"
                                                            name="email" type="email">
                                                        <div class="mdc-line-ripple"></div>
                                                        <label for="text-field-hero-input"
                                                            class="mdc-floating-label">Email <span
                                                                class="required"></span></label>
                                                    </div>
                                                    @error('email')
                                                        <span class="text-danger error-text mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mdc-layout-grid__cell  mdc-layout-grid__cell--span-12">
                                                    <div class="mdc-text-field w-100">
                                                        <input class="mdc-text-field__input" type="password"
                                                            id="text-field-hero-input" name="password">
                                                        <div class="mdc-line-ripple"></div>
                                                        <label for="text-field-hero-input"
                                                            class="mdc-floating-label">Password <span
                                                                class="required"></span></label>
                                                    </div>
                                                    @error('password')
                                                        <span class="text-danger error-text mt-2">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mdc-layout-grid__cell  mdc-layout-grid__cell--span-12">
                                                    <div class="mdc-text-field w-100">
                                                        <input class="mdc-text-field__input" type="password"
                                                            id="text-field-hero-input" name="password_confirmation">
                                                        <div class="mdc-line-ripple"></div>
                                                        <label for="text-field-hero-input"
                                                            class="mdc-floating-label">Confirmation Password<span class="required"></span></label>
                                                    </div>
                                                    @error('password_confirmation')
                                                        <span class="text-danger error-text">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div
                                                    class="mdc-form-field mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 align-items-center">
                                                    <span class="mr-2">You Have An Account ? </span><a
                                                        class="text-primary" href="{{ route('login') }}">Login
                                                        Now</a>
                                                </div>
                                                <div
                                                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                                    <button type="submit"
                                                        class="mdc-button mdc-button--raised w-100">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <!-- plugins:js -->
    <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('backend/assets/js/material.js') }}"></script>
    <script src="{{ asset('backend/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>
