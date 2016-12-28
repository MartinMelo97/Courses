@extends('main.base')
@section('title','Registro')
@section('content')

                <div>Registro Alumnos</div>
                <div>
                    <form method="POST" action="{{ url('/registro') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre">Nombre</label>

                            <div>
                                <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span>
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="{{ $errors->has('apellidos') ? ' has-error' : '' }}">
                            <label for="apellidos">Apellidos</label>
                            <div>
                                <input id="apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" required autofocus>

                                @if ($errors->has('apellidos'))
                                    <span>
                                        <strong>{{ $errors->first('apellidos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="{{ $errors->has('usuario') ? ' has-error' : '' }}">
                            <label for="usuario">Usuario</label>
                            <div>
                                <input id="usuario" type="text" name="usuario" value="{{ old('usuario') }}" required autofocus>

                                @if ($errors->has('usuario'))
                                    <span>
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label for="sexo">Sexo</label>

                            <div>
                                <select name="sexo" value="{{ old('sexo')}}" required>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>

                                @if ($errors->has('sexo'))
                                    <span>
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('imagen') ? ' has-error' : '' }}">
                            <label for="imagen">Imagen</label>

                            <div>
                                <input id="imagen" type="file" name="imagen" value="{{ old('imagen') }}">

                                @if ($errors->has('imagen'))
                                    <span>
                                        <strong>{{ $errors->first('imagen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('pais') ? ' has-error' : '' }}">
                            <label for="pais">País de oigen</label>

                            <div>
                                <input id="pais" type="text" name="pais" value="{{ old('pais') }}" required>

                                @if ($errors->has('pais'))
                                    <span>
                                        <strong>{{ $errors->first('pais') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                            <label for="fecha_nacimiento">Fecha Nacimiento</label>

                            <div>
                                <input id="fecha_nacimiento" type="text" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>

                                @if ($errors->has('fecha_nacimiento'))
                                    <span>
                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Contraseña</label>

                            <div>
                                <input id="password" type="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="">
                            <label for="password-confirm">Confirmar Contraseña</label>

                            <div>
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="">
                            <div>
                                <button type="submit">
                                    Registrarse
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
