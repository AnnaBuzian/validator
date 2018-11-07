<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{trans('app.title')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="background-welcome">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand title" href="{{ url('/') }}">
                            <span class="glyphicon glyphicon-list-alt"></span>
                            {{ trans('app.title') }}
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">
                                        <span class="glyphicon glyphicon-home"></span>
                                        {{trans('app.home')}}
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">{{trans('auth.Login')}}</a>
                                    <a href="{{ route('register') }}">{{trans('auth.Register')}}</a>

                                    <a href="{{ route('auth.social', 'facebook') }}" title="Facebook" class="btn btn-social-icon btn-facebook">
                                        <span class="fa fa-facebook-official"></span>
                                    </a>
                                    <a href="{{ route('auth.social', 'google') }}" title="Google" class="btn btn-social-icon btn-google">
                                        <span class="fa fa-google"></span>
                                    </a>
                                @endauth
                            </div>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </body>
</html>
