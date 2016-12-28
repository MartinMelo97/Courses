@extends('main.base')
@section('title','Inicia sesion')
@section('content')
    <div >Login Docentes</div>
                <div>
                    <form method="POST" action="{{ url('/docentes/login') }}">
                        {{ csrf_field() }}

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

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"name="password" required>

                                @if ($errors->has('password'))
                                    <span>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <div>
                                <div>
                                    <label>
                                        <input type="checkbox" name="remember"> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit">
                                    Login
                                </button>

                                <a href="{{ url('docentes/password/reset') }}">
                                    Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
@endsection('content')
