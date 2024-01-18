<div class="mb-1 {{ $parantClass ?? '' }}">
    @if(!empty($labelName))
    <label for="{{ $name }}" class="form-label {{ $required ?? '' }}">{{ $labelName }}</label>
    @endif
    <input type="{{ $type ?? 'date' }}" class="form-control form-control-sm {{ $class ?? '' }}" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" aria-describedby="{{ $name }}" tabindex="1" autofocus="" value="{{ $value ?? '' }}">
    @if(!empty($alert))<span class="alert-label">{{ $alert }}</span>@endif
    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger error-text">{{ $message }}</span>
        @enderror
    @endif
</div>
