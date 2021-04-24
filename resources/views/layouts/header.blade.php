


<nav class="navbar navbar-expand-md  navbar-dark navbar-static-top bg-primary">
    <button class="navbar-toggler" type="submit" data-toggle= "collapse" data-target= "#navbarSupportedContent" aria-controls= "navbarSupportedContent" aria-label= "Toggle navigation">
        <span class="navbar-toggler-icon">(current)</span>
        <a class="navbar-brand" >Menú</a>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link"  href="">Inicio<span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" >
                    Listar
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           @if(Auth::check())
                    <a class="dropdown-item" href="{{asset(route('movimiento.create'))}}">Registrar Movimiento</a>
                        <div class="dropdown-divider"></div>
                   @endif


                    <a class="dropdown-item" href="{{asset(route('movimiento.index'))}}">Lista de Movimientos</a>

                </div>

            </li>



            <li class="nav-item">
                <a class="nav-link" href="">Reportes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>


        <ul class="nav navbar-dark ">
            <!-- Authentication Links -->
            @if (Auth::guest())

                <li><a class="btn-success " href="{{ route('login') }}">Login</a></li>

                <li><a class="btn-danger" href="{{ route('register') }}">Register</a></li>

            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle btn-success" data-toggle="dropdown" role="button"  aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu align-content-center" role="menu" >
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul >









    </div>
</nav>