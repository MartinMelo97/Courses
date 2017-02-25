<?php

namespace App\Http\Controllers\DocentesAuth;

use App\User;
use App\Docente;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'docentes/login';

    /** 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     public function showRegistrationForm()
    {
        return view('docentes.auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|max:255',
            'usuario' => 'required|max:255|unique:docentes',
            'grado_estudio' => 'required|max:140',
            'email' => 'required|email|max:255|unique:docentes',
            'password' => 'required|min:6|confirmed',
            'institucion_id' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        /*return Docente::create([
            'nombre' => $data['nombre'],
            'usuario' => $data['usuario'],
            'grado_estudio' => $data['grado_estudio'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),*/
            $aux = null;
            if(!is_null($data['imagen'])){
                $file = $data['imagen'];
                $name = 'Docente_'.$data['usuario'].'.'.$file->getClientOriginalExtension();
                $path = public_path().'/images/docentes';
                $file->move($path,$name);
                $route = '/images/docentes/'.$name;
                $imagen = new Imagen();
                $imagen->ruta = $route;
                $imagen->save();
                $aux = $imagen->id;
            }
            else{
                $aux = 7;
            }
            $docente = new Docente();
            $docente->nombre = $data['nombre'];
            $docente->usuario = $data['usuario'];
            $docente->grado_estudio = $data['grado_estudio'];
            $docente->email = $data['email'];
            $docente->imagen_id = $aux;
            $docente->password = bcrypt($data['password']);
            $docente->institucion()->associate(Docente::find($data['institucion_id']));
            $docente->save();
            return $docente;
        //}
       // ]);
    }

}
