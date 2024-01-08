<div class="form-group {{ $parantClass ?? '' }}">
    @if(!empty($alert))<span class="alert-label">{{ $alert }}</span>@endif
    @if(!empty($labelName))
        <label class="{{ $labelClass ?? '' }}{{ $required ?? '' }}" for="{{ $name }}">{{ $labelName }} @if(!empty($optionalText)) <span class="label-optional">{{ $optionalText }}</span> @endif</label>
    @endif

    <select class="form-select form-control {{ $class ?? '' }}" id="{{ $id ?? '' }}" name="{{ $name }}" @if(!empty($onchange)) onchange="{{ $onchange }}" @endif @if(!empty($multiple)) @if(!empty($required)) required="" @endif multiple @endif>
        {{ $slot }}
    </select>


    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger error-text">{{ $message }}</span>
        @enderror
    @endif
</div>

