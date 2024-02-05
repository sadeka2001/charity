<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                {{-- <img class="rounded-circle" width="45px" src="{{ auth()->user()->image !== null? asset(auth()->user()->image) :asset('assets/backend/img/admin-avatar.png') }}" width="45px" /> --}}
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->name?? 'Admin User' }}</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
           
                <li class="{{ Request::is('app/dashboard')?'active':'' }}">
                    <a href="{{ route('dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('slider*')?'active':'' }}">
                        <a href="{{ route('slider.index') }}"><i class="sidebar-item-icon fas fa-images"></i>
                            <span class="nav-label">Sliders</span>
                        </a>
                    </li>
               
                    <li class="{{ Request::is('about*')?'active':'' }}">
                        <a href="{{ route('about.index') }}"><i class="sidebar-item-icon fa fa-newspaper-o"></i>
                            <span class="nav-label">About</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('gallery*')?'active':'' }}">
                        <a href="{{ route('gallery.index') }}"><i class="sidebar-item-icon fas fa-photo"></i>
                            <span class="nav-label">Gallery</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('event*')?'active':'' }}">
                        <a href="{{ route('event.index') }}"><i class="sidebar-item-icon fa fa-sticky-note"></i>
                            <span class="nav-label">Event</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('cause*')?'active':'' }}">
                        <a href="{{ route('cause.index') }}"><i class="sidebar-item-icon fas fa-photo"></i>
                            <span class="nav-label">Causes</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('volunteer*')?'active':'' }}">
                        <a href="{{ route('volunteer.index') }}"><i class="sidebar-item-icon fa fa-user-circle"></i>
                            <span class="nav-label">Volunter</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('contact*')?'active':'' }}">
                        <a href="{{ route('contact.index') }}"><i class="sidebar-item-icon far fa-comment"></i>
                            <span class="nav-label">Contact</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('brand*')?'active':'' }}">
                        <a href="{{ route('brand.index') }}"><i class="sidebar-item-icon fa fa-user-circle"></i>
                            <span class="nav-label">Brand</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('certified*')?'active':'' }}">
                        <a href="{{ route('certified.index') }}"><i class="sidebar-item-icon fas fa-photo"></i>
                            <span class="nav-label">Certified</span>
                        </a>
                    </li>
                {{-- @can('app.gallery.index')
                    @if (Request::is('app/gallery*'))
                        @php($gallerytNav = true)
                    @endif
                    <li class="{{ isset($gallerytNav) ? 'active' : '' }}">
                        <a href="javascript:void (0)"><i class="sidebar-item-icon fa fa-photo"></i>
                            <span class="nav-label">Gallery</span><i class="fa fa-angle-left arrow"></i>
                        </a>

                        <ul class="nav-2-level {{ isset($gallerytNav) ? 'collapse in' : 'collapse' }}">
                            @can('app.gallery.index')
                                <li>
                                    <a class="{{ Request::is('app/gallery') || Request::is('app/gallery/*')?'active':'' }}" href="{{ route('app.gallery.index') }}">Photo Gallery</a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('app/gallery-video*')?'active':'' }}" href="{{ route('app.gallery.video.index') }}">Video Gallery</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                @if (Request::is('app/notice*') || Request::is('app/routine*') || Request::is('app/syllabus*') || Request::is('app/result*') || Request::is('app/student*'))
                    @php($noticeNav = true)
                @endif
                <li class="{{ isset($noticeNav) ? 'active' : '' }}">
                    <a href="javascript:void (0)"><i class="sidebar-item-icon fa fa-newspaper-o"></i>
                        <span class="nav-label">Academic</span><i class="fa fa-angle-left arrow"></i>
                    </a>

                    <ul class="nav-2-level {{ isset($noticeNav) ? 'collapse in' : 'collapse' }}">
                        @can('app.notice.index')
                            <li>
                                <a class="{{ Request::is('app/notice') || Request::is('app/notice/*') ?'active':'' }}" href="{{ route('app.notice.index') }}">Notice</a>
                            </li>
                        @endcan

                            @can('app.routine.index')
                                <li>
                                    <a class="{{ Request::is('app/routine') || Request::is('app/routine/*')?'active':'' }}" href="{{ route('app.routine.index') }}">Routine</a>
                                </li>
                            @endcan
                            @can('app.syllabus.index')
                                <li>
                                    <a class="{{ Request::is('app/syllabus') || Request::is('app/syllabus/*')?'active':'' }}" href="{{ route('app.syllabus.index') }}">Syllabus</a>
                                </li>
                            @endcan
                            @can('app.result.index')
                                <li>
                                    <a class="{{ Request::is('app/result') || Request::is('app/result/*')?'active':'' }}" href="{{ route('app.result.index') }}">Result</a>
                                </li>
                            @endcan

                        @can('app.student.index')
                            <li>
                                <a class="{{ Request::is('app/student') || Request::is('app/student/*')?'active':'' }}" href="{{ route('app.student.index') }}">Students</a>
                            </li>
                        @endcan
                        @can('app.form.index')
                        <li>
                            <a class="{{ Request::is('app/form') || Request::is('app/form/*')?'active':'' }}" href="{{ route('app.form.index') }}">Form Download</a>
                        </li>
                    @endcan
                    @can('app.online.admission.index')
                    <li>
                        <a class="{{ Request::is('app/online.admission') || Request::is('app/online.admission/*')?'active':'' }}" href="{{ route('app.online.admission.index') }}">Online Admission</a>
                    </li>
                @endcan
                    </ul>
                </li>


                @can('app.team.index')
                    <li class="{{ Request::is('app/team*')?'active':'' }}">
                        <a href="{{ route('app.team.index') }}"><i class="sidebar-item-icon fa fa-user-circle"></i>
                            <span class="nav-label">Management</span>
                        </a>
                    </li>
                @endcan

                @can('app.teacher.index')
                    <li class="{{ Request::is('app/teacher*')?'active':'' }}">
                        <a href="{{ route('app.teacher.index') }}"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Teacher</span>
                        </a>
                    </li>
                @endcan

                @can('app.post.index')
                    <li class="{{ Request::is('app/post*')?'active':'' }}">
                        <a href="{{ route('app.post.index') }}"><i class="sidebar-item-icon fa fa-sticky-note"></i>
                            <span class="nav-label">News/Event Post</span>
                        </a>
                    </li>
                @endcan

                @can('app.content.index')
                    @if (Request::is('app/content*'))
                        @php($contentNav = true)
                    @endif
                    <li class="{{ isset($contentNav) ? 'active' : '' }}">
                        <a href="javascript:void (0)"><i class="sidebar-item-icon fa fa-globe"></i>
                            <span class="nav-label">Web Content</span><i class="fa fa-angle-left arrow"></i>
                        </a>

                        <ul class="nav-2-level {{ isset($contentNav) ? 'collapse in' : 'collapse' }}">
                            @can('app.about.index')
                                <li>
                                    <a class="{{ Request::is('app/content/about-us')?'active':'' }}" href="{{ route('app.about.index') }}">About Us</a>
                                </li>
                            @endcan
                            @can('app.speech.index')
                                <li>
                                    <a class="{{ Request::is('app/content/speech')?'active':'' }}" href="{{ route('app.speech.index') }}">Speech/Messages</a>
                                </li>
                            @endcan
                            @can('app.dress.index')
                                <li>
                                    <a class="{{ Request::is('app/content/dress')?'active':'' }}" href="{{ route('app.dress.index') }}">Admission Fee</a>
                                </li>
                            @endcan
                            @can('app.code.index')
                                <li>
                                    <a class="{{ Request::is('app/content/code')?'active':'' }}" href="{{ route('app.code.index') }}">Code of Conduct</a>
                                </li>
                            @endcan
                            @can('app.admission.index')
                                <li>
                                    <a class="{{ Request::is('app/content/admission')?'active':'' }}" href="{{ route('app.admission.index') }}">Admission Guideline</a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan

                @can('app.message.index')
                    <li class="{{ Request::is('app/message*')?'active':'' }}">
                        <a href="{{ route('app.message.index') }}"><i class="sidebar-item-icon far fa-comment"></i>
                            <span class="nav-label">Messages</span>
                        </a>
                    </li>
                @endcan

            @if (Request::is('app/roles*') || Request::is('app/users*'))
                @php($accessNav = true)
            @endif
            <li class="{{ isset($accessNav) ? 'active' : '' }}">
                <a href="javascript:void (0)"><i class="sidebar-item-icon fa fa-lock"></i>
                    <span class="nav-label">Access Control</span><i class="fa fa-angle-left arrow"></i>
                </a>

                <ul class="nav-2-level {{ isset($accessNav) ? 'collapse in' : 'collapse' }}">
                    @can('app.roles.index')
                        <li>
                            <a class="{{ Request::is('app/roles')?'active':'' }}" href="{{ route('app.roles.index') }}">Roles</a>
                        </li>
                    @endcan
                    @can('app.users.index')
                        <li>
                            <a class="{{ Request::is('app/users')?'active':'' }}" href="{{ route('app.users.index') }}">Users</a>
                        </li>
                    @endcan
                </ul>
            </li> --}}

                @if (Request::is('app/user-log') || Request::is('app/setting/appearance') || Request::is('app/setting/general') || Request::is('app/setting/privacy') || Request::is('app/setting/term') || Request::is('app/setting/faq') || Request::is('app/setting/social') || Request::is('app/setting/about'))
                    @php($settingNav = true)
                @endif
                <li class="{{ isset($settingNav) ? 'active' : '' }}">
                    <a href="javascript:void (0)"><i class="sidebar-item-icon fa fa-cog"></i>
                        <span class="nav-label">System</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        @can('app.backup.index')
                            <li>
                                <a class="{{ Request::is('app/backup')?'active':'' }}" href="{{ route('app.backup.index') }}">Backups</a>
                            </li>
                        @endcan
                            @can('app.logs.show')
                                <li>
                                    <a href="{{ route('app.show.log') }}"
                                       class="{{ Request::is('app/user-log*') ? 'active' : '' }}">
                                        <i class="fa fa-history"></i> Logs
                                    </a>
                                </li>
                            @endcan
                        @can('app.setting.index')
                            <li>
                                <a class="{{ Request::is('app/setting/appearance') || Request::is('app/setting/general') || Request::is('app/setting/privacy') || Request::is('app/setting/term') || Request::is('app/setting/faq') || Request::is('app/setting/social') || Request::is('app/setting/about') ?'active':'' }}" href="{{ route('app.setting.general.index') }}">Settings</a>
                            </li>
                        @endcan

                    </ul>
                </li>
        </ul>
    </div>
</nav>
