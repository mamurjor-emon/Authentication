<div class="form-group {{ $parentClass ?? '' }}">
    <div class="form-check my-0">
        <label class="form-check-label">
            <input type="radio" class="form-check-input {{ $class ?? '' }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value ?? '' }}" @if(!empty($checked)) checked @endif/>
            @if (!empty($labelName))
                {{ $labelName }}
            @endif
            <i class="input-helper"></i>
        </label>
    </div>

    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger error-text">{{ $message }}</span>
        @enderror
    @endif
</div>
