<?php




$router->get('hello', function () {
    return 'hello1';
});


$router->post('auth/login', 'AuthenticateController@authenticate');
$router->post('auth/register', 'AuthenticateController@register');

$router->group(['middleware' => 'guest'], function ($router) {
    $router->get('cards/hello', 'CardController@hello');
});


$router->group(['middleware' => ['jwt.auth'/*, 'jwt.refresh'*/]], function ($router) {
    $router->get('user/me', 'AuthenticateController@getAuthenticatedUser');
    $router->resource('cards', 'CardController');
});





