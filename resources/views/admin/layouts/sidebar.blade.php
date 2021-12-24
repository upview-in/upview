<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/images/logo/logo.svg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <span class="logo-text">{{ config('app.name') }}<mark class="ms-1 text-muted h6">Admin</mark></span>
        </div>
        <div class="toggle-icon ms-auto"><em class='bx bx-arrow-to-left'></em>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon">
                    <em class='bx bx-home-circle'></em>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}">
                <div class="parent-icon">
                    <em class='bx bx-user-circle'></em>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.userPermissions.index') }}">
                <div class="parent-icon">
                    <em class='bx bx-fingerprint'></em>
                </div>
                <div class="menu-title">Permissions</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.userRoles.index') }}">
                <div class="parent-icon">
                    <em class='bx bx-diamond'></em>
                </div>
                <div class="menu-title">Plans</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->