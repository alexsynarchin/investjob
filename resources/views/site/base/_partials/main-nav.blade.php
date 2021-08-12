<nav class="main-nav">
    <div class="container">
        <div class="mobile-nav-panel__wrap">
            <section class="mobile-nav-panel collapsed" data-bs-toggle="collapse" data-bs-target=".main-nav__list" aria-expanded="false" aria-controls="navbar">
                <i class="mobile-nav-panel__icon ">
                    <span class="mobile-nav-panel__line"></span>
                </i>
                <span class="mobile-nav-panel__text">Меню</span>
            </section>
        </div>
        <ul class="collapse main-nav__list">
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
            <li class="main-nav__item">
                <a href="/kompanii" class="main-nav__link {{ (request()->is('kompanii*')) ? 'main-nav__link--active' : '' }}">
                    Компании
                </a>
            </li>
            <li class="main-nav__item">
                <a href="/uchebnye-tsentry" class="main-nav__link {{ (request()->is('uchebnye-tsentry*')) ? 'main-nav__link--active' : '' }}">
                    Учебные заведения
                </a>
            </li>
            <li class="main-nav__item">
                <a href="/profstandarty" class="main-nav__link {{ (request()->is('profstandarty*')) ? 'main-nav__link--active' : '' }}">
                    Профстандарты
                </a>
            </li>
            <li class="main-nav__item">
                <a href="/about" class="main-nav__link {{ (request()->is('about*')) ? 'main-nav__link--active' : '' }}">
                    О компании
                </a>
            </li>
            <li class="main-nav__item">
                <a href="/kontakt-info" class="main-nav__link {{ (request()->is('kontakt-info*')) ? 'main-nav__link--active' : '' }}">
                   Контакты
                </a>
            </li>
        </ul>
    </div>

</nav>
