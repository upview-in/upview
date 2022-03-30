<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/images/logo/logo.svg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <span class="logo-text">{{ config('app.name') }}<mark class="ms-1 text-muted h6">Admin</mark></span>
        </div>
        <div class="toggle-icon ms-auto"><em class='bi bi-arrow-bar-left'></em>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon">
                    <em class='bi bi-speedometer2'></em>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <em class='bi-chat-left-text'></em>
                </div>
                <div class="menu-title">Support</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.support.users.index') }}">
                        <em class='bi bi-people'></em> Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.support.queries') }}">
                        <em class='bi bi-question-circle'></em> Queries
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><em class='bi bi-people'></em>
                </div>
                <div class="menu-title">Users</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <em class='bi bi-gear'></em> Manage
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.userPermissions.index') }}">
                        <em class='bi bi-shield-shaded'></em> Permissions
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.userRoles.index') }}">
                        <em class='bi bi-tags'></em> Pricing Plans
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><em class='bi bi-person-badge'></em>
                </div>
                <div class="menu-title">Admins</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.admins.index') }}">
                        <em class='bi bi-gear'></em> Manage
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.adminPermissions.index') }}">
                        <em class='bi bi-shield-shaded'></em> Permissions
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.adminRoles.index') }}">
                        <em class='bi bi-tags'></em> Roles
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->