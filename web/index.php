<?php

require_once __DIR__.'/../vendor/autoload.php';

$app    = new Silex\Application();
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

//Repositories
$app['vagas.repository'] = (function() {
    return new \Catho\Repository\VagasRepository();
});

//Registering controllers
$app['vagas.controller'] = (function($app) {
    return new \Catho\Controller\VagasController($app['vagas.repository']);
});

$app->get('/vagas', "vagas.controller:indexAction");
$app->get('/vagas/term/{term}', "vagas.controller:getAction", $term);
$app->get('/vagas/city/{city}', "vagas.controller:getByCityAction", $city);
$app->get('/vagas/salary/{order}', "vagas.controller:getBySalaryAction", $order);

$app->run();

