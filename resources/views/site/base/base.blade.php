<!doctype html>
<html lang="ru">
    @include('site.base._partials.head')
    <body>
        <section class="page-wrapper" id="app">
            @include('site.base._partials.header')
            @include('site.base._partials.main-nav')
            <section class="page-content">
                @yield('page-content')
            </section>
            @include('site.base._partials.footer')
            @include('site.base._partials.modal')
            <loading v-if="isLoading"></loading>
        </section>
        <script>
            window.App = {!! json_encode([
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
            'city' => json_decode(Cookie::get('city'))
            ]) !!} ;
        </script>
        @include('site.base._partials.scripts')
    </body>
</html>
