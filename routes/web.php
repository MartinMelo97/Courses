<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'uses'=>'MainController@index',
    'as'=>'main'
]);

Route::get('/login',[
    'uses'=>'AlumnosAuth\LoginController@showLoginForm',
    'as'=>'alumnos.login']);

Route::post('/login',[
    'uses'=>'AlumnosAuth\LoginController@login',
    'as'=>'alumnos.login']);

Route::post('/logout',[
    'uses'=>'AlumnosAuth\LoginController@logout',
    'as'=>'alumnos.logout']);


Route::get('/registro',[
    'uses'=>'AlumnosAuth\RegisterController@showRegistrationForm',
    'as'=>'alumnos.registro'
]);

Route::post('registro',[
    'uses'=>'AlumnosAuth\RegisterController@register',
    'as'=>'alumnos.registro'
]);

Route::get('/alumnos/{usuario}',[
    'uses'=>'Alumnos\AlumnoController@show',
    'as'=>'alumnos.perfil'
]);    


Route::post('password/email', 'AlumnosAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset', 'AlumnosAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/reset', 'AlumnosAuth\ResetPasswordController@reset');
Route::get('password/reset/{token}','AlumnosAuth\ResetPasswordController@showResetForm');


Route::group(['middleware'=>'alumnos'], function() {
    Route::get('dashboard', 'AlumnosHomeController@index');

    Route::get('/profile', [
        'uses'=>'Alumnos\AlumnoController@profile',
        'as'=>'alumnos.perfil.own'
    ]);

    Route::get('/profile/edit', [
        'uses'=>'Alumnos\AlumnoController@profileEdit',
        'as'=>'alumnos.perfil.edit'
    ]);

});


//Rutas de administrador
Route::group(['prefix' => 'admin'], function() {
    Auth::Routes();
    
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/dashboard', 'HomeController@index');
        
        Route::resource('cursos', 'CursosController');
        Route::get('cursos/{id}/destroy',[
            'uses'=>'AdminControllers/CursosController@destroy',
            'as'=>'admin.cursos.destroy'
        ]);

        Route::resource('categorias', 'CategoriasController');
        Route::get('categorias/{id}/destroy',[
            'uses'=>'AdminControllers/CategoriasController@destroy',
            'as'=>'admin.categorias.destroy'
        ]);

        Route::resource('instituciones', 'InstitucionesController');
        Route::get('instituciones/{id}/destroy',[
            'uses'=>'AdminControllers/InstitucionesController@destroy',
            'as'=>'admin.instituciones.destroy'
        ]);
        
        Route::resource('alumnos', 'AlumnosController');
        Route::get('alumnos/{id}/destroy',[
            'uses'=>'AdminControllers/AlumnosController@destroy',
            'as'=>'admin.alumnos.destroy'
        ]);

        Route::resource('docentes', 'DocentesController');
        Route::get('docentes/{id}/destroy',[
            'uses'=>'AdminControllers/DocentesController@destroy',
            'as'=>'admin.docentes.destroy'
        ]);

        Route::resource('tags', 'TagsController');
        Route::get('tags/{id}/destroy', [
        'uses'=>'AdminControllers/TagsController@destroy',
        'as'=>'admin.tags.destroy'
        ]);
    });
 
});

//Rutas instituciones
Route::group(['prefix' => 'instituciones'], function(){
    Route::get('/',[
        'uses'=>'InstitucionController@list',
        'as'=>'instituciones.list'
    ]);

    Route::get('/{slug}', [
        'uses'=>'InstitucionController@detail',
        'as'=>'instituciones.detail'
    ]);

    Route::get('/{slug}/cursos',[
        'uses'=>'InstitucionController@courses',
        'as'=>'instituciones.courses'
    ]);
});

//Rutas de cursos 
Route::group(['prefix' => 'cursos'],function(){
    Route::get('/',[
        'uses'=>'CursoController@list',
        'as'=>'cursos.list'
    ]);

    Route::get('/{slug}', [
        'uses'=>'CursoController@detail',
        'as'=>'cursos.detail'
    ]);

});

//Rutas de categorias
Route::group(['prefix' => 'categorias'], function() {
    
    Route::get('/',[
        'uses'=>'CategoriasController@list',
        'as'=>'categorias.list'
    ]);

    Route::get('/{slug}/cursos',[
        'uses'=>'CategoriasController@detail',
        'as'=>'categorias.detail'
    ]);
    
});

//Rutas de tags
Route::group(['prefix' => 'tags'], function() {
    
    Route::get('/',[
        'uses'=>'TagController@list',
        'as'=>'tags.list'
    ]);

    Route::get('/{slug}/cursos',[
        'uses'=>'TagController@detail',
        'as'=>'tags.detail'
    ]);
    
});

//Rutas relacionadas con alumnos
Route::group(['prefix'=>'alumnos'], function(){

    Route::group(['prefix'=>'curso'], function(){
        Route::get('/{nombre}/contenido', function($nombre){
            return "Contenido del curso";
        });

        Route::get('/{nombre}', function($nombre){
            return "Lalal del curso";
        });

        Route::get('/{nombre}/progreso', function($nombre){
            return 'Progreso en el curso';
        });

        Route::get('/{nombre}/foro', function($nombre){
            return "Foro del curso";
        });
    });
});

//Rutas de docentes
Route::group(['prefix'=>'docentes'], function(){

    Route::get('/login',[
    'uses'=>'DocentesAuth\LoginController@showLoginForm',
    'as'=>'docentes.login']);

    Route::post('/login',[
        'uses'=>'DocentesAuth\LoginController@login',
        'as'=>'docentes.login']);

    Route::post('/logout',[
        'uses'=>'DocentesAuth\LoginController@logout',
        'as'=>'docentes.logout']);


    Route::get('registro',[
        'uses'=>'DocentesAuth\RegisterController@showRegistrationForm',
        'as'=>'docentes.registro'
    ]);

    Route::post('registro',[
        'uses'=>'DocentesAuth\RegisterController@register',
        'as'=>'docentes.registro'
    ]);


    Route::post('password/email', 'DocentesAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'DocentesAuth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'DocentesAuth\ResetPasswordController@reset');
    Route::get('password/reset/{token}','DocentesAuth\ResetPasswordController@showResetForm');

    Route::get('/{usuario}', [
        'uses' => 'DocentesControllers\PerfilController@show',
        'as' => 'docentes.perfil'
    ]);

    Route::group(['middleware'=>'docentes'], function(){
        Route::get('/dashboard', 'DocentesHomeController@index');

        Route::get('/perfil', function(){
            return "Mi perfil de profe";
        });

        Route::get('/perfil/edit', function(){
            return "Editando mi perfil de profe";
        });

    });
});

