<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('public/assets/images/logo.jpg') }}" alt="logo" />
            <span>TradeWalla</span>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('public/assets/images/logo.jpg') }}" alt="logo" />
        </a>
    </div>

    <ul class="nav">
        <!-- Profile Section -->
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="{{ asset('public/storage/' . $admin->image) }}"
                            alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ Auth::user()->first_name ?? 'Admin' }}</h5>
                        <span>Administrator</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-cog text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account Settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-lock text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-icon"><i class="mdi mdi-speedometer"></i></span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.members') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.members') }}">
                <span class="menu-icon"><i class="mdi mdi-account-multiple"></i></span>
                <span class="menu-title">Registered Members</span>
            </a>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.contacts') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.contacts') }}">
                <span class="menu-icon"><i class="mdi mdi-message-text"></i></span>
                <span class="menu-title">Contact Requests</span>
            </a>
        </li>

        <!-- Trading Management -->
        <li class="nav-item nav-category">
            <span class="nav-link">Trading Management</span>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.plans') ? 'active' : '' }}">
            <a class="nav-link" href="">
                <span class="menu-icon"><i class="mdi mdi-chart-line"></i></span>
                <span class="menu-title">Trading Plans</span>
            </a>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.activeTrades') ? 'active' : '' }}">
            <a class="nav-link" href="">
                <span class="menu-icon"><i class="mdi mdi-timeline-clock"></i></span>
                <span class="menu-title">Active Trades</span>
            </a>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.returns') ? 'active' : '' }}">
            <a class="nav-link" href="">
                <span class="menu-icon"><i class="mdi mdi-trending-up"></i></span>
                <span class="menu-title">Trade Returns</span>
            </a>
        </li>

        <!-- Finance -->
        <li class="nav-item nav-category">
            <span class="nav-link">Finance</span>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.deposits') ? 'active' : '' }}">
            <a class="nav-link" href="">
                <span class="menu-icon"><i class="mdi mdi-arrow-down-bold-circle"></i></span>
                <span class="menu-title">Deposit Requests</span>
            </a>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.withdrawals') ? 'active' : '' }}">
            <a class="nav-link" href="">
                <span class="menu-icon"><i class="mdi mdi-arrow-up-bold-circle"></i></span>
                <span class="menu-title">Withdrawal Requests</span>
            </a>
        </li>

        <!-- CMS Management -->
        <li class="nav-item nav-category">
            <span class="nav-link">CMS Management</span>
        </li>
        <li
            class="nav-item menu-items {{ request()->routeIs('admin.pages.manage-page') || request()->routeIs('admin.pages.cms.view-service') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pages.cms.manage-page') }}">
                <span class="menu-icon"><i class="mdi mdi-file-document-multiple"></i></span>
                <span class="menu-title">Manage Pages</span>
            </a>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.pages.cms.team-settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pages.cms.team-settings') }}">
                <span class="menu-icon"><i class="mdi mdi-file-document-multiple"></i></span>
                <span class="menu-title">Team Settings</span>
            </a>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.pages.cms.manage-header') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pages.cms.manage-header') }}">
                <span class="menu-icon"><i class="mdi mdi-page-layout-header"></i></span>
                <span class="menu-title">Manage Header</span>
            </a>
        </li>

        <li
            class="nav-item menu-items {{ request()->routeIs('admin.pages.cms.manage-social-media') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pages.cms.manage-social-media') }}">
                <span class="menu-icon"><i class="mdi mdi-facebook"></i></span>
                <span class="menu-title">Manage Social Media</span>
            </a>
        </li>
        <li class="nav-item menu-items {{ request()->routeIs('admin.pages.cms.gallery-setting') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pages.cms.gallery-setting') }}">
                <span class="menu-icon"><i class="mdi mdi-facebook"></i></span>
                <span class="menu-title">Gallery Setting</span>
            </a>
        </li>

        <li
            class="nav-item menu-items {{ request()->routeIs('admin.pages.cms.general-site-setting') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pages.cms.general-site-setting') }}">
                <span class="menu-icon"><i class="mdi mdi-image-area"></i></span>
                <span class="menu-title">General Site Setting</span>
            </a>
        </li>

        <!-- Settings -->
        <li class="nav-item nav-category">
            <span class="nav-link">Settings</span>
        </li>

        <li class="nav-item menu-items {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
            <a class="nav-link" href="">
                <span class="menu-icon"><i class="mdi mdi-cogs"></i></span>
                <span class="menu-title">General Settings</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->
