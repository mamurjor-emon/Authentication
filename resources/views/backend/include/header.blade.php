<!-- partial -->
<header class="mdc-top-app-bar">
    <div class="mdc-top-app-bar__row">
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
            <span class="mdc-top-app-bar__title">Greetings
                {{ Auth::user()->fname ?? '' }}-{{ Auth::user()->lname ?? '' }}</span>
            <div
                class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
                <i class="material-icons mdc-text-field__icon">search</i>
                <input class="mdc-text-field__input" id="text-field-hero-input">
                <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                        <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                </div>
            </div>
        </div>
        <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container d-none d-md-block">
                <button class="mdc-button mdc-menu-button">
                    <a title="Website" href="{{ route('index') }}"><i class="mdi mdi-earth"></i></a>
                </button>
            </div>
            <div class="menu-button-container">
                <button class="mdc-button mdc-menu-button">
                    <i class="mdi mdi-bell"></i>
                    <span class="count-indicator">
                        <span class="count" id="notificationCount">{{ formatNumber(Auth::user()->unreadNotifications->count()) }}</span>
                    </span>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1" >
                    <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" id="admin_notification">
                        @forelse (Auth::user()->unreadNotifications as $notification)
                            <li class="mdc-list-item" role="menuitem">
                                <div class="item-thumbnail item-thumbnail-icon">
                                    @if ($notification->data['status'] == 'new_user_create')
                                    <i class="mdi mdi-account-outline"></i>
                                    @else

                                    @endif
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">
                                        {{ $notification->data['message'] ?? 'New Notification' }}</h6>
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                            </li>
                        @empty
                            <p class="text-center text-danger">No Notification Found !</p>
                        @endforelse
                    </ul>
                    <div class="d-flex justify-content-center align-items-center py-3 px-5 border-top">
                        <button class="mdc-button mdc-button--unelevated filled-button--success mdc-ripple-upgraded text-white w-100">View All Notifications</button>
                    </div>
                </div>
            </div>
            <div class="divider d-none d-md-block"></div>
            <div class="menu-button-container menu-profile d-none d-md-block">
                <button class="mdc-button mdc-menu-button">
                    <span class="d-flex align-items-center">
                        <span class="figure">
                            @if (Auth::check() && Auth::user()->avatar != null)
                                <img src="{{ asset(Auth::user()->avatar ?? '') }}" alt="user" class="user" />
                            @else
                                <img src="{{ asset('common/5907-removebg-preview.png') }}" alt="user"
                                    class="user" />
                            @endif
                        </span>
                        <span class="user-name">{{ Auth::user()->fname ?? '' }}</span>
                    </span>
                </button>
                <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                    <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                        <li>
                            <a href="{{ route('admin.dashboard.profile') }}" class="mdc-list-item" role="menuitem">
                                <div class="item-thumbnail item-thumbnail-icon-only mr-2">
                                    <i class="mdi mdi-account-edit-outline text-primary"></i>
                                </div>
                                <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="item-subject font-weight-normal">Edit profile</h6>
                                </div>
                            </a>
                        </li>
                        <li class="mdc-list-item" role="menuitem">
                            <div class="item-content d-flex align-items-start flex-column justify-content-center">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="item-subject font-weight-normal border-0 bg-transparent">
                                        <div class="item-thumbnail item-thumbnail-icon-only mr-2">
                                            <i class="mdi mdi-logout text-primary"></i>
                                        </div>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- partial -->
