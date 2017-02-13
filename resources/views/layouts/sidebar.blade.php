@inject('routeGenerator', 'App\Services\RouteGeneratorService')
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url(Auth::user()->image)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"></li>

            <li>
              <a href="{{route($routeGenerator->make('', auth()->user()))}}">
                <i class="fa  fa-home"></i> <span>Home</span>
              </a>
            </li>

                    <li class="header">My Menu</li>
@if (Auth::user()->role->name == "Admin")
                    <li>
                    <a href="{{route($routeGenerator->make('provider', auth()->user()))}}">
                        <i class="fa fa-users"></i> <span>Providers</span>
                    </a>
                    </li>
@endif
@if (Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Provider" || Auth::user()->role->name == "Client" )

                    <li>
                    <a href="{{route($routeGenerator->make('worker', auth()->user()))}}">
                        <i class="fa fa-money"></i> <span>Workers</span>
                    </a>
                    </li>
@endif
@if (Auth::user()->role->name == "Admin" || Auth::user()->role->name == "Provider")
                    <li>
                    <a href="{{route($routeGenerator->make('client', auth()->user()))}}">
                        <i class="fa fa-child"></i> <span>Clients</span>
                    </a>
                    </li>

@endif
                    <li>
                    <a href="{{route($routeGenerator->make('sexdate', auth()->user()))}}">
                        <i class="fa fa-calendar"></i> <span>SexDates</span>
                    </a>
                    </li>

@if (Auth::user()->role->name == "Admin")
                    <li>
                    <a href="{{route($routeGenerator->make('tag', auth()->user()))}}">
                        <i class="fa fa-commenting-o"></i> <span>Tags</span>
                    </a>
                    </li>
                    <li>
                    <a href="{{route($routeGenerator->make('stock', auth()->user()))}}">
                        <i class="fa fa-archive"></i> <span>Stock</span>
                    </a>
                    </li>
@endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
