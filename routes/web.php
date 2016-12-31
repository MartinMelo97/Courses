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
    Route::get('dashboard',[
        'uses'=>'Alumnos\AlumnoController@dashboard',
        'as'=>'alumnos.dashboard'
    ]);

    Route::get('/profile', [
        'uses'=>'Alumnos\AlumnoController@profile',
        'as'=>'alumnos.perfil.own'
    ]);

    Route::get('/profile/edit', [
        'uses'=>'Alumnos\AlumnoController@profileEdit',
        'as'=>'alumnos.perfil.edit'
    ]);

    Route::post('/profile/edit', [
        'uses'=>'Alumnos\AlumnoController@profileEditPOST',
        'as'=>'alumnos.perfil.edit'
    ]);

});


//Rutas de administrador
Route::group(['prefix' => 'admin'], function() {
    Auth::Routes();
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/dashboard', [
            'uses'=>'HomeController@index',
            'as'=>'admin.dashboard'
        ]);
        Route::resource('cursos', 'AdminControllers\CursosController');
        Route::get('cursos/{id}/destroy',[
            'uses'=>'AdminControllers\CursosController@destroy',
            'as'=>'cursos.destroy'
        ]);

        Route::resource('categorias', 'AdminControllers\CategoriasController');
        Route::get('categorias/{id}/destroy',[
            'uses'=>'AdminControllers\CategoriasController@destroy',
            'as'=>'categorias.destroy'
        ]);

        Route::resource('instituciones', 'AdminControllers\InstitucionesController');
        Route::get('instituciones/{id}/destroy',[
            'uses'=>'AdminControllers\InstitucionesController@destroy',
            'as'=>'instituciones.destroy'
        ]);
        
        Route::resource('alumnos', 'AdminControllers\AlumnosController');
        Route::get('alumnos/{id}/destroy',[
            'uses'=>'AdminControllers\AlumnosController@destroy',
            'as'=>'alumnos.destroy'
        ]);

        Route::resource('docentes', 'AdminControllers\DocentesController');
        Route::get('docentes/{id}/destroy',[
            'uses'=>'AdminControllers\DocentesController@destroy',
            'as'=>'docentes.destroy'
        ]);

        Route::resource('tags', 'AdminControllers\TagsController');
        Route::get('tags/{id}/destroy', [
        'uses'=>'AdminControllers\TagsController@destroy',
        'as'=>'tags.destroy'
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
    ])->middleware('auth');

    Route::post('registro',[
        'uses'=>'DocentesAuth\RegisterController@register',
        'as'=>'docentes.registro'
    ])->middleware('auth');



 /*   Route::get('/{usuario}', [
        'uses' => 'Docentes\DocenteController@show',
        'as' => 'docentes.perfil'
    ]);*/

    Route::post('password/email', 'DocentesAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset', 'DocentesAuth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'DocentesAuth\ResetPasswordController@reset');
    Route::get('password/reset/{token}','DocentesAuth\ResetPasswordController@showResetForm');

    Route::group(['middleware'=>'docentes'], function(){

        Route::get('/perfil',[
            'uses'=>'Docentes\DocenteController@profile',
            'as'=>'docentes.perfil.own'
        ]);

        Route::get('/{usuario}',[
            'uses'=>'Docentes\DocenteController@show',
            'as'=>'docentes.perfil'
        ]);

        Route::get('/perfil/edit',[
            'uses'=>'Docentes\DocenteController@profileEdit',
            'as'=>'docentes.perfil.edit'
        ]);

        Route::post('/perfil/edit',[
            'uses'=>'Docentes\DocenteController@profileEditPOST',
            'as'=>'docentes.perfil.edit'
        ]);
    });
});

