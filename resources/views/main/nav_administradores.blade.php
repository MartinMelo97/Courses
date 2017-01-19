<a href="{{route ('admin.dashboard')}}"><li>Dashboard</li></a>
<a href="{{route ('logout')}}"onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><li>Cerrar sesion</li></a>



<form id="logout-form" action="{{route ('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>