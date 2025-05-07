<nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                            href="/admin/dashboard">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><span data-feather="home"></span></span>
                                <span class="nav-link-text">Home</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ Request::is('admin/users') ? 'active' : '' }}"
                            href="/admin/users">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div>
                                <span class="nav-link-icon"><span data-feather="users"></span></span>
                                <span class="nav-link-text">Users</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('admin/payments') ? 'active' : '' }}">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ Request::is('admin/payments') ? 'active' : '' }}"
                            href="/admin/payments">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div>
                                <span class="nav-link-icon"><span class="fas fa-money-check"></span></span>
                                <span class="nav-link-text">Payments</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('admin/quotes') ? 'active' : '' }}">
                    <div class="nav-item-wrapper">
                        <a class="nav-link label-1 {{ Request::is('admin/quotes') ? 'active' : '' }}"
                            href="/admin/quotes">
                            <div class="d-flex align-items-center">
                                <div class="dropdown-indicator-icon-wrapper"></div>
                                <span class="nav-link-icon"><span class="fas fa-money-check"></span></span>
                                <span class="nav-link-text">Quotes</span>
                            </div>
                        </a>
                    </div>
                </li>

                <div class="nav-item-wrapper">
                    <a class="nav-link {{ Request::is('admin/exams/*') ? 'active dropdown-indicator' : 'dropdown-indicator label-1' }}"
                        href="#nv-CRM" role="button" data-bs-toggle="collapse"
                        aria-expanded="{{ Request::is('admin/exams/*') ? 'true' : 'false' }}" aria-controls="nv-CRM">
                        <div class="d-flex align-items-center">
                            <div class="dropdown-indicator-icon-wrapper">
                                <span class="fas fa-caret-right dropdown-indicator-icon"></span>
                            </div>
                            <span class="nav-link-icon"><span class="fas fa-money-check"></span></span>
                            <span class="nav-link-text">Exam Point</span>
                        </div>
                    </a>
                    <div class="parent-wrapper label-1">
                        <ul class="nav collapse parent {{ Request::is('admin/exams/*') ? 'show' : '' }}"
                            data-bs-parent="#navbarVerticalCollapse" id="nv-CRM">
                            <li class="collapsed-nav-item-title d-none">Exam Point</li>

                            <!-- Add Series -->
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/exams/add_series') ? 'active' : '' }}"
                                    href="{{ route('admin.exams.add_series') }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text">Add Series</span>
                                    </div>
                                </a>
                            </li>

                            <!-- View Series -->
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/exams/series') ? 'active' : '' }}"
                                    href="{{ route('admin.exams.series') }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text">View Series</span>
                                    </div>
                                </a>
                            </li>

                            <!-- Add Subjects -->
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/exams/add_subjects') ? 'active' : '' }}"
                                    href="{{ route('admin.exams.add_subjects') }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text">Add Subjects</span>
                                    </div>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>

            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center">
            <span class="uil uil-left-arrow-to-left fs-8"></span>
            <span class="uil uil-arrow-from-right fs-8"></span>
            <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
        </button>
    </div>
</nav>
