@extends('main.base')
@section('title','Registro Docentes')

@section('content')

                <div>Register Docente</div>
                <div>
                    <form method="POST" action="{{ route('docentes.perfil.edit')}}">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre">Nombre</label>

                            <div>
                                <input id="nombre" type="text" name="nombre" value="{{ $docente->nombre }}" required autofocus>  
                            </div>
                        </div>

                        <div class="{{ $errors->has('usuario') ? ' has-error' : '' }}">
                            <label for="usuario">Usuario</label>

                            <div>
                                <input id="usuario" type="text" name="usuario" value="{{ $docente->usuario }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="{{ $errors->has('grado_estudio') ? ' has-error' : '' }}">
                            <label for="grado_estudio">Grado Estudio</label>

                            <div>
                                <input id="grado_estudio" type="text" name="grado_estudio" value="{{ $docente->grado_estudio }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Correo Electronico</label>

                            <div>
                                <input id="email" type="email" name="email" value="{{ $docente->email }}" required>

                                
                            </div>
                        </div>
                        <h3>Actualizar contraseña</h3>
                        <input type="hidden" name="institucion_id" id="institucion_id" value="{{$docente->institucion_id}}">

                        <div class="">
                            <div class="">
                                <button type="submit" class="">
                                    Actualizar
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
