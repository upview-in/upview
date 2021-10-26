<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/images/logo/logo.svg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <span class="logo-text">{{ config('app.name') }}<mark class="ms-1 text-muted h6">Admin</mark></span>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}">
                <div class="parent-icon">
                    <i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Users</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->