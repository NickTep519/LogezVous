 <div class="col-lg-3 col-md-12 pe-xl-4">

     <div class="simple-sidebar sm-sidebar" id="filter_search">

         <div class="search-sidebar_header">
             <h4 class="ssh_heading">Close Filter</h4>
             <button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i
                     class="fa-regular fa-circle-xmark fs-5 text-muted-2"></i></button>
         </div>

         <div class="sidebar-widgets">
             <div class="dashboard-navbar">

                 <div class="d-user-avater">
                     <img src="{{ asset('users/assets/img/team-1.jpg') }}" class="img-fluid avater"
                         alt="{{ Auth::user()->agency->name }}">
                     <h4> {{ Auth::user()->agency->name }} </h4>
                     <span> {{ Auth::user()->city }} </span>
                 </div>

                 <div class="d-navigation">
                     <ul>
                         <li class = "{{ (Route::is('dashboard.agency') ) ? 'active' : '' }}"><a
                                 href="{{ route('dashboard') }}"><i class="bi bi-speedometer me-2"></i>
                                 @lang('global.Dashboard') </a>
                         </li>
                         @role('agency_manager')
                             <li class = "{{ ( Route::is('dashboard.agents') || Route::is('dashboard.agents.create') ) ? 'active' : '' }}"><a
                                     href="{{ route('dashboard.agents')  }}">👥 @lang('global.My agents')</a></li>
                         @endrole
                         @role('agent')
                         <li class="{{ Route::is('dashboard.agent.calendar.index') ? 'active' : '' }}" >
                            <a href="{{ route('dashboard.agent.calendar.index') }}"> 🗓️ @lang('global.My Calendar') </a></li>
                        @endrole
                        <li class="{{ Route::is('dashboard.agent.schedules') ? 'active' : '' }}" >
                            <a href="{{ route('dashboard.agent.schedules') }}">⏳ @lang('global.My availability') </a></li>

                         <li class="{{ Route::is('dashboard.agent.my.appointments') ? 'active' : '' }}" >
                            <a href="{{ route('dashboard.agent.my.appointments') }}">📅 @lang('global.My appointments')</a> </li>
                         <li><a href="submit-property-dashboard.html"><i class="bi bi-patch-plus me-2"></i>Submit
                                 Property</a></li>
                         <li><a href="change-password.html"><i class="bi bi-gear me-2"></i>Settings</a></li>
                         <form action="{{ route('logout') }}" method="POST">
                             @csrf
                             <button style="all: unset ; cursor: pointer" title="{{ __('auth.Logout') }}">
                                 <li><a><i class="bi bi-power me-2"></i> @lang('auth.Logout') </a></li>
                             </button>
                         </form>
                     </ul>
                 </div>

             </div>
         </div>

     </div>
 </div>
