<a href="{{route ('alumnos.index')}}"><li>Alumnos</li></a>
<a href="{{route ('categorias.index')}}"><li>Categorias</li></a>
<a href="{{route ('cursos.index')}}"><li>Cursos</li></a>
<a href="{{route ('docentes.index')}}"><li>Docentes</li></a>
<a href="{{route ('instituciones.index')}}"><li>Instituciones</li></a>
<a href="{{route ('tags.index')}}"><li>Tags</li></a>
<a href="{{route ('admin.dashboard')}}"><li>Dashboard</li></a>
<a href="{{route ('logout')}}"onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><li>Cerrar sesion</li></a>



<form id="logout-form" action="{{route ('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>