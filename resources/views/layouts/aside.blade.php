<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}/dashboard" class="brand-link">
        <img src="{{url('/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
                <small style="color: #8B9098">{{ Auth::user()->roles->pluck('name')[0] }}</small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('amministrazione-menu')
                    <li class="nav-header">AMMINISTRAZIONE</li>
                    <li class="nav-item">
                        <a href="{{url('/users')}}" class="nav-link {{(request()->is('users') || request()->is('users/*'))?'active':''}}">
                            <i class="fas fa-users"></i>
                            <p>
                                Utenti
                                <span class="right badge badge-primary">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/roles')}}" class="nav-link {{(request()->is('roles') || request()->is('roles/*'))?'active':''}}">
                            <i class="fas fa-hand-sparkles"></i>
                            <p>Ruoli</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/permissions')}}" class="nav-link {{(request()->is('permissions') || request()->is('permissions/*'))?'active':''}}">
                            <i class="fas fa-map-signs"></i>
                            <p>Permessi</p>
                        </a>
                    </li>
                @endcan
                @can('houses-menu')
                        <li class="nav-header">IMMOBILI</li>
                        <li class="nav-item">
                            <a href="{{url('/houses')}}" class="nav-link {{(request()->is('houses') || request()->is('houses/*'))?'active':''}}">
                                <i class="far fa-building nav-icon"></i>
                                <p>Immobili</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/houses_archivied')}}" class="nav-link {{(request()->is('houses_archivied') || request()->is('houses_archivied/*'))?'active':''}}">
                                <i class="fas fa-building nav-icon"></i>
                                <p>Archiviati</p>
                            </a>
                        </li>
                @endcan
                    @can('richieste-menu')
                        <li class="nav-header">RICHIESTE</li>
                    @endcan
                    @can('nominativi-menu')
                        <li class="nav-header">NOMINATIVI</li>
                        <li class="nav-item">
                            <a href="{{url('/persons')}}" class="nav-link {{(request()->is('persons') || request()->is('persons/*'))?'active':''}}">
                                <i class="fas fa-users"></i>
                                <p>
                                    Nominativi
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('customers-menu')
                        <li class="nav-header">CLIENTI</li>
                    @endcan
                    @can('impostazioni-menu')
                        <li class="nav-header">IMPOSTAZIONI</li>
                    @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
