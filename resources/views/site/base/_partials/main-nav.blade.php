<nav class="main-nav">
    <div class="container">
        <ul class="main-nav__list">
            <li class="main-nav__item">
                <a href="/podbor_personala" class="main-nav__link {{ (request()->is('podbor_personala*')) ? 'main-nav__link--active' : '' }}">
                    Работодателю
                </a>
            </li>
            <li class="main-nav__item">
                <a href="/rabota" class="main-nav__link {{ (request()->is('rabota*')) ? 'main-nav__link--active' : '' }}">
                    Соискателю
                </a>
            </li>
            <li class="main-nav__item">
                <a href="/uslugi" class="main-nav__link {{ (request()->is('uslugi*')) ? 'main-nav__link--active' : '' }}">
                    Услуги
                </a>
            </li>
        </ul>
    </div>

</nav>
