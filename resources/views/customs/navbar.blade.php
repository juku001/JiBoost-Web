<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="display:none;">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
                aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="{{ route('dashboard.home') }}">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="{{ asset('assets/img/logo.png') }}" alt="JiBoost"
                            width="27" />
                        <h5 class="logo-text ms-2 d-none d-sm-block jb-heading">JiBoost</h5>
                    </div>
                </div>
            </a>
        </div>

        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2"><input
                        class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" /><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                        style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                        style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label></div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!"
                    role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <img class="rounded-circle "
                            src="{{ session(env('USER_INFO_KEY'))['profile_pic'] ?? asset('assets/img/logo.png') }}"
                            alt="Profile Picture" />

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">

                                    <a href="{{ route('profile.display.photo') }}">
                                        <img class="rounded-circle "
                                            src="{{ session(env('USER_INFO_KEY'))['profile_pic'] ?? asset('assets/img/logo.png') }}"
                                            alt="Profile Picture" />
                                    </a>

                                </div>
                                <h6 class="mt-2 text-body-emphasis">{{ session(env('USER_INFO_KEY'))['name'] ?? '' }}</h6>
                            </div>
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3 d-block"
                                        href="{{ route('profile.index') }}"> <span class="me-2 text-body align-bottom"
                                            data-feather="user"></span><span>{{ __('profile.title') }}</span></a></li>
                                <li class="nav-item"><a class="nav-link px-3 d-block"
                                        href="{{ route('notification.index') }}"><span
                                            class="me-2 text-body align-bottom"
                                            data-feather="pie-chart"></span>{{ __('notifications.title') }}</a></li>
                                <li class="nav-item"><a class="nav-link px-3 d-block"
                                        href="{{ route('community.index') }}"> <span class="me-2 text-body align-bottom"
                                            data-feather="lock"></span>{{ __('community.title') }}</a></li>
                                <li class="nav-item"><a class="nav-link px-3 d-block" href="{{ route('setting.index') }}"> <span
                                            class="me-2 text-body align-bottom" data-feather="settings"></span>{{ __('setting.title') }}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link px-3 d-block"
                                        href="{{ route('helpcenter.index') }}"> <span
                                            class="me-2 text-body align-bottom" data-feather="help-circle"></span>{{ __('help_center.title') }}</a></li>
                                <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                            class="me-2 text-body align-bottom"
                                            data-feather="globe"></span>Language</a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top border-translucent">
                            <ul class="nav d-flex flex-column my-3">

                            </ul>
                            <div class="px-3">
                                <a class="btn btn-subtle-danger d-flex flex-center w-100"
                                    href="{{ route('logout') }}">
                                    <span class="me-2" data-feather="log-out"> </span>{{ __('sign_out') }}</a>
                            </div>
                            <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a
                                    class="text-body-quaternary me-1" href="#!">Privacy
                                    policy</a>&bull;<a class="text-body-quaternary mx-1"
                                    href="#!">Terms</a>&bull;<a class="text-body-quaternary ms-1"
                                    href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
