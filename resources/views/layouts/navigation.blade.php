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
                    <em class="anticon anticon-menu-fold"></em>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <em class="anticon anticon-menu-fold"></em>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
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
                    @if (!empty($planStatus['display']))
                        @if (!empty($planStatus['can_dismiss']))
                        <a href="{{ route('panel.user.account.accounts_manager') }}" class="dropdown-item d-block p-h-15 p-v-10">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <em class="anticon opacity-04 font-size-16 anticon-lock"></em>
                                    <span class="m-l-10">Accounts Management</span>
                                </div>
                                <em class="anticon font-size-10 anticon-right"></em>
                            </div>
                        </a>
                        @endif
                    @endif
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
        </ul>
    </div>
</div>
<!-- Header END -->
