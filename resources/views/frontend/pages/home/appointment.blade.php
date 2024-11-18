<!-- Start Appointment -->
<style>
    .appointment .ui-state-highlight,
    .ui-widget-content .ui-state-highlight,
    .ui-widget-header .ui-state-highlight {
        border: 1px solid var(--primary-color) !important;
        background: var(--primary-color) !important;
        color: var(--white) !important;
        display: flex;
        justify-content: center;
        align-items: ;
    }

    .appointment .ui-state-default,
    .ui-widget-content .ui-state-default,
    .ui-widget-header .ui-state-default,
    .ui-button,
    html .ui-button.ui-state-disabled:hover,
    html .ui-button.ui-state-disabled:active {
        border: 1px solid #c5c5c5;
        background: #f6f6f6;
        font-weight: normal;
        color: #454545;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .appointment  .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
	border: 1px solid transparent;
	background: #007fff;
	font-weight: normal;
	color: #ffffff;
}
</style>
<section class="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ config('settings.appointment_section_title') ?? '' }}</h2>
                    <img src="{{ asset(config('settings.common_image')) }}" alt="#">
                    <p>{{ config('settings.appointment_section_description') ?? '' }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form method="POST" class="form" action="{{ route('appointment.booking.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="name" type="text" placeholder="Name" value="{{ Auth::check() ? Auth::user()->fname : old('name') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="email" type="email" placeholder="Email" value="{{ Auth::check() ? Auth::user()->email : old('email') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0">
                                    <span class="current">Select Department</span>
                                    <ul class="list" id="departments">
                                        @forelse ($departments as $department)
                                            <li data-value="{{ $department->id ?? '' }}" class="option">
                                                {{ $department->name ?? '' }}
                                            </li>
                                        @empty
                                            <li class="text-danger text-center" data-value="" class="option">
                                                No Department Found!
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                                <input type="hidden" name="department_id" id="selectedDepartment">
                                @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0">
                                    <span class="current">Select Doctor</span>
                                    <ul class="list" id="departmentdoctors">
                                    </ul>
                                </div>
                                <input type="hidden" name="doctor_id" id="selectedDoctor">
                                @error('doctor_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input type="text" name="date" placeholder="Date" id="datepicker" class="js-ui-datepicker" readonly>
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0">
                                    <span class="current">Select Slot</span>
                                    <ul class="list" id="slots">
                                    </ul>
                                </div>
                                <input type="hidden" name="slot_id" id="selectedSlots">
                                @error('slot_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <textarea name="message" placeholder="Write Your Reason Here....."></textarea>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="form-group">
                                <div class="button">
                                    <button type="submit"
                                        class="btn">{{ config('settings.appointment_btn_title') ?? '' }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8 col-12">
                            <p>{{ config('settings.appointment_title') ?? '' }}</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 ">
                <div class="appointment-image">
                    <img src="{{ asset(config('settings.appointment_image') ?? '') }}" alt="appointment image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Appointment -->

<!-- Include jQuery and jQuery UI -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Include jQuery UI -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!-- Include jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<script>
    $(document).ready(function () {
        $('#departments').on('click', '.option', function () {
            const selectedValue = $(this).data('value');
            $('#selectedDepartment').val(selectedValue);
        });

        $('#departmentdoctors').on('click', '.option', function () {
            const selectedValue = $(this).data('value');
            $('#selectedDoctor').val(selectedValue);
        });

        $('#slots').on('click', '.option', function () {
            const selectedValue = $(this).data('value');
            $('#selectedSlots').val(selectedValue);
        });
    });

    $(document).ready(function() {
        $('#departments').on('click', '.option', function() {
            var departmentId = $(this).data('value');
            $.ajax({
                url: "{{ route('appointment.booking.department.doctor') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    id: departmentId,
                },
                async: true,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#departmentdoctors').html('');
                    if (data.status == 'success') {
                        $('#departmentdoctors').html(data.doctors);
                    }
                }
            });
        });
    });
</script>
<script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $('.js-ui-datepicker').datepicker({
            minDate: 0,
            showButtonPanel: true,
            beforeShowDay: function(date) {
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                date.setHours(0, 0, 0, 0);
                var dayDiff = Math.floor((date - today) / (1000 * 60 * 60 * 24));
                return dayDiff >= 0 && dayDiff < 10 ? [true] : [false];
            },
            onSelect: function(selectedDate) {
                var doctorId = $('#selectedDoctor').val();
                $.ajax({
                    url: "{{ route('appointment.booking.slots') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        selectedDate: selectedDate,
                        doctorId: doctorId,
                    },
                    async: true,
                    cache: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#slots').html('');
                        if (data.status == 'success') {
                            $('#slots').html(data.slots);
                        }
                    }
                });
            }
        });
    });
</script>

