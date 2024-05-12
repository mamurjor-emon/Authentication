
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay" style="background-image: url('{{ asset(config('settings.breadcrumb_image') ?? '') }}')">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>{{ $title }}</h2>
                    <ul class="bread-list">
                        @foreach ($breadcrumb as $title => $url)
                            @if ($loop->last)
                                <li class="active">{{ $title }}</li>
                            @else
                                <li><a href="{{ $url }}">{{ $title }}</a></li>
                                <li><i class="icofont-simple-right"></i></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
