<a href="{{route ('docentes.perfil.own')}}"><li>Perfil Docentes</li></a>
<a href="{{route ('docentes.logout')}}"onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><li>Cerrar sesion</li></a>

<form id="logout-form" action="{{route ('docentes.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>