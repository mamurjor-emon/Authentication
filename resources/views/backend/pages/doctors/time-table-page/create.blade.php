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
                    <form method="POST" action="{{ route('admin.doctor.time-page.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="user_id"
                                required="required" labelName="User" id="user_id" errorName="user_id">
                                <option value="">Select User</option>
                                @forelse ($doctors as $doctor)
                                    <option value="{{ $doctor->user->id }}">
                                        {{ $doctor->user->fname . '-' . $doctor->user->lname . '-' . $doctor->user->email }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" id="day_id"
                                name="day_id" required="required" labelName="Day" errorName="day_id">
                                <option value="">Select Day</option>
                                @forelse ($days as $day)
                                    <option value="{{ $day->id }}">{{ $day->name }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="time"
                                required="required" labelName="Time" errorName="time" id="time">
                                <option value="">Select Time</option>
                            </x-form.selectbox>
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
@push('scripts')
    <script>
        $(document).on('change', '#day_id', function() {
            var user_id = $('#user_id').val();
            var day_id = $(this).val();
            $.ajax({
                url: "{{ route('admin.doctor.time-page.get-time') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    user_id: user_id,
                    day_id: day_id,
                },
                success: function(res) {
                   var times = $('#time');
                   if(res.status == 'success'){
                        times.empty();
                        times.append(res.data);
                   };
                }
            });
        })
    </script>
@endpush
