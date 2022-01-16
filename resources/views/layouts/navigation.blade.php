<div class="header">
    <div class="logo logo-dark">
        <a href="#">
            <img src="{{ asset('images/logo/named_logo.svg') }}" alt="Logo" style="height: 70px;">
            <img class="logo-fold" src="{{ asset('images/logo/logo.svg') }}" alt="Logo" style="height: 70px; padding: 12px;">
        </a>
    </div>
    <div class="logo logo-white">
        <a href="#">
            <img src="{{ asset('images/logo/named_logo.svg') }}" alt="Logo" style="height: 70px;">
            <img class="logo-fold" src="{{ asset('images/logo/logo.svg') }}" alt="Logo" style="height: 70px; padding: 12px;">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <em class="anticon"></em>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <em class="anticon"></em>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                    <em class="anticon anticon-search"></em>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            {{-- <li class="dropdown dropdown-animated scale-left">
                <a href="javascript:void(0);" data-toggle="dropdown">
                    <em class="anticon anticon-bell notification-badge"></em>
                </a>
                <div class="dropdown-menu pop-notification">
                    <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                        <p class="text-dark font-weight-semibold m-b-0">
                            <em class="anticon anticon-bell"></em>
                            <span class="m-l-10">Notification</span>
                        </p>
                        <a class="btn-sm btn-default btn" href="javascript:void(0);">
                            <small>View All</small>
                        </a>
                    </div>
                    <div class="relative">
                        <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <em class="anticon anticon-mail"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">You received a new message</p>
                                        <p class="m-b-0"><small>8 min ago</small></p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <em class="anticon anticon-user-add"></em>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">New user registered</p>
                                        <p class="m-b-0"><small>7 hours ago</small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li> --}}
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="{{Auth::user()->getFirstMediaUrl('avatars', 'thumb') }}" alt="{{ Auth::user()->name }}">
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-lg avatar-image">
                                <img src="{{Auth::user()->getFirstMediaUrl('avatars', 'thumb') }}" alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('panel.user.profile.index') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <em class="anticon opacity-04 font-size-16 anticon-user"></em>
                                <span class="m-l-10">Edit Profile</span>
                            </div>
                            <em class="anticon font-size-10 anticon-right"></em>
                        </div>
                    </a>
                    <a href="{{ route('panel.user.account.accounts_manager') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <em class="anticon opacity-04 font-size-16 anticon-lock"></em>
                                <span class="m-l-10">Accounts Management</span>
                            </div>
                            <em class="anticon font-size-10 anticon-right"></em>
                        </div>
                    </a>
                    <a href="{{ route('panel.user.profile.manage') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <em class="anticon opacity-04 font-size-16 anticon-project"></em>
                                <span class="m-l-10">Profile Management</span>
                            </div>
                            <em class="anticon font-size-10 anticon-right"></em>
                        </div>
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <em class="anticon opacity-04 font-size-16 anticon-logout"></em>
                                <span class="m-l-10">
                                    {{ __('Log out') }}
                                </span>
                            </div>
                            <em class="anticon font-size-10 anticon-right"></em>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                    <em class="anticon anticon-appstore"></em>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Header END -->
