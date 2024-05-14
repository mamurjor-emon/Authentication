<!-- Start Department-->
<section class="departments section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ $departmentSection->title }}</h2>
                    <img src="{{ config('settings.common_image') ?? '' }}" alt="image">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="department-tab">
                    <!-- Nav Tab  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @forelse ($departments as $key => $department)
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
                        <!--/ End Tab  -->
                        <!-- Tab 2 -->
                        {{-- <div class="tab-pane fade active show" id="t-tab2" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Neurology</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra
                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam
                                            pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh. Curabitur
                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est lobortis</li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="img/department.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Tab 2 -->
                        <!-- Tab 3 -->
                        <div class="tab-pane fade" id="t-tab3" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Dentistry</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra
                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam
                                            pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh. Curabitur
                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est lobortis</li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="img/department.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Tab 3 -->
                        <!-- Tab 4 -->
                        <div class="tab-pane fade" id="t-tab4" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Gastroenterology</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra
                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam
                                            pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh. Curabitur
                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est lobortis
                                            </li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="img/department.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Tab 4 -->
                        <!-- Tab 5 -->
                        <div class="tab-pane fade" id="t-tab5" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Orthopedagogy</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra
                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam
                                            pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh. Curabitur
                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est lobortis
                                            </li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet, consectetur.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="img/department.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- End Department-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
