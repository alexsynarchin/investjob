<header  class="page-header container-fluid">
    <div class="row h-100 align-items-center">
        <figure class="col-md-2 page-header__logo">
            <a href="" class="logo">
                <img width="150px" src="{{asset('assets/site/images/logo.png')}}"/>
            </a>
        </figure>
        <div class="col-md-10 page-header__right">
            <header-profile
                :user="{{json_encode(Auth::user())}}"
            ></header-profile>
        </div>
    </div>
</header>
