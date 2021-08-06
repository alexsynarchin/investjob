<header class="page-header">
    <section class="page-header-top container">
        <div class="page-header-top__city">
            <city-select></city-select>
        </div>
        <div class="page-header-top__right">
            <button class="btn button" data-bs-toggle="modal" data-bs-target="#order-call">
                <svg viewBox="0 0 25 25" class="icon__phone">
                    <use xlink:href={{asset("assets/site/images/sprites.svg#sprite-phone-volume")}}></use>
                </svg>
                Заказать звонок
            </button>
            <header-auth></header-auth>
        </div>
    </section>
    <section class="page-header__middle container">
        <div class="row align-items-center">
            <div class="page-header__logo col-md-3">
                <a href="/" class="logo">
                    <img src="{{asset('assets/site/images/logo.png')}}">
                </a>
            </div>
            <div class="page-header__search col-md-6">
                <header-search></header-search>
            </div>
            <div class="page-header__phone col-md-3">
                <div>
                    <a class="page-header__phone-link" href="tel:+78007001440">8-800-700-14-40</a>
                    <span class="page-header__phone-text">Звонок по России бесплатный</span>
                </div>

            </div>
        </div>
    </section>
</header>

