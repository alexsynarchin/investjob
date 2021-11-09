<!DOCTYPE html>
<html lang="ru">
@include('admin.base._partials.head')
<body >
<div class="page-wrapper"  id="app">
    @role('super-admin')
        @include('admin.base._partials.header')
    @endrole
    @if(Auth::check() && auth()->user()->hasRole('super-admin'))
        <div class="dashboard-main">
            @include('admin.base._partials.sidebar')
            <main class="dashboard-content">
                @yield('content')
            </main>
        </div>
    @else
        @yield('content')
    @endif
    @role('super-admin')
        @include('admin.base._partials.footer')
    @endrole

    <div class="overlay" v-if="isLoading">
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>
</div>

@include('admin.base._partials.scripts')
@yield('scripts')

</body>
</html>
