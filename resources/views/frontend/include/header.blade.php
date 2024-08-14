<!-- Header Area -->
<header class="header">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-12">
                    <!-- Top Contact -->
                    <ul class="top-contact">
                        <li><i class="fa fa-phone"></i>{{ config('settings.theme_phone') ?? ''  }}</li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:{{ config('settings.theme_email') ?? '' }}">{{ config('settings.theme_email') ?? '' }}</a>
                        </li>
                    </ul>
                    <!-- End Top Contact -->
                </div>
                <div class="col-lg-6 col-md-5 col-12">
                    <!-- Contact -->
                    <ul class="top-link">
                        @auth
                            <div class="btn-group">
                                <button type="button"  class="primary-color py-2 px-3" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <a data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                        @if (Auth::check() && Auth::user()->fname != null)
                                            {{ Auth::user()->fname }}
                                        @endif
                                    </a>
                                </button>
                                <div class="dropdown-menu">
                                    @if (Auth::check() && Auth::user()->role->slug == 'admin')
                                        <li><a class="dropdown-item" style="line-height: 32px;" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    @elseif(Auth::check() && Auth::user()->role->slug == 'doctor')
                                        <li><a class="dropdown-item" style="line-height: 32px;" href="{{ route('doctor.dashboard') }}">Dashboard</a></li>
                                    @else
                                        <li><a class="dropdown-item" style="line-height: 32px;" href="{{ route('client.dashboard') }}">Dashboard</a></li>
                                    @endif
                                    <li><a class="dropdown-item" style="line-height: 32px; cursor: pointer;" onclick="document.getElementById('logout-form').submit()">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @else
                            <li><a href="{{ route('login') }}"><i class="fa fa-solid fa-user me-1"></i> Login</a></li> <span class="mr-2">|</span>
                            <li><a href="{{ route('user.register') }}"><i class="fa fa-user-plus mr-2" aria-hidden="true"></i>Register</a></li>
                        @endauth
                    </ul>

                    <!-- End Contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset(config('settings.theme_primary_logo')) ?? '' }}"
                                    alt="#"></a>
                        </div>
                        <!-- End Logo -->
                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    @php
                        $parentMenus = App\Models\Menu::where('parent_id', 0)->where('status', '1')->orderBy('order_by','asc')->get();
                    @endphp
                    <div class="col-lg-7 col-md-9 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    @forelse ($parentMenus->take(6) as $key=>$parentMenu)
                                        @php
                                            $subMenus = DB::table('menus')
                                                ->where('parent_id', $parentMenu->id)
                                                ->where('child_id', 0)
                                                ->where('status', '1')
                                                ->get();

                                        @endphp
                                        <li class="{{ $key == 0 ? 'active' : '' }}">
                                            <a href="{{ $parentMenu->url ?? '' }}">{{ $parentMenu->name ?? '' }}
                                                {!! $subMenus->count() > 0 ? '<i class="icofont-rounded-down"></i>' : '' !!}</a>
                                            @if ($subMenus->count() > 0)
                                                <ul class="dropdown">
                                                    @forelse ($subMenus as $subMenu)
                                                        <li><a href="{{ $subMenu->url ?? '' }}">{{ $subMenu->name }}</a></li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @else
                                            @endif
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    <div class="col-lg-2 col-12">
                        <div class="get-quote">
                            <a href="{{ config('settings.theme_btn_url') ?? '' }}" class="btn">{{ config('settings.theme_btn_text') ?? '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!-- End Header Area -->
