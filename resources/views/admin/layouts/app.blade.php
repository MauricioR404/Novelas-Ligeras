<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BuffaloSafe - Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>



<div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <a class="navbar-brand ml-5" href="#" style="color:white!important;">
               {{-- <img src="{{ asset('img/logo-white.svg') }}" width="30" height="30" class="d-inline-block align-top" >--}}
            Novelas Ligeras
            </a>

          <div class="container mt-4 mb-2 d-flex flex-column align-items-center">
            <div class="mb-2">
            <img src="{{asset('img/user.svg')}}" class="img-responsive" style="border-radius: 50%;" alt="" width="70">
          </div>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{ optional(auth()->user())->name }}</div>
            <div class="profile-usertitle-status">{{ optional(auth()->user())->email }}</div>
          </div>
          </div>


            <ul class="list-unstyled components">
              <li class="active">
                    <a href="#"><i class="fas fa-chart-line"></i> Panel</a>
                </li>

                <li>
                    <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-circle"></i> Mi perfil</a>
                    <ul class="collapse list-unstyled" id="profileSubmenu">
                        <li>
                            <a href="{{ route('user.show') }}">Actualizar perfil</a>
                        </li>
                    </ul>
                </li>
                @role('Admin|traductor')
                    <li>
                        <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-file-upload"></i> Novelas</a>
                        <ul class="collapse list-unstyled" id="filesSubmenu">
                            <li>
                                <a href="{{ route('novela.index') }}">Ver Novelas</a>
                            </li>
                            <li>
                                <a href="{{ route('novela.crear') }}">Agregar Novelas</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-unlock-alt"></i> Capitulos</a>
                        <ul class="collapse list-unstyled" id="rolesSubmenu">
                            <li>
                                <a href="{{ route('capitulo.index') }}">Ver todos</a>
                            </li>
                            <li>
                                <a href="{{ route('capitulo.crear') }}">Agregar Capitulo</a>
                            </li>
                        </ul>
                    </li>
                @endrole
                <!-- Solo si es admin puede ver los links -->
                @role('Admin')
                    <li>
                        <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Permisos</a>
                        <ul class="collapse list-unstyled" id="permissionSubmenu">
                            <li>
                                <a href="{{ route('permission.index') }}">Ver todos</a>
                            </li>
                            <li>
                                <a href="{{ route('permission.create') }}">Agregar permiso</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#roleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Roles</a>
                        <ul class="collapse list-unstyled" id="roleSubmenu">
                            <li>
                                <a href="{{ route('role.index') }}">Ver todos</a>
                            </li>
                            <li>
                                <a href="{{ route('role.create') }}">Agregar Rol</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Usuarios</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="{{ route('user.index') }}">Ver todos</a>
                            </li>
                            <li>
                                <a href="{{ route('user.create') }}">Agregar usuario</a>
                            </li>
                        </ul>
                    </li>
                @endrole

                <li>
                    <a href="#"><i class="far fa-question-circle"></i> Soporte</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a class="logout btn-outline-danger" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="fas fa-power-off"></i>
                        Cerrar sesión
                     </a>
                </li>
            </ul>
        </nav>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>

<!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a>@yield('page')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

@include('admin.partials.alert')
@include('admin.partials.error')



@yield('content')
  <script src="{{ asset('js/slim.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

@yield('scripts')



</body>
</html>
