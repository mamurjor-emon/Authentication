<div class="mb-3 coupon_error {{ $parentClass ?? '' }}">
    @if (!empty($labelName))
        <label class="form-label {{ $required ?? '' }}" for="{{ $name }}">{{ $labelName ?? '' }}</label>
    @endif
    <div class="input-group input-group-merge">
        <input type="{{ $type ?? 'text' }}" id="{{ $name }}" class="form-control {{ $class ?? '' }} ps-1" name="{{ $name }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}" @if(!empty($required)) required="" @endif>
        <span class="input-group-text {{ $buttonClass ?? '' }}" style="cursor: pointer">{!! $icon !!}</span>
    </div>
    @if (!empty($inputText))<span class="input-optional w-100">{!! $inputText !!}</span>@endif
        @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger error-text">{{ $message }}</span>
        @enderror
    @endif
</div>
