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
                        @guest
                            <li>
                                <a href="JavaScript:Void(0);" data-bs-toggle="modal" title="{{ __('auth.SignIn') }}"
                                    data-bs-target="#login" class="text-muted">
                                    <span class="svg-icon svg-icon-2hx">
                                        <svg width="35" height="35" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                fill="currentColor" />
                                            <path
                                                d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                fill="currentColor" />
                                            <rect x="7" y="6" width="4" height="4" rx="2"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        @endguest

                        @auth
                            <li>
                                <a href="JavaScript:Void(0);" data-bs-target="#login" class="text-muted">
                                    <span class="svg-icon svg-icon-2hx">
                                        <svg width="35" height="35" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                fill="currentColor" />
                                            <path
                                                d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                fill="currentColor" />
                                            <rect x="7" y="6" width="4" height="4" rx="2"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button style="all: unset ; cursor: pointer" title="{{ __('auth.Logout') }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 13v-2H7V8l-5 4 5 4v-3h9z" fill="currentColor" />
                                            <path d="M20 3H10v2h10v14H10v2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"
                                                fill="currentColor" />
                                        </svg>
                                    </button>
                                </form>
                            </li>
                        @endauth

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

                    </ul>
                </div>

            </div>


            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="active"><a href="{{ route('home') }}"> @lang('global.home') </a></li>

                    <li><a href="{{ route('properties.index') }}"> @lang('global.Properties') </a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">

                    <li>
                        <a href="JavaScript:Void(0);">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10
                                10-4.48 10-10S17.52 2 12 2zm5 8h-2.07
                                c-.14-1.25-.52-2.42-1.07-3.46
                                1.48.73 2.6 2.01 3.14 3.46zM12 4
                                c1.3 1.53 2.16 3.5 2.41 6H9.59
                                C9.84 7.5 10.7 5.53 12 4zM4 12
                                c0-1.61.48-3.1 1.29-4.35
                                .75 1.17 1.99 2.35 3.55 3.35H4zm0 2h4.84
                                c-.45 1.57-1.31 3.04-2.55 4.23
                                C4.79 16.47 4 14.31 4 12zm2.29 6.35
                                C7.41 16.8 8.4 14.52 8.84 12H12
                                v4.58c-1.17.45-2.38.74-3.71.77zm5.71-.58
                                V12h3.16c-.45 2.52-1.44 4.8-2.56 6.35
                                -1.17-.45-2.38-.74-3.71-.77zm4.16-1.04
                                C16.7 15.66 17.56 13.68 17.81 12H20
                                c0 1.61-.48 3.1-1.29 4.35z" fill="currentColor" />
                            </svg> <span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ route('chang.lang', ['locale' => 'fr']) }}"> <img
                                        src="http://findicons.com/files/icons/282/flags/32/france.png" alt="">
                                    Français </a></li>
                            <li><a href="{{ route('chang.lang', ['locale' => 'en']) }}"> <img
                                        src="http://findicons.com/files/icons/282/flags/32/united_states_of_america_usa.png"
                                        alt=""> English </a></li>
                        </ul>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('dashboard') }}" data-bs-target="#login" class="fw-medium text-muted-2">
                                <span class="svg-icon svg-icon-2hx me-1">
                                    <svg width="22" height="22" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                            fill="currentColor" />
                                        <path
                                            d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                            fill="currentColor" />
                                        <rect x="7" y="6" width="4" height="4" rx="2"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button style="all: unset ; cursor: pointer" title="{{ __('auth.Logout') }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 13v-2H7V8l-5 4 5 4v-3h9z" fill="currentColor" />
                                        <path d="M20 3H10v2h10v14H10v2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"
                                            fill="currentColor" />
                                    </svg>
                                </button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li>
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"
                                class="fw-medium text-muted-2">
                                @lang('auth.SignUp') @lang('auth.or') @lang('auth.SignIn')
                            </a>
                        </li>
                    @endguest




                    <li class="add-listing">
                        <a href="{{ route('properties.create') }}" class="bg-main" href="{{ __('global.Post Property') }}" >
                            <span class="svg-icon svg-icon-muted svg-icon-2hx me-1">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" width="12" height="2" rx="1"
                                        transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor" />
                                    <path
                                        d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </a>
                    </li>



                    {{-- <li>
                        <a href="#" class="text-main" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                            <span class="svg-icon svg-icon-2hx">
                                <svg width="24" height="24" viewBox="0 0 16 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect y="6" width="16" height="3" rx="1.5" fill="currentColor" />
                                    <rect opacity="0.3" y="12" width="8" height="3" rx="1.5"
                                        fill="currentColor" />
                                    <rect opacity="0.3" width="12" height="3" rx="1.5"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </a>
                    </li> --}}

                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
