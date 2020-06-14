<?php

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

$router->post('/register','UserController@register');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/api', function ()    {
        return 'ok';
    });
});

$router->group(['prefix'=>'api/v1'], function() use($router){
  $router->get('/products', 'ProductController@index');
  $router->post('/product', 'ProductController@create');
  $router->get('/product/{id}', 'ProductController@show');
  $router->put('/product/{id}', 'ProductController@update');
  $router->delete('/product/{id}', 'ProductController@destroy');
});
