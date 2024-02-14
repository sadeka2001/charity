<div class="list-group">
    {{-- <a href="{{ route('app.setting.general.index') }}" class="list-group-item {{ Request::is('app/setting/general')?'active':''}}">General</a>
    <a href="{{ route('app.setting.appearance.index') }}" class="list-group-item {{ Request::is('app/setting/appearance')?'active':''}}">Appearance</a>
    <a href="{{ route('app.setting.privacy.index') }}" class="list-group-item {{ Request::is('app/setting/privacy')?'active':''}}">Privacy Policy</a>
    <a href="{{ route('app.setting.term.index') }}" class="list-group-item {{ Request::is('app/setting/term')?'active':''}}">Terms of Use</a>
    <a href="{{ route('app.setting.faq.index') }}" class="list-group-item {{ Request::is('app/setting/faq')?'active':''}}">FAQ</a>
    <a href="{{ route('app.setting.social.index') }}" class="list-group-item {{ Request::is('app/setting/social')?'active':''}}">Social Links</a> --}}

    <a href="{{ route('general.index') }}" class="list-group-item {{ Request::is('admin/setting/general')?'active':''}}">General</a>
    <a href="{{ route('appearance.index') }}" class="list-group-item {{ Request::is('admin/setting/appearance')?'active':''}}">Appearance</a>
    <a href="{{ route('privacy.index') }}" class="list-group-item {{ Request::is('admin/setting/privacy')?'active':''}}">Privacy Policy</a>
    <a href="{{ route('term.index') }}" class="list-group-item {{ Request::is('admin/setting/term')?'active':''}}">Terms of Use</a>
    <a href="{{ route('social.index') }}" class="list-group-item {{ Request::is('admin/setting/social')?'active':''}}">Social Links</a>
</div>
