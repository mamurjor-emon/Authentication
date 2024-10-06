
<!-- Start Appointment -->
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
                <form class="form" action="#">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="name" type="text" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="phone" type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0"><span class="current">Select
                                        Department</span>
                                    <ul class="list" id="departments">
                                        @forelse ($departments as $department)
                                            <li data-value="{{ $department->id ?? '' }}" class="option">
                                                {{ $department->name ?? '' }}</li>
                                        @empty
                                            <li class="text-danger text-center" data-value="" class="option">No
                                                Department Found !</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0"><span class="current">Select
                                        Doctor</span>
                                    <ul class="list" id="departmentdoctors">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Date"  id="datepicker" class="js-ui-datepicker" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <textarea name="message" placeholder="Write Your Message Here....."></textarea>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
     $('.js-ui-datepicker').one('focus', function() {
        $('.js-ui-datepicker').datepicker({
            minDate: 0,
            showButtonPanel: true,
            beforeShowDay: function(date) {
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                date.setHours(0, 0, 0, 0);
                var dayDiff = Math.floor((date - today) / (1000 * 60 * 60 * 24));
                console.log("Day Difference:", dayDiff);
                if (dayDiff >= 0 && dayDiff < 10) {
                    return [true];
                }
                return [false];
            }
        }).datepicker('show');
    });

    $(document).ready(function() {
        $('#departments').on('click', '.option', function() {
            var departmentId = $(this).data('value');
            $.ajax({
                url: "{{ route('frontend.department.doctor') }}",
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
