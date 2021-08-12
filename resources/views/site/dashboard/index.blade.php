@extends('site.base.base')
@section('page-content')
    <div class="container">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item"><a href="{{route('home')}}" class="breadcrumbs__link">Главная</a> </li>
            <svg viewBox="0 0 5 10" class="breadcrumbs__icon">
                <use xlink:href={{asset("assets/site/images/sprites.svg#sprite-br-icon")}}></use>
            </svg>
            <li class="breadcrumbs__item">Кабинет агента (Вакансии)</li>
        </ul>
        <personal></personal>
    </div>
@endsection
