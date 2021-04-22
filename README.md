# PHP-Regex-Router

simple way to create Routes via Regex

# Usage:

Inistanciate with base route;

```php
$route = RegexRouter\Route('\baseRoute');
```
then use based on the method to process the request

```php
$route->get('/(\d+)', function($route, $param1){ return 'get '.$param1; }); //make sure you add bracket between the parameter you want to get as argument

//when works on the routes like /basePath/12  
```

it supports the child route inside the function 

```php
$route->get('/(\d+)', function($route, $param1){ 
  $data = get_data_of_param($param1); // get data of param 1
  $route->post('/edit', function($route, $param1) use($data) { /* edit data of param 1 */ }); //this works on the route like /basePath/12/edit of post method
  
  return json_encode($data); 
}); 
```

