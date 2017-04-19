<li class="user_logged_name" data-id="{{\Auth::guard('alumnos')->user()->id}}">{{\Auth::guard('alumnos')->user()->usuario}}</li>
<a href="{{route ('alumnos.perfil.own')}}"><li>Perfil</li></a>
<a href="{{route ('alumnos.logout')}}"onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><li>Cerrar sesion</li></a>

<form id="logout-form" action="{{route ('alumnos.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>