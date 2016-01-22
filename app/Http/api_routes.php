<?php




$router->get('hello', function () {
    return 'hello1';
});


$router->post('auth/login', 'AuthenticateController@authenticate');
$router->post('auth/register', 'AuthenticateController@register');

$router->get('cards/hello', 'CardController@hello');
$router->resource('cards', 'CardController');

$router->group(['middleware' => ['jwt.auth'/*, 'jwt.refresh'*/]], function ($router) {
    $router->get('user/me', 'AuthenticateController@getAuthenticatedUser');

});

$router->group(['middleware' => 'guest'], function ($router) {
});







