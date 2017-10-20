<?php



$this->app->router->group(['namespace' => '\Artifact2\Client\Http\Controllers'], function($router) {

    // Serve the client website
    $router->get('/', ClientController::class . '@index');


    // Serve the client website login
    $router->get('/login', ClientController::class . '@userLogin');
    $router->post('/login', ClientController::class . '@userLogin');

    // Serve the client administrator panel
    // This routes checks the API generated in /login (key is put in session variable)
    $router->get('/admin', ClientController::class . '@admin');


    // Serve login request for the client administrator panel
    // This route generates an API key from a method call to the ESB
    $router->get('/login/{email}/{password}', ClientController::class . '@login');



});





