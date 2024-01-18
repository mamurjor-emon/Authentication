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
                    <form method="POST" action="{{ route('admin.menu.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <x-form.textbox labelName="Name" parantClass="col-12 col-md-6" name="name"
                                required="required" placeholder="Enter Menu Name..!" errorName="name" class="py-2"
                                value="{{ old('name') }}"></x-form.textbox>

                            <x-form.textbox labelName="Slug" parantClass="col-12 col-md-6" name="slug"
                                required="required" placeholder="Enter Menu Slug..!" errorName="slug" class="py-2"
                                value="{{ old('slug') }}"></x-form.textbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Url" parantClass="col-12 col-md-6" name="url" required="required"
                                placeholder="Enter Menu Url..!" errorName="url" class="py-2"
                                value="{{ old('url') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="target"
                                required="required" labelName="Target" errorName="target">
                                <option value="0">Same Page</option>
                                <option value="1">New Page</option>
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="parent_id"
                                required="required" labelName="Parent Menu" errorName="parent_id" id="parent_id">
                                <option value="">Select Parent Menu</option>
                                @forelse ($parentMenu as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @empty
                                @endforelse
                            </x-form.selectbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="child_id"
                                required="required" labelName="Sub Menu" errorName="child_id" id="subMenu">
                                <option value="0">Select Sub Menu</option>
                            </x-form.selectbox>
                        </div>
                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" placeholder="Enter Menu Order By..!" errorName="order_by" class="py-2"
                                value="{{ $totalMenus->count() + 1 }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="status"
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
        var _token = "{{ csrf_token() }}";
        $(document).on('change', '#parent_id', function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('admin.menu.get.sub.senu') }}",
                data: {
                    _token: _token,
                    id: id,
                },
                success: function(res) {
                    var selectBox = $("#subMenu");
                    selectBox.empty();
                    if (res.data.length > 0) {
                        var option = $('<option>').val('0').text('Select Sub Menu');
                        selectBox.append(option);
                        selectBox.css('color', '#596680');
                        $.each(res.data, function(index, value) {
                            var option = $('<option>').val(value.id).text(value.name);
                            selectBox.append(option);
                        });
                    } else {
                        selectBox.css('color', 'red');
                        var option = $('<option>').val('0').html(
                            '<span class="text-danger"> No Sub Menu Found</span>');
                        selectBox.append(option);
                    }
                }
            })
        })
    </script>
@endpush
