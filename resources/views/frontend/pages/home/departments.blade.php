<!-- Start Department-->
<section class="departments section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ config('settings.departments_section_title') ?? '' }}</h2>
                    <img src="{{ asset(config('settings.common_image')) ?? '' }}" alt="image">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="department-tab">
                    <!-- Nav Tab  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @forelse ($departments->take(5) as $key => $department)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab" href="#t-tab{{ $key }}" role="tab" aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                 {!! $department->icon !!}
                                <span class="first">{{ $department->name }}</span>
                                <span class="second">{{ $department->sub_name }}</span>
                            </a>
                        </li>
                        @empty
                        @endforelse
                    </ul>
                    <!--/ End Nav Tab -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Tab  -->
                        @forelse ($departments as $key => $department)
                            <div class="tab-pane {{ $key == 0 ? 'active show' : '' }} fade" id="t-tab{{ $key }}" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="department-left">
                                            <h3>{{ $department->name ?? '' }}</h3>
                                            {!! $department->description !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="department-right">
                                            <img src="{{ $department->image }}" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <!-- End Department-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
