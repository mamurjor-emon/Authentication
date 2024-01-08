<div class="{{ $parentClass ?? 'form-group' }} form-check" @if(!empty($hidden)) hidden @endif>
    <label for="{{ $id ?? '' }}" class="form-check-label">
        <input name="{{ $name }}" class="form-check-input {{ $class ?? '' }}" @if(!empty($checked)) checked @endif id="{{ $id ?? '' }}" @if(!empty($value)) value="{{ $value ?? '' }}" @endif type="checkbox" />
        {{ $labelName }}
        <i class="input-helper"></i>
    </label>
    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger error-text">{{ $message }}</span>
        @enderror
    @endif
</div>
