 <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
     <div class="mdc-drawer__header">
         <a href="index.html" class="brand-logo">
             <img src="{{ asset('backend/assets/images/sidebar/dark-logo.png') }}" alt="logo">
         </a>
     </div>
     <div class="mdc-drawer__content">
         {{-- <div class="user-info">
             <p class="name">Clyde Miles</p>
             <p class="email">clydemiles@elenor.us</p>
         </div> --}}
         <div class="mdc-list-group">
             <nav class="mdc-list mdc-drawer-menu">
                 <div class="mdc-list-item mdc-drawer-item">
                     <a class="mdc-drawer-link" href="{{ route('admin.dashboard') }}">
                         <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                             aria-hidden="true">dashboard</i>
                         Dashboard
                     </a>
                 </div>

                 <div class="mdc-list-item mdc-drawer-item">
                     <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                         data-target="ui-sub-menu">
                         <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                             aria-hidden="true">home</i>
                         Home Settings
                         <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                     </a>
                     <div class="mdc-expansion-panel" id="ui-sub-menu">
                         <nav class="mdc-list mdc-drawer-submenu">
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="{{ route('admin.menu.index') }}">
                                     Menu Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Silder Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Schedule Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Feautes Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Fun Facts Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Why Choose
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Call Action Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Portfolio Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Services Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Pricing Table
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Blog Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                     Clients Settings
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
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
                     <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                         data-target="ui-sub-menu-company">
                         <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                             aria-hidden="true">settings</i>
                         Company Settings
                         <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                     </a>
                     <div class="mdc-expansion-panel" id="ui-sub-menu-company">
                         <nav class="mdc-list mdc-drawer-submenu">
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="">
                                    Company Setting
                                 </a>
                             </div>
                             <div class="mdc-list-item mdc-drawer-item">
                                 <a class="mdc-drawer-link" href="{{ route('admin.email.templates.index') }}">
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
