<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    <title>{{ trans('app.title') }}</title>

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/admin.css') }}" rel="stylesheet">
</head>
<body>
@include('admin/shared/navbar')

<div class="content-wrapper bg-light">
    <div class="container-fluid">
        <div class="row">
        @include('admin/shared/sidebar')
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}"></script>
<script src="{{ mix('/js/admin.js') }}"></script>
</body>
</html>