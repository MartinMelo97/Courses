@extends('main.base')
@section('title','Registro')
@section('content')

                <div>Registro Alumnos</div>
                <div>
                    <form method="POST" action="{{ route('alumnos.perfil.edit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div>
                            <label for="nombre">Nombre</label>
                            <div>
                                <input id="nombre" type="text" name="nombre" value="{{$alumno->nombre }}" required autofocus>
                            </div>
                        </div>
                        <div>
                            <label for="apellidos">Apellidos</label>
                            <div>
                                <input id="apellidos" type="text" name="apellidos" value="{{$alumno->apellidos}}" required autofocus>
                            </div>
                        </div>
                        <div>                    
                            <label for="usuario">Usuario</label>
                            <div>
                                <input id="usuario" type="text" name="usuario" value="{{$alumno->usuario}}" required autofocus>
                            </div>
                        </div>
                        <div> 
                            <label for="email">E-Mail Address</label>
                            <div>
                                <input id="email" type="email" name="email" value="{{$alumno->email}}" required>                               
                            </div>
                        </div>
                        <div>           
                            <label for="sexo">Sexo</label>
                            <div>
                                <select name="sexo" value="{{$alumno->sexo}}" required>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                        @if(!is_null($alumno->imagen))
                            <img src="{{asset($alumno->imagen->ruta)}}" style="width:200px; height:200px;">
                        @endif
                        <div>      
                            <label for="imagen">Imagen</label>
                            <div>
                                <input id="imagen" type="file" name="imagen" value="">     
                            </div>
                        </div>
                        <div>            
                            <label for="pais">País de origen</label>
                            <div>
                                <input id="pais" type="text" name="pais" value="{{$alumno->pais}}" required>
                            </div>
                        </div>
                        <div>
                            <label for="fecha_nacimiento">Fecha Nacimiento</label>
                            <div>
                                <input id="fecha_nacimiento" type="text" name="fecha_nacimiento" value="{{$alumno->fecha_nacimiento}}" required>
                            </div>
                        </div>
                        <div>  
                            <h3>Cambiar contraseña</h3>
                        </div>
                        <div class="">
                            <div>
                                <button type="submit">
                                    Actualizar informacion
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
