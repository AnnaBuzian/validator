<nav class="navbar navbar-default navbar-static-top">
    <div class="container">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="glyphicon glyphicon-list-alt"></span>
            {{ trans('app.title') }}
        </a>

        <div class="collapse navbar-collapse" id="#admin-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <div class="top-right links">
                        <a href="{{ route('auth.social', 'facebook') }}" title="Facebook" class="btn btn-social-icon btn-facebook">
                            <span class="fa fa-facebook-official"></span>
                        </a>
                        <a href="{{ route('auth.social', 'google') }}" title="Google" class="btn btn-social-icon btn-google">
                            <span class="fa fa-google"></span>
                        </a>
                    </div>
                @else
                    <li><a href="{{ url('/admin/statistic') }}">{{trans('admin.Statistic')}}</a></li>
                    <li><a href="{{ url('/admin/profile') }}">{{trans('admin.Profile')}}</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{trans('auth.logout')}}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>