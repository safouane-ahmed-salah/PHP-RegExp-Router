# PHP-RegExp-Router

simple way to create Routes via Regex

# Usage:

Instantiate with base route;

```php
$route = RegexpRouter\Route('/baseRoute');
```
then use based on the method to process the request

```php
$route->get('/(\d+)', function($route, $param1){ return 'get '.$param1; }); //make sure you add bracket between the regex you want to get as argument

//served on the routes like /baseRoute/12  
```

it supports the child route inside the function 

```php
$route->get('/(\d+)', function($route, $param1){ 
  $data = get_data_of_param($param1); // get data of param 1
  $route->post('/edit', function($route, $param1) use($data) { /* edit data of param 1 */ }); //this served on the routes like /baseRoute/12/edit of post method
  
  return json_encode($data); 
}); 
```

another way we can chain methods  

```php
$route->get('/(\d+)', function($route, $param1){
  return json_encode($data); 
})->post(function($route, $param1){ /**/ }); //note we can just pass the function to process the request of route like /baseRoute/12  
```
