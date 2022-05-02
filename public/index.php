<?php

use App\Router;

require '../vendor/autoload.php';



echo("SERVEUR REQUEST URI");
echo("<br>");
echo('<pre>');
print_r($_SERVER);
echo('</pre>');


//$router = new Router(dirname(__DIR__) . '/views');
//
//$router
//    ->get('/machines', 'machines/index', "machines")
//    ->run();

$router = new \App\AlRouter();

define('VIEW_PATH', dirname(__DIR__) . '/views');

$router->map('GET', '/machines', function () {
    require VIEW_PATH . '/machines/index.php';
});

$match = $router->match();
$match['target']();