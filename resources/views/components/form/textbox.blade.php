<div class="{{ $parantClass ?? '' }} form-group">
    @if(!empty($alert))<span class="alert-label">{{ $alert }}</span>@endif
    @if(!empty($labelName))
        <label for="{{ $name }}"  class="{{ $labelClass ?? '' }} {{ $required ?? '' }}">{{ $labelName }} @if(!empty($optionalText)) <span class="label-optional">{{ $optionalText }}</span> @endif</label>
    @endif

    <input type="{{ $type ?? 'text' }}" class="form-control form-control-sm {{ $class ?? '' }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" aria-describedby="{{ $name }}" tabindex="1" autofocus="" value="{{ $value ?? '' }}" @if(!empty($required)) required="" @endif @if(!empty($readonly)) readonly="" @endif >

    @if (!empty($inputText))<span class="input-optional w-100">{!! $inputText !!}</span>@endif


    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger error-text">{{ $message }}</span>
        @enderror
    @endif
</div>

