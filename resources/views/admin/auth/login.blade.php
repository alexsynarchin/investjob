@extends('admin.base.base')
@section('content')
    <div class="container auth">
        <div class="row  justify-content-center">
            <div class="col-md-4">
                <div class="card text-center ">
                    <div class="card-header">
                        <figure class="auth__logo">
                            <img src="{{asset('assets/site/images/logo.png')}}">
                        </figure>
                        <h1 class="auth__title">
                            Вход
                        </h1>
                    </div>
                    <div class="card-body">
                        <login-form
                        >
                        </login-form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

