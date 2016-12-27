<a href="{{route ('alumnos.perfil.own')}}"><li>Perfil</li></a>
<a href="{{route ('alumnos.logout')}}"onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><li>Cerrar sesion</li></a>

<form id="logout-form" action="{{route ('alumnos.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>