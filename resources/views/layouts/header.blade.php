@inject('routeGenerator', 'App\Services\RouteGeneratorService')
<header class="main-header">
    <!-- Logo -->
    <a href="{{route('index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">PM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Primale</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{url(Auth::user()->image)}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{url(Auth::user()->image)}}" class="img-circle" alt="User Image">
                            <p>
                                {{Auth::user()->name}}
                                <small>Primale</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">

                                <div class="pull-left">
                                    <a href="{{route($routeGenerator->make('profile', auth()->user()))}}" class="btn btn-default btn-flat">Profile</a>
                                </div>


                            <div class="pull-right">
                                <a href="{{route('logout')}}" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
              </ul>
        </div>
    </nav>
</header>
