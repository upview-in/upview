<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown {{ request()->routeIs('panel.dashboard') ? 'active' : '' }}">
                <a class="dropdown-toggle" href="{{ route('panel.dashboard') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-home"></i>
                    </span>
                    <span class="title">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="nav-item dropdown {{ request()->is('panel/user/analyze/*') ? 'open' : '' }}">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-pie-chart"></i>
                    </span>
                    <span class="title">{{ __('Analytics') }}</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-youtube"></i>
                            </span>
                            <span class="title">{{ __('Youtube') }}</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="{{ request()->routeIs('panel.user.analyze.youtube.overview') ? 'active' : '' }}">
                                <a href="{{ route('panel.user.analyze.youtube.overview') }}">{{ __('Overview') }}</a>
                            </li>
                            <li class="{{ request()->routeIs('panel.user.analyze.youtube.videos') ? 'active' : '' }}">
                                <a href="{{ route('panel.user.analyze.youtube.videos') }}">{{ __('Videos') }}</a>
                            </li>
                            <li class="{{ request()->routeIs('panel.user.analyze.youtube.audience') ? 'active' : '' }}">
                                <a href="{{ route('panel.user.analyze.youtube.audience') }}">{{ __('Audience') }}</a>
                            </li>
                        </ul>
                    </li>
                    {{-- Instagram Here --}}
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-instagram"></i>
                            </span>
                            <span class="title">{{ __('Instagram') }}</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('panel.user.analyze.instagram.overview') }}">{{ __('Overview') }}</a> {{-- {{ route('panel.dashboard.insta') }} --}}
                            </li>
                            <li>
                                <a href="#">{{ __('Media') }}</a>
                            </li>
                        </ul>
                    </li>
                    
                    {{-- Facebook Here --}}
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-facebook"></i>
                            </span>
                            <span class="title">{{ __('Facebook') }}</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('panel.user.analyze.facebook.overview') }}">{{ __('Overview') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('panel.user.analyze.facebook.media') }}">{{ __('Media') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ request()->is('panel/user/measure/*') ? 'open' : '' }}">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-radar-chart"></i>
                    </span>
                    <span class="title">{{ __('Measure') }}</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown open">
                        <a href="javascript:void(0);">
                            <span>{{ __('Market Research') }}</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="{{ request()->routeIs('panel.user.measure.market_research.channel_intelligence.index') ? 'active' : '' }}">
                                <a href="{{ route('panel.user.measure.market_research.channel_intelligence.index') }}">{{ __('Channel Intelligence') }}</a>
                            </li>
                            <li class="{{ request()->routeIs('panel.user.measure.market_research.video_intelligence.index') ? 'active' : '' }}">
                                <a href="{{ route('panel.user.measure.market_research.video_intelligence.index') }}">{{ __('Video Intelligence') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item dropdown {{ request()->is('panel/user/track/*') ? 'open' : '' }}">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="anticon anticon-fund"></i>
                </span>
                <span class="title">{{ __('Track') }}</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
            </a>
            <ul class="dropdown-menu">
                <li class="nav-item dropdown open">
                    <a href="javascript:void(0);">
                        <span>{{ __('Comp. Analysis') }}</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">{{ __('Video Tracking') }}</a>
                        </li>
                        <li>
                            <a href="#">{{ __('Series Tracking') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
            </li> --}}
        </ul>
    </div>
</div>
<!-- Side Nav END -->