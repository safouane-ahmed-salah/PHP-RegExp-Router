<?php

use RegexpRouter\Route;

include 'Route.php';

$route = new Route('/test');
$route->get('/(\d+)', function($a, $b){ 
    $a->get('/edit', function($a, $b){ return 'edit '.$b; });
    return 'get '.$b; 
})->post(function($a,$b){ return 'post '.$b; })
->delete(function($a,$b){ return 'delete '.$b; });
