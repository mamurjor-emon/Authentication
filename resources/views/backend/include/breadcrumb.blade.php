<style>
    .breadcrumb-item+.breadcrumb-item::before {
        float: none !important;
        padding-right: 0rem !important;
    }

    .page-header {
        border: 1px solid #dee2e6 !important;
        display: flex;
        justify-content: space-between;
        background: white;
        align-items: center;
    }

    .page-header .material-icons {
        font-size: 20px !important;
    }
    .page-header .create-btn {
        background:var(--mdc-theme-primary);
    }
</style>
<div class="page-header border">
    <nav>
        <ol class="breadcrumb mb-0 border-0 bg-white">
            @foreach ($breadcrumb as $title => $url)
                <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                    @if ($loop->last)
                        <span class="mdc-button text-button--dark mdc-ripple-upgraded">{{ $title }}</span>
                    @else
                        <a class="mdc-button text-button--success mdc-ripple-upgraded"
                            href="{{ $url }}">{{ $title }}</a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
    @yield('add_button')
</div>
