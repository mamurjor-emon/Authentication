<div class="{{ $parentClass ?? '' }}">
    <button type="{{ $type ?? 'submit' }}" id="{{ $id ?? '' }}" class="btn btn-outline-primary {{ $class ?? '' }}">
        <div class="spinner-grow text-light d-none me-1" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>      
    {{ $btnTitle }}</button>
</div>
