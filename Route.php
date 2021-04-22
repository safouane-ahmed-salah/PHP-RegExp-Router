<?php

namespace RegexpRouter;

class Route{
    private $route = '';
    private $request_uri = '';
    private $method = '';
    
    function __construct($basePath = ''){
        $this->request_uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->route = $basePath;
    }
    
    function run($path,$fn = '', $method = 'get'){
        $t = clone $this;
        if(is_callable($path)) $fn = $path; 
        else $t->route .= $path;
        if(!preg_match('#^'.$t->route.'#', $this->request_uri, $m) 
            || strtolower($method)!=strtolower($this->method) ) return $t;
        $m[0] = $t;
        echo call_user_func_array($fn,$m);
        die;
    }

    function get($path, $fn = ''){ return $this->run($path,$fn,'get'); }

    function post($path, $fn = ''){ return $this->run($path,$fn,'post'); }

    function delete($path, $fn = ''){ return $this->run($path,$fn, 'delete'); }
}
