<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//  
$router->post('login', 'AuthController@login');
$router->post('logout', 'AuthController@logout');
$router->post('refresh', 'AuthController@refresh');
$router->get('profil', ['middleware' => 'jwt.auth', 'uses' => 'AuthController@me']);

$router->get('users', 'UserController@index');
$router->get('user/show/{id}', 'UserController@show');

$router->get('admins', 'AdminController@index');
$router->post('admins/store', 'AdminController@store');
$router->get('admin/show/{id}', 'AdminController@show');
$router->put('admin/update/{id}', 'AdminController@update');
$router->delete('admin/delete/{id}', 'AdminController@destroy');

$router->group(['middleware' => ['auth']], function ($router) {
 
    $router->get('departements', 'DepartementController@index');
    $router->post('departements/store', 'DepartementController@store');
    $router->get('departement/show/{id}', 'DepartementController@show');
    $router->put('departement/update/{id}', 'DepartementController@update');
    $router->delete('departement/delete/{id}', 'DepartementController@destroy');

    //  
    $router->get('positions', 'PositionController@index');
    $router->post('positions/store', 'PositionController@store');
    $router->get('position/show/{id}', 'PositionController@show');
    $router->put('position/update/{id}', 'PositionController@update');
    $router->delete('position/delete/{id}', 'PositionController@destroy');

    //  
    $router->get('employees', 'EmployeeController@index');
    $router->post('employees/store', 'EmployeeController@store');
    $router->get('employee/show/{id}', 'EmployeeController@show');
    $router->put('employee/update/{id}', 'EmployeeController@update');
    $router->delete('employee/delete/{id}', 'EmployeeController@destroy');

    //task
    $router->get('/tasks', 'TaskController@index');
    $router->post('/tasks', 'TaskController@store');
    $router->get('/tasks/{id}', 'TaskController@show');
    $router->put('/tasks/{id}', 'TaskController@update');
    $router->delete('/tasks/{id}', 'TaskController@destroy');

});
