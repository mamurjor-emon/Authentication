 <style>

 </style>
 <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
     <div class="mdc-drawer__header">
         <a href="{{ url('/') }}" class="brand-logo">
             <img src="{{ asset(config('settings.theme_secondary_logo')) }}" alt="logo">
         </a>
     </div>
     @if (Auth::user()->role->slug == 'super_admin' || Auth::user()->role->slug == 'admin')
     <div class="mdc-drawer__content">
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ $dashboard ?? '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">dashboard</i>
                        Dashboard
                    </a>
                </div>

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link {{ $parentHomeMenu ?? '' }}" href="#" data-toggle="expansionPanel"
                        data-target="ui-sub-menu">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">home</i>
                        Home Settings
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="ui-sub-menu" {!! $parentHomeSubMenu ?? '' !!}>
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $Menus ?? '' }}" href="{{ route('admin.menu.index') }}">
                                    Menu Settings
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $Silders ?? '' }}" href="{{ route('admin.slider.index') }}">
                                    Silder Settings
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $Schedule ?? '' }}" href="{{ route('admin.schedule.index') }}">
                                    Schedule Settings
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $Feautes ?? '' }}" href="{{ route('admin.feautes.index') }}">
                                    Feautes Settings
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $Fun_facts ?? '' }}" href="{{ route('admin.fun_facts.index') }}">
                                    Fun Facts Settings
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $servicesActive ?? '' }}" href="{{ route('admin.services.index') }}">
                                    Services Settings
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $pricingActive ?? '' }}" href="{{ route('admin.pricing.index') }}">
                                    Pricing Table
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $Clients ?? '' }}" href="{{ route('admin.clients.index') }}">
                                    Clients Settings
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="mdc-list-item mdc-drawer-item">
                   <a class="mdc-expansion-panel-link {{ $parentDoctors ?? '' }}" href="#" data-toggle="expansionPanel"
                       data-target="ui-sub-menu-doctors">
                       <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                           aria-hidden="true">group_add</i>
                           Doctors Section
                       <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                   </a>
                   <div class="mdc-expansion-panel" id="ui-sub-menu-doctors" {!! $parentDoctorsSubMenu ?? '' !!}>
                       <nav class="mdc-list mdc-drawer-submenu">
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $doctorDepartment ?? '' }}" href="{{ route('admin.doctor.department.index') }}">
                                   Add Department
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $addDoctor ?? '' }}" href="{{ route('admin.doctor.index') }}">
                                   Add Doctor
                               </a>
                           </div>
                       </nav>
                   </div>
               </div>

                <div class="mdc-list-item mdc-drawer-item">
                   <a class="mdc-expansion-panel-link {{ $parentTimeTable ?? '' }}" href="#" data-toggle="expansionPanel"
                       data-target="ui-sub-menu-time-table">
                       <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                           aria-hidden="true">access_time</i>
                          Time Table
                       <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                   </a>
                   <div class="mdc-expansion-panel" id="ui-sub-menu-time-table" {!! $parentTimeTableSubMenu ?? '' !!}>
                       <nav class="mdc-list mdc-drawer-submenu">
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $addSlot ?? '' }}" href="{{ route('admin.doctor.slot.index') }}">
                                   Add Slot
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $addDay ?? '' }}" href="{{ route('admin.doctor.day.index') }}">
                                   Add Day
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $timeTable ?? '' }}" href="{{ route('admin.doctor.time-table.index') }}">
                                   Time Table
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $timeTablePage ?? '' }}" href="{{ route('admin.doctor.time-page.index') }}">
                                   Time Table Page
                               </a>
                           </div>
                       </nav>
                   </div>
               </div>

                <div class="mdc-list-item mdc-drawer-item">
                   <a class="mdc-expansion-panel-link {{ $parentPortfolio ?? '' }}" href="#" data-toggle="expansionPanel"
                       data-target="ui-sub-menu-portfolio">
                       <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                           aria-hidden="true">local_library</i>
                           Portfolio Section
                       <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                   </a>
                   <div class="mdc-expansion-panel" id="ui-sub-menu-portfolio" {!! $parentPortfolioSubMenu ?? '' !!}>
                       <nav class="mdc-list mdc-drawer-submenu">
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $protfolioCategorie ?? '' }}" href="{{ route('admin.portfolio.categories.index') }}">
                                   Portfolio Categories
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $portfolioActive ?? '' }}" href="{{ route('admin.portfolio.index') }}">
                                   Portfolio Settings
                               </a>
                           </div>
                       </nav>
                   </div>
               </div>

                <div class="mdc-list-item mdc-drawer-item">
                   <a class="mdc-expansion-panel-link {{ $parentBlogs ?? '' }}" href="#" data-toggle="expansionPanel"
                       data-target="ui-sub-menu-blog">
                       <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                           aria-hidden="true">book</i>
                           Blog Section
                       <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                   </a>
                   <div class="mdc-expansion-panel" id="ui-sub-menu-blog" {!! $parentBlogsSubMenu ?? '' !!}>
                       <nav class="mdc-list mdc-drawer-submenu">
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $blogCategorie ?? '' }}" href="{{ route('admin.blog.categories.index') }}">
                                   Blog Categories
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $blogTag ?? '' }}" href="{{ route('admin.blog.tags.index') }}">
                                   Blog Tags
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $singleBlog ?? '' }}" href="{{ route('admin.blog.index') }}">
                                   Single Blog
                               </a>
                           </div>
                       </nav>
                   </div>
               </div>

                <div class="mdc-list-item mdc-drawer-item">
                   <a class="mdc-expansion-panel-link {{ $parentPages ?? '' }}" href="#" data-toggle="expansionPanel"
                       data-target="ui-sub-menu-pages">
                       <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                           aria-hidden="true">pages</i>
                           Pages Section
                       <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                   </a>
                   <div class="mdc-expansion-panel" id="ui-sub-menu-pages" {!! $parentPagesSubMenu ?? '' !!}>
                       <nav class="mdc-list mdc-drawer-submenu">
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $ContactPageActive ?? '' }}" href="{{ route('admin.contact.contact.index') }}">
                                   Contact Page
                               </a>
                           </div>
                       </nav>
                   </div>
               </div>

                <div class="mdc-list-item mdc-drawer-item">
                   <a class="mdc-expansion-panel-link {{ $parentSocal ?? '' }}" href="#" data-toggle="expansionPanel"
                       data-target="ui-sub-menu-socal">
                       <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                           aria-hidden="true">share</i>
                           Socal Section
                       <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                   </a>
                   <div class="mdc-expansion-panel" id="ui-sub-menu-socal" {!! $parentSocalSubMenu ?? '' !!}>
                       <nav class="mdc-list mdc-drawer-submenu">
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $socalMedia ?? '' }}" href="{{ route('admin.socal.media.index') }}">
                                   Blog Socal Media
                               </a>
                           </div>
                       </nav>
                   </div>
               </div>

                <div class="mdc-list-item mdc-drawer-item">
                   <a class="mdc-expansion-panel-link {{ $parentUserManage ?? '' }}" href="#" data-toggle="expansionPanel"
                       data-target="ui-sub-menu-user-management">
                       <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                           aria-hidden="true">people_outline</i>
                          User Management
                       <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                   </a>
                   <div class="mdc-expansion-panel" id="ui-sub-menu-user-management" {!! $parentUserManageSubMenu ?? '' !!}>
                       <nav class="mdc-list mdc-drawer-submenu">
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $allAdmins ?? '' }}" href="{{ route('admin.user.management.admins') }}">
                                  All Admins
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $allDoctors ?? '' }}" href="{{ route('admin.user.management.doctors') }}">
                                  Active Doctors
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $allPendingDoctors ?? '' }}" href="{{ route('admin.user.management.pending.doctors') }}">
                                   Pending Doctors
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $cancelDoctors ?? '' }}" href="{{ route('admin.user.management.cancel.doctors') }}">
                                   Cancel Doctors
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $allClients ?? '' }}" href="{{ route('admin.user.management.clients') }}">
                                  All Clients
                               </a>
                           </div>
                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $allSubscribers ?? '' }}" href="{{ route('admin.user.management.subscribers') }}">
                                  All Subscribers
                               </a>
                           </div>

                           <div class="mdc-list-item mdc-drawer-item">
                               <a class="mdc-drawer-link {{ $allReview ?? '' }}" href="{{ route('admin.user.management.reviews') }}">
                                  All Review
                               </a>
                           </div>
                       </nav>
                   </div>
               </div>

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link {{ $parentCompanyMenu ?? '' }}" href="#" data-toggle="expansionPanel"
                        data-target="ui-sub-menu-company">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">settings</i>
                            Appearance
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="ui-sub-menu-company" {!! $parentEmailSubMenu ?? '' !!}>
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $themeSettings ?? '' }}" href="{{ route('admin.theme.index') }}">
                                   Theme Settings
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $emailTemplate ?? '' }}" href="{{ route('admin.email.templates.index') }}">
                                    Email Templates
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>

            </nav>
        </div>
    </div>
     @elseif(Auth::user()->role->slug == 'doctor')
     <div class="mdc-drawer__content">
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ $dashboard ?? '' }}" href="">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">dashboard</i>
                        Dashboard
                    </a>
                </div>

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link {{ $parentHomeMenu ?? '' }}" href="#" data-toggle="expansionPanel"
                        data-target="ui-sub-menu">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">home</i>
                        Home Settings
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="ui-sub-menu" {!! $parentHomeSubMenu ?? '' !!}>
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $Menus ?? '' }}" href="">
                                    Menu Settings
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
    </div>
     @elseif(Auth::user()->role->slug == 'client')
     <div class="mdc-drawer__content">
        <div class="mdc-list-group">
            <nav class="mdc-list mdc-drawer-menu">
                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link {{ $dashboard ?? '' }}" href="">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">dashboard</i>
                        Dashboard
                    </a>
                </div>

                <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link {{ $parentHomeMenu ?? '' }}" href="#" data-toggle="expansionPanel"
                        data-target="ui-sub-menu">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">home</i>
                        Home Settings
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="ui-sub-menu" {!! $parentHomeSubMenu ?? '' !!}>
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $Menus ?? '' }}" href="">
                                    Menu Settings
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </nav>
        </div>
    </div>
     @endif
 </aside>
