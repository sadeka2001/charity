<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                {{-- <img class="rounded-circle" width="45px" src="{{ auth()->user()->image !== null? asset(auth()->user()->image) :asset('assets/backend/img/admin-avatar.png') }}" width="45px" /> --}}
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->name ?? 'Admin User' }}</div><small>Administrator</small>
            </div>
        </div>
        <ul class="side-menu metismenu">

            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/slider*') ? 'active' : '' }}">
                <a href="{{ route('slider.index') }}"><i class="sidebar-item-icon fas fa-images"></i>
                    <span class="nav-label">Sliders</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/about*') ? 'active' : '' }}">
                <a href="{{ route('about.index') }}"><i class="sidebar-item-icon fa fa-newspaper-o"></i>
                    <span class="nav-label">About</span>
                </a>
            </li>


            <li class="{{ Request::is('admin/gallery*') ? 'active' : '' }}">
                <a href="{{ route('gallery.index') }}"><i class="sidebar-item-icon fas fa-photo"></i>
                    <span class="nav-label">Gallery</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/video*') ? 'active' : '' }}">
                <a href="{{ route('video.index') }}"><i class="sidebar-item-icon fas fa-photo"></i>
                    <span class="nav-label">Video</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/event*') ? 'active' : '' }}">
                <a href="{{ route('event.index') }}"><i class="sidebar-item-icon fa fa-sticky-note"></i>
                    <span class="nav-label">Event</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/recent_work*') ? 'active' : '' }}">
                <a href="{{ route('recent_work.index') }}"><i class="sidebar-item-icon fa fa-sticky-note"></i>
                    <span class="nav-label">Recent News</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/service*') ? 'active' : '' }}">
                <a href="{{ route('service.index') }}"><i class="sidebar-item-icon fas fa-photo"></i>
                    <span class="nav-label">Services</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/volunteer*') ? 'active' : '' }}">
                <a href="{{ route('volunteer.index') }}"><i class="sidebar-item-icon fa fa-user-circle"></i>
                    <span class="nav-label">Volunter</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact*') ? 'active' : '' }}">
                <a href="{{ route('contact.index') }}"><i class="sidebar-item-icon far fa-comment"></i>
                    <span class="nav-label">Contact</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/brand*') ? 'active' : '' }}">
                <a href="{{ route('brand.index') }}"><i class="sidebar-item-icon fa fa-user-circle"></i>
                    <span class="nav-label">Brand</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/certified*') ? 'active' : '' }}">
                <a href="{{ route('certified.index') }}"><i class="sidebar-item-icon fas fa-photo"></i>
                    <span class="nav-label">Certified</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/setting/general*') ? 'active' : '' }}">
                <a href="{{ route('general.index') }}"><i class="sidebar-item-icon fas fa-photo"></i>
                    <span class="nav-label">Setting</span>
                </a>
            </li>

        </ul>

    </div>
</nav>
