<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown {{ request()->routeIs('panel.dashboard') ? 'active' : '' }}">
                <a class="dropdown-toggle" href="{{ route('panel.dashboard') }}">
                    <span class="icon-holder">
                        <em class="fas fa-home text-primary"></em>
                    </span>
                    <span class="title">{{ __('Dashboard') }}</span>
                </a>
            </li>

            @if (appUser()->hasGroupPermission('analyze'))
            <li class="nav-item dropdown {{ request()->is('panel/user/analyze/*') ? 'open' : '' }}">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <em class="fas fa-chart-pie text-info"></em>
                    </span>
                    <span class="title">{{ __('Analytics') }}</span>
                    <span class="arrow">
                        <em class="arrow-icon"></em>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span class="title">{{ __('YouTube') }}</span>
                            <span class="arrow">
                                <em class="arrow-icon"></em>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            @if (appUser()->can('analyze.youtube.view-overview'))
                                <li class="{{ request()->routeIs('panel.user.analyze.youtube.overview') ? 'active' : '' }}">
                                    <a id="YtOverviewConfirm" class="pointer" data-url="{{ route('panel.user.analyze.youtube.overview') }}">{{ __('Overview') }}</a>
                                </li>
                            @endif
                            @if (appUser()->can('analyze.youtube.view-videos'))
                                <li class="{{ request()->routeIs('panel.user.analyze.youtube.videos') ? 'active' : '' }}">
                                    <a href="{{ route('panel.user.analyze.youtube.videos') }}">{{ __('Videos') }}</a>
                                </li>
                            @endif
                            {{-- <li class="{{ request()->routeIs('panel.user.analyze.youtube.audience') ? 'active' : '' }}">
                                <a href="{{ route('panel.user.analyze.youtube.audience') }}">{{ __('Audience') }}</a>
                            </li> --}}
                        </ul>
                    </li>
                    @if (appUser()->can('analyze.instagram.view-overview'))
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span class="title">{{ __('Instagram') }}</span>
                            <span class="arrow">
                                <em class="arrow-icon"></em>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="{{ request()->routeIs('panel.user.analyze.instagram.overview') ? 'active' : '' }}">
                                <a href="{{ route('panel.user.analyze.instagram.overview') }}">{{ __('Overview') }}</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if (appUser()->can('analyze.facebook.view-overview'))
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span class="title">{{ __('Facebook') }}</span>
                            <span class="arrow">
                                <em class="arrow-icon"></em>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="{{ request()->routeIs('panel.user.analyze.facebook.overview') ? 'active' : '' }}">
                                <a href="{{ route('panel.user.analyze.facebook.overview') }}">{{ __('Overview') }}</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if (appUser()->hasGroupPermission('measure'))
            <li class="nav-item dropdown {{ request()->is('panel/user/measure/*') ? 'open' : '' }}">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <em class="fas fa-chart-line text-danger"></em>
                    </span>
                    <span class="title">{{ __('Measure') }}</span>
                    <span class="arrow">
                        <em class="arrow-icon"></em>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown open">
                        <a href="javascript:void(0);">
                            <span>{{ __('Market Research') }}</span>
                            <span class="arrow">
                                <em class="arrow-icon"></em>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            @if (appUser()->can('measure.market-research.channel-intelligence'))
                                <li class="{{ request()->routeIs('panel.user.measure.market_research.channel_intelligence.index') ? 'active' : '' }}">
                                    <a href="{{ route('panel.user.measure.market_research.channel_intelligence.index') }}">{{ __('Channel Intelligence') }}</a>
                                </li>
                            @endif
                            @if (appUser()->can('measure.market-research.video-intelligence'))
                                <li class="{{ request()->routeIs('panel.user.measure.market_research.video_intelligence.index') ? 'active' : '' }}">
                                    <a href="{{ route('panel.user.measure.market_research.video_intelligence.index') }}">{{ __('Video Intelligence') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>
            @endif

            @if (appUser()->hasGroupPermission('posts'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <em class="fas fa-mail-bulk text-warning"></em>
                    </span>
                    <span class="title">{{ __('Posts') }}</span>
                    <span class="arrow">
                        <em class="arrow-icon"></em>
                    </span>
                </a>
                <ul class="dropdown-menu ">
                    @if (appUser()->can('posts.management.post-management'))
                        <li class="nav-item dropdown {{ request()->routeIs('panel.user.post.scheduler') ? 'active' : '' }}">
                            <a href="{{ route('panel.user.post.scheduler') }}">
                                <span class="icon-holder">
                                    <em class="fas fa-calendar-day text-warning"></em>
                                </span>
                                <span class="title">{{ __('Post Management') }}</span>
                            </a>
                        </li>
                    @endif
                    @if (appUser()->can('posts.management.post-history'))
                    <li class="nav-item dropdown {{ request()->routeIs('panel.user.post.history') ? 'active' : '' }}">
                        <a href="{{ route('panel.user.post.history') }}">
                            <span class="icon-holder">
                                <em class="fas fa-history text-warning"></em>
                            </span>
                            <span class="title">{{ __('Post History') }}</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <em class="fas fa-headset text-success"></em>
                    </span>
                    <span class="title">{{ __('Support') }}</span>
                    <span class="arrow">
                        <em class="arrow-icon"></em>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown {{ request()->routeIs('panel.user.support.submit') ? 'active' : '' }}">
                        <a class="dropdown-toggle" href="{{ route('panel.user.support.submit') }}">
                            <span class="icon-holder">
                                <em class="fas fa-comments text-success"></em>
                            </span>
                            <span class="title">{{ __('Submit Query') }}</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('panel.user.support.history') ? 'active' : '' }}">
                        <a class="dropdown-toggle" href="{{ route('panel.user.support.history') }}">
                            <span class="icon-holder">
                                <em class="fas fa-history text-success"></em>
                            </span>
                            <span class="title">{{ __('Support History') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            @if (!empty(Auth::user()->awario_profile_hash))
            <li class="nav-item dropdown {{ request()->routeIs('panel.user.social') ? 'active' : '' }}">
                <a class="dropdown-toggle" href="{{ route('panel.user.social') }}" target="_blank">
                    <span class="icon-holder">
                        <em class="fas fa-broadcast-tower text-danger"></em>
                    </span>
                    <span class="title">{{ __('Social Listening') }}</span>
                </a>
            </li>
            @endif

            <!-- <li class="nav-item dropdown {{ request()->routeIs('panel.dashboard') ? 'active' : '' }}">
                <a class="dropdown-toggle" href="{{ route('panel.dashboard') }}">
                    <span class="icon-holder">
                        <em class="fas fa-book text-secondary"></em>
                    </span>
                    <span class="title">{{ __('Reports') }}</span>
                </a>
            </li> -->

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <em class="fas fa-tasks text-danger"></em>
                    </span>
                    <span class="title">{{ __('Pricing') }}</span>
                    <span class="arrow">
                        <em class="arrow-icon"></em>
                    </span>
                </a>
                <ul class="dropdown-menu ">
                    <li class="nav-item dropdown {{ request()->routeIs('panel.user.plans.list') ? 'active' : '' }}">
                        <a href="{{ route('panel.user.plans.list') }}">
                            <span class="title">{{ __('Plans') }}</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('panel.user.plans.orders') ? 'active' : '' }}">
                        <a href="{{ route('panel.user.plans.orders') }}">
                            <span class="title">{{ __('Orders Receipt') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->
