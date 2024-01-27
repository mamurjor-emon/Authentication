@extends('layouts.app')
@section('title', $title)
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo/image-style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card px-3 py-3">
                <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                    <h2 class="backend-title">{{ $title }}</h2>
                </div>
                <div class="menu-create-form">
                    <form method="POST" action="{{ route('admin.blog.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="update_id" value="{{ $editBlog->id }}">
                        <div class="row g-5">
                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="categorie_id"
                                required="required" labelName="Categorie" errorName="categorie_id">
                                <option value="0">Select Categorie</option>
                                @if (!empty($categories))
                                    @forelse ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"
                                            {{ $editBlog->categorie_id == $categorie->id ? 'selected' : '' }}>
                                            {{ $categorie->categorie_name }}</option>
                                    @empty
                                    @endforelse
                                @endif
                            </x-form.selectbox>
                             @php
                                $getTags = json_decode($editBlog->tag_ids);
                                $getSocal = json_decode($editBlog->socal_media);
                            @endphp
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Tags<span class="required"></span></label>
                                <select class="js-select2 form-control" multiple="multiple" name="tags[]">
                                    @if (!empty($tags))
                                        @forelse ($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ in_array($tag->id,$getTags) ? 'selected' : '' }}>{{ $tag->tag_name }}</option>
                                        @empty
                                        @endforelse
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row g-5">
                            <x-form.textbox labelName="Title" parantClass="col-12 col-md-6" name="title"
                                required="required" placeholder="Enter  Title..!" errorName="title" class="py-2"
                                value="{{ $editBlog->title ?? old('title') }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control py-2" name="tag"
                                required="required" labelName="Tag" errorName="tag">
                                <option value="0" {{ $editBlog->tag == '0' ? 'selected' : ''}}>No</option>
                                <option value="1" {{ $editBlog->tag == '1' ? 'selected' : ''}}>Yes</option>
                            </x-form.selectbox>
                        </div>

                        <div class="row g-5 mt-2">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Image<span class="required"></span></label>
                                <div>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>
                                    <input type="file" name="image" id="picture__input">
                                    @error('image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="text-warning">Image Fixed Width 557px & Height 373px</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">First Image</label>
                                <div>
                                    <label class="first__picture" for="first__image" tabIndex="0">
                                        <span class="picture__first"></span>
                                    </label>
                                    <input type="file" name="f_image" id="first__image">
                                    @error('f_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="text-warning">Image Fixed Width 557px & Height 373px</p>
                            </div>
                        </div>

                        <div class="row g-5 mt-2">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Last Image</label>
                                <div>
                                    <label class="second_picture" for="second__image" tabIndex="0">
                                        <span class="picture__second"></span>
                                    </label>
                                    <input type="file" name="l_image" id="second__image">
                                    @error('l_image')
                                        <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="text-warning">Image Fixed Width 557px & Height 373px</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium">Socal Media<span
                                        class="required"></span></label>
                                <select class="js-select2 form-control" multiple="multiple" name="socal_media[]">
                                    @if (!empty($socalMedias))
                                        @forelse ($socalMedias as $socalMedia)
                                            <option value="{{ $socalMedia->id }}"  {{ in_array($socalMedia->id,$getSocal) ? 'selected' : '' }}>{!! $socalMedia->name !!}</option>
                                        @empty
                                        @endforelse
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Sub Title" parantClass="col-md-6" name="sub_title"
                                required="required" errorName="sub_title" value="{!! $editBlog->sub_title ?? old('sub_title') !!}"></x-form.textarea>

                            <x-form.textarea labelName="First Description" parantClass="col-md-6" name="f_discrption"
                                required="required" errorName="f_discrption" value="{!! $editBlog->f_discrption ?? old('f_discrption') !!}"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Second Description" parantClass="col-md-6" name="s_discrption"
                                errorName="s_discrption" value="{!! $editBlog->s_discrption ?? old('s_discrption') !!}"></x-form.textarea>

                            <x-form.textarea labelName="Third Description" parantClass="col-md-6" name="t_discrption"
                                errorName="t_discrption" value="{!! $editBlog->t_discrption ?? old('t_discrption') !!}"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Fouth Description" parantClass="col-md-6" name="l_discrption"
                                errorName="l_discrption" value="{!! $editBlog->l_discrption ??  old('l_discrption') !!}"></x-form.textarea>

                            <x-form.textarea labelName="Meta Title" parantClass="col-md-6" name="meta_title"
                                errorName="meta_title" value="{!! $editBlog->meta_title ?? old('meta_title') !!}"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textarea labelName="Meta Key Word" parantClass="col-md-6" name="meta_keyword"
                                errorName="meta_keyword" value="{!! $editBlog->meta_keyword ?? old('meta_keyword') !!}"></x-form.textarea>

                            <x-form.textarea labelName="Meta Description" parantClass="col-md-6" name="meta_discrption"
                                errorName="meta_discrption" value="{!! $editBlog->meta_discrption ?? old('meta_discrption') !!}"></x-form.textarea>
                        </div>

                        <div class="row g-5 mt-2">
                            <x-form.textbox labelName="Order By" parantClass="col-12 col-md-6" name="order_by"
                                required="required" errorName="order_by" class="py-3"
                                value="{{ $editBlog->order_by ??  1 }}"></x-form.textbox>

                            <x-form.selectbox parantClass="col-12 col-md-6" class="form-control" name="status"
                                required="required" labelName="Status" errorName="status">
                                <option value="0" {{ $editBlog->status == '0' ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $editBlog->status == '1' ? 'selected' : '' }}>Publish</option>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".js-select2").select2({
                closeOnSelect: false,
                placeholder: "Choose Socal Media !",
                allowClear: true,
                tags: true
            });
        });
    </script>

    <script>
        function summernoteFunction(id, text) {
            $(id).summernote({
                placeholder: text,
                tabsize: 2,
                height: 100
            });
        }
        summernoteFunction('#sub_title', 'Enter Your Sub Title')
        summernoteFunction('#f_discrption', 'Enter Your First Description')
        summernoteFunction('#s_discrption', 'Enter Your Second Description')
        summernoteFunction('#t_discrption', 'Enter Your Third Description')
        summernoteFunction('#l_discrption', 'Enter Your Fourt Description')
        summernoteFunction('#meta_title', 'Enter Your Meta Title')
        summernoteFunction('#meta_keyword', 'Enter Your Meta Key Word')
        summernoteFunction('#meta_discrption', 'Enter Your Meta Description')

        $(function() {
            ImagePriviewInsert('picture__input', 'picture__image', 'Choose Image');
            ImagePriviewInsert('first__image', 'picture__first', 'Choose First Image');
            ImagePriviewInsert('second__image', 'picture__second', 'Choose Second Image');
        });
    </script>
    <script>
        var image = "{{ $editBlog->image ?? '' }}";
        var firstImage = "{{ $editBlog->f_image ?? '' }}";
        var secondImage = "{{ $editBlog->l_image ?? '' }}";

        if (image != '') {
            var myData = "{{ asset($editBlog->image ?? '') }}";
            $(function() {
                ImagePriviewUpdate('picture__input', 'picture__image', 'Choose Image', myData);
            });
        }
        if (firstImage != '') {
            var myData = "{{ asset($editBlog->f_image ?? '') }}";
            $(function() {
                ImagePriviewUpdate('first__image', 'picture__first', 'Choose First Image', myData);
            });
        }
        if (secondImage != '') {
            var myData = "{{ asset($editBlog->l_image ?? '') }}";
            $(function() {
                ImagePriviewUpdate('second__image', 'picture__second', 'Choose Second Image', myData);
            });
        }
    </script>
@endpush