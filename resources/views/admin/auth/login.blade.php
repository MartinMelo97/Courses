@extends('main.base')
@section('title','Login Administradores')
@section('content')

                <div>Login</div>
                <div>
                    <form method="POST" action="{{ url('admin/login') }}">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Correo Electrónico</label>

                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                                @if($errors->has('email'))
                                    <span>
                                        <strong>{{ $errors->first('email') }}</strong>
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
                            <div>
                                <div>
                                    <label>
                                        <input type="checkbox" name="remember"> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div>
                                <button type="submit">
                                    Login
                                </button>

                                <a href="{{ url('admin/password/reset') }}">
                                    Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
