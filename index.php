<?php

use RegexRouter\Route;

include 'Route.php';

$route = new Route('/test');
$route->get('/(\d+)', function($a, $b){ 
    $a->get('/edit', function($a, $b){ return 'edit '.$b; });
    return 'get '.$b; 
})->post('/(\d+)$', function($a,$b){ return 'post '.$b; })
->delete('/(\d+)$', function($a,$b){ return 'delete '.$b; });
