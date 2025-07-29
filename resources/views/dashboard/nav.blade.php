   <div class="header header-light head-shadow">
       <div class="container">
           <nav id="navigation" class="navigation navigation-landscape">
               <div class="nav-header">
                   <a class="nav-brand text-logo" href="{{ route('home') }}">
                       <span class="svg-icon text-main svg-icon-2hx">
                           <svg width="50" height="50" viewBox="0 0 24 24" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                               <path
                                   d="M15.8797 15.375C15.9797 15.075 15.9797 14.775 15.9797 14.475C15.9797 13.775 15.7797 13.075 15.4797 12.475C14.7797 11.275 13.4797 10.475 11.9797 10.475C11.7797 10.475 11.5797 10.475 11.3797 10.575C7.37971 11.075 4.67971 14.575 2.57971 18.075L10.8797 3.675C11.3797 2.775 12.5797 2.775 13.0797 3.675C13.1797 3.875 13.2797 3.975 13.3797 4.175C15.2797 7.575 16.9797 11.675 15.8797 15.375Z"
                                   fill="currentColor" />
                               <path opacity="0.3"
                                   d="M20.6797 20.6749C16.7797 20.6749 12.3797 20.275 9.57972 17.575C10.2797 18.075 11.0797 18.375 11.9797 18.375C13.4797 18.375 14.7797 17.5749 15.4797 16.2749C15.6797 15.9749 15.7797 15.675 15.7797 15.375V15.2749C16.8797 11.5749 15.2797 7.47495 13.2797 4.07495L21.6797 18.6749C22.2797 19.5749 21.6797 20.6749 20.6797 20.6749ZM8.67972 18.6749C8.17972 17.8749 7.97972 16.975 7.77972 15.975C7.37972 13.575 8.67972 10.775 11.3797 10.375C7.37972 10.875 4.67972 14.375 2.57972 17.875C2.47972 18.075 2.27972 18.375 2.17972 18.575C1.67972 19.475 2.27972 20.475 3.27972 20.475H10.3797C9.67972 20.175 9.07972 19.3749 8.67972 18.6749Z"
                                   fill="currentColor" />
                           </svg>
                       </span>
                       <h5 class="fs-3 fw-semibold ms-1 my-0"> {{ config('app.name') }} </h5>
                   </a>

                   <div class="nav-toggle"></div>

                   <div class="mobile_nav">

                       <ul>
                           <li>
                               <a href="{{ route('properties.create') }}" class="text-main">
                                   <span class="svg-icon svg-icon-2hx">
                                       <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
                                           <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                                               fill="currentColor" />
                                           <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                               transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                           <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                               fill="currentColor" />
                                       </svg>
                                   </span>
                               </a>
                           </li>
                           <li>
                               <div class="btn-group account-drop">
                                   <button type="button" class="btn btn-order-by-filt dropdown-toggle"
                                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <img src="{{ asset('users/assets/img/team-1.jpg') }}" class="avater-img"
                                           alt="">
                                   </button>
                                   <div class="dropdown-menu pull-right animated flipInX box-shadow-sm">
                                       <div class="drp_menu_headr bg-green">
                                           <div class="d-flex align-items-center justify-content-between">
                                               <h4 class="drop-title"> {{ Auth::user()->name }} </h4>
                                           </div>
                                       </div>
                                       <ul>
                                           <li><a href="{{ route('dashboard') }}"><i
                                                       class="bi bi-speedometer me-2"></i>@lang('global.Dashboard')</a></li>
                                           @role('agency_manager')
                                               <li><a href="{{ route('dashboard.agents') }}"><i
                                                           class="bi bi-person-bounding-box me-2"></i> 👥 @lang('global.My agents')
                                                   </a>
                                               @endrole
                                           <li><a href="my-profile.html"><i
                                                       class="bi bi-person-bounding-box me-2"></i>My Profile</a></li>
                                           <li><a href="my-property.html"><i class="bi bi-house-door me-2"></i>My
                                                   Listings</a></li>
                                           <li><a href="bookmark-list.html"><i
                                                       class="bi bi-suit-heart me-2"></i>Bookmarked Property</a> </li>
                                           <li><a href="{{ route('properties.create') }}"><i
                                                       class="bi bi-patch-plus me-2"></i>Submit Property</a></li>
                                           <li><a href="change-password.html"><i
                                                       class="bi bi-gear me-2"></i>Settings</a></li>

                                           <form action="{{ route('logout') }}" method="POST">
                                               @csrf
                                               <button style="all: unset ; cursor: pointer"
                                                   title="{{ __('auth.Logout') }}">
                                                   <li><a><i class="bi bi-power me-2"></i> @lang('auth.Logout') </a>
                                                   </li>
                                               </button>
                                           </form>
                                       </ul>
                                   </div>
                               </div>
                           </li>
                       </ul>
                   </div>

               </div>

               <div class="nav-menus-wrapper" style="transition-property: none;">
                   <ul class="nav-menu">

                       <li class="active"><a href="{{ route('home') }}">Home</a></li>

                       <li><a href="JavaScript:Void(0);">Listings</a></li>

                       <li><a href="JavaScript:Void(0);">Features</a></li>

                       <li><a href="JavaScript:Void(0);">Pages</a></li>
                   </ul>

                   <ul class="nav-menu nav-menu-social align-to-right">
                       <li>
                           <div class="btn-group account-drop">
                               <button type="button" class="btn btn-order-by-filt dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <img src="{{ asset('users/assets/img/team-1.jpg') }}" class="avater-img"
                                       alt=""> {{ Auth::user()->name }}
                               </button>
                               <div class="dropdown-menu pull-right animated flipInX box-shadow-sm">
                                   <div class="drp_menu_headr bg-green">
                                       <div class="d-flex align-items-center justify-content-between">
                                           <h4 class="drop-title"> {{ Auth::user()->name }} </h4>
                                       </div>
                                   </div>
                                   <ul>
                                       <li><a href="{{ route('dashboard') }}">
                                               <i class="bi bi-speedometer me-2"></i>@lang('global.Dashboard')
                                           </a></li>
                                       @role('agency_manager')
                                           <li><a href="{{ route('dashboard.agents') }}">👥 @lang('global.My agents')</a></li>
                                       @endrole
                                       @role('agent')
                                       <li><a href="{{ route('dashboard.agent.calendar.index') }}"> 🗓️ @lang('global.My Calendar') </a></li>
                                       @endrole
                                       <li><a href="{{ route('dashboard.agent.schedules') }}"> ⏳ @lang('global.My availability') </a></li>
                                       <li><a href="bookmark-list.html">📅 @lang('global.My appointments') </a></li>
                                       <li><a href="{{ route('properties.create') }}"><i
                                                   class="bi bi-patch-plus me-2"></i>Submit Property</a></li>
                                       <li><a href="change-password.html"><i class="bi bi-gear me-2"></i>Settings</a>
                                       </li>
                                       <form action="{{ route('logout') }}" method="POST">
                                           @csrf
                                           <button style="all: unset ; cursor: pointer"
                                               title="{{ __('auth.Logout') }}">
                                               <li><a><i class="bi bi-power me-2"></i> @lang('auth.Logout') </a>
                                               </li>
                                           </button>
                                       </form>
                                   </ul>
                               </div>
                           </div>
                       </li>

                       @role('agency_manager')
                           <li class="add-listing outline">
                               <a href="{{ route('dashboard.agents.create') }}" class="rounded-pill ms-3"><i
                                       class="bi bi-patch-plus me-2"></i> @lang('global.Add an agent') </a>
                           </li>
                       @endrole

                   </ul>
               </div>
           </nav>
       </div>
   </div>

   <div class="clearfix"></div>
