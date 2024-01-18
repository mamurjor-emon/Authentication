 <style>

 </style>
 <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
     <div class="mdc-drawer__header">
         <a href="{{ url('/') }}" class="brand-logo">
             <img src="{{ asset('backend/assets/images/sidebar/dark-logo.png') }}" alt="logo">
         </a>
     </div>
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
                                 <a class="mdc-drawer-link {{ $WhyChooseSection ?? '' }}" href="{{ route('admin.why.choose.index') }}">
                                     Why Choose
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link {{ $callToActionActive ?? '' }}" href="{{ route('admin.call.action.index') }}">
                                     Call Action Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link {{ $portfolioActive ?? '' }}" href="{{ route('admin.portfolio.index') }}">
                                     Portfolio Settings
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
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link {{ $appointmentActive ?? '' }}" href="{{ route('admin.appointment.index') }}">
                                     Appointment
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Newsletter Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Footer Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Footer Bottom
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
                                <a class="mdc-drawer-link {{ $blogCategorie ?? '' }}" href="">
                                    Blog Categorie
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $blogTag ?? '' }}" href="">
                                    Blog Tag
                                </a>
                            </div>
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $singleBlog ?? '' }}" href="">
                                    Single Blog
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>

                 <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-expansion-panel-link {{ $parentTitle ?? '' }}" href="#" data-toggle="expansionPanel"
                        data-target="ui-sub-menu-title">
                        <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                            aria-hidden="true">build</i>
                            Section Title
                        <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                    </a>
                    <div class="mdc-expansion-panel" id="ui-sub-menu-title" {!! $parentTitleSubMenu ?? '' !!}>
                        <nav class="mdc-list mdc-drawer-submenu">
                            <div class="mdc-list-item mdc-drawer-item">
                                <a class="mdc-drawer-link {{ $TitleDiscription ?? '' }}" href="{{ route('admin.title.discription.index') }}">
                                    All Title & Discrption
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
                         Company Settings
                         <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                     </a>
                     <div class="mdc-expansion-panel" id="ui-sub-menu-company" {!! $parentEmailSubMenu ?? '' !!}>
                         <nav class="mdc-list mdc-drawer-submenu">
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                    Company Setting
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
 </aside>
