<aside class="sidebar">
    <nav class="sidebar-nav">
        <ul class="sidebar-nav__list">
            <li class="sidebar-nav__item">
                <a href="{{route('admin.home')}}" class="sidebar-nav__link {{ Str::startsWith(Route::current()->getName(),'admin.home')  ? 'sidebar-nav__link--active' : '' }}">
                    <span class="sidebar-nav__text">Главная</span>
                </a>
            </li>
            <li class="sidebar-nav__item">
                <a href="{{route('admin.static-pages.index')}}" class="sidebar-nav__link {{ Str::startsWith(Route::current()->getName(),'admin.static-page')  ? 'sidebar-nav__link--active' : '' }}">
                    <span class="sidebar-nav__text">Статические страницы</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
