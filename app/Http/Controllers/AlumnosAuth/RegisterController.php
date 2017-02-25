<?php
namespace App\Http\Controllers\AlumnosAuth;
use App\User;
use App\Alumno;
use App\Imagen;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
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
    protected $redirectTo = '/login';
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
        return view('alumnos.auth.register');
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
            'apellidos' => 'required|max:255',
            'usuario'=>'required|max:140|unique:alumnos',
            'email' => 'required|email|max:255|unique:alumnos',
            'sexo' => 'required',
            'pais' => 'required|min:4|max:140',
            'fecha_nacimiento'=> 'required|max:10|min:10',
            'password' => 'required|min:6|confirmed',
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
        $aux = 0;
        if(!empty($data['imagen'])){
            $file = $data['imagen'];
            $name = 'Alumno_'.$data['usuario'].'.'.$file->getClientOriginalExtension();
            $path = public_path().'/images/alumnos/profile';
            $file->move($path,$name);
            $route = '/images/alumnos/profile/'.$name;

            $imagen = new Imagen();
            $imagen->ruta = $route;
            $imagen->save();
            $aux = $imagen->id;
        }
        else
        {
            $aux = 8;
        }

        
        /*return Alumno::create([
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'usuario' => $data['usuario'],
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'sexo' => $data['sexo'],
            'imagen' => $route,
            'pais' => $data['pais'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'password' => bcrypt($data['password']),
        ]);*/

        $alumno = new Alumno();
        $alumno->nombre = $data['nombre'];
        $alumno->apellidos = $data['apellidos'];
        $alumno->usuario = $data['usuario'];
        $alumno->email = $data['email'];
        $alumno->sexo = $data['sexo'];
        $alumno->imagen_id = $aux;
        $alumno->pais = $data['pais'];
        $alumno->fecha_nacimiento = $data['fecha_nacimiento'];
        $alumno->password = bcrypt($data['password']);
        $alumno->save();

        return $alumno;
    }
    protected function guard()
    {
        return Auth::guard('alumnos');
    }
}