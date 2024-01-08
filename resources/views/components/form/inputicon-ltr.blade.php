<div class="form-group {{ $parentClass ?? '' }}">
    @if (!empty($labelName))
        <label class="form-label" for="{{ $name }}">{{ $labelName ?? '' }}</label>
    @endif
    <div class="input-group input-group-merge">
        <span class="input-group-text">{!! $iconLeft !!}</span>
        <input type="{{ $type ?? 'text' }}" id="{{ $name }}" class="form-control {{ $class ?? '' }} ps-1" name="{{ $name }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}">
        <span class="input-group-text">{!! $iconRight !!}</span>
    </div>
    @if (!empty($inputText))<span class="input-optional w-100">{!! $inputText !!}</span>@endif
</div>
