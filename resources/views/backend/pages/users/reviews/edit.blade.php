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
                    <form method="POST" action="{{ route('admin.user.management.reviews.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <input type="hidden" name="update_id" value="{{ $editReview->id }}">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="user_id"
                                required="required" labelName="User" errorName="user_id">
                                <option value="">Select User</option>
                                @forelse ($clients as $client)
                                <option value="{{ $client->id }}" {{ $editReview->user_id  == $client->id ? 'selected' : '' }}>{{ $client->fname .' '. $client->lname }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>

                            <x-form.textbox labelName="Oder By" parantClass="col-12 col-md-6" name="order_by"
                            required="required" errorName="order_by" class="py-2"
                            value="{{ $editReview->order_by ?? old('order_by') }}"></x-form.textbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Review" parantClass="col-md-6" name="review"
                                required="required" errorName="review" value="{{ $editReview->review ?? old('review') }}"></x-form.textarea>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editReview->status == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $editReview->status == '1' ? 'selected' : '' }}>Publish</option>
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
        $('#review').summernote({
            placeholder: 'Enter Your Text',
            tabsize: 2,
            height: 100
        });
    </script>
@endpush
