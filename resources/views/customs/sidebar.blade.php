<nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="home"></span></span>
                                <span class="nav-link-text">Home</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('exams') ? 'active' : '' }}">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ Request::is('exams') ? 'active' : '' }}" href="/exams">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div>
                                <span class="nav-link-icon"><span data-feather="help-circle"></span></span>
                                <span class="nav-link-text">Exams</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('results') ? 'active' : '' }}">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ Request::is('results') ? 'active' : '' }}" href="/results">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div>
                                <span class="nav-link-icon"><span data-feather="file-text"></span></span>
                                <span class="nav-link-text">Results</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('payments') ? 'active' : '' }}">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ Request::is('payments') ? 'active' : '' }}" href="/payments">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div>
                                <span class="nav-link-icon"><span class="fas fa-money-check"></span></span>
                                <span class="nav-link-text">Payments</span>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center">
            <span class="uil uil-left-arrow-to-left fs-8"></span>
            <span class="uil uil-arrow-from-right fs-8"></span>
            <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
        </button>
    </div>
</nav>









{{-- <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item active">
                    <div class="nav-item-wrapper"><a class="nav-link active label-1" href="" role="button"
                            data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                        data-feather="home"></span></span><span class="nav-link-text-wrapper"><span
                                        class="nav-link-text">Home</span></span>
                            </div>
                        </a>
                    </div><!-- parent pages-->
                </li>
                <li class="nav-item">
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="/exams"
                            role="button" aria-expanded="true" aria-controls="nv-home">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div><span class="nav-link-icon"><span
                                        data-feather="help-circle"></span></span><span
                                    class="nav-link-text">Exams</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="/results"
                            role="button" aria-expanded="true" aria-controls="nv-home">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div><span class="nav-link-icon"><span
                                        data-feather="file-text"></span></span><span
                                    class="nav-link-text">Results</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- parent pages-->
                    <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="/payments"
                            role="button" aria-expanded="true" aria-controls="nv-home">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div><span class="nav-link-icon"><span
                                        class="fas fa-money-check"></span></span><span
                                    class="nav-link-text">Payments</span>
                            </div>
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer"><button
            class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span
                class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span
                class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
</nav> --}}
