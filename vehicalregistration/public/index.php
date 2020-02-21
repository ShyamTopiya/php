<?php


require_once dirname(__DIR__).'/vendor/autoload.php';


spl_autoload_register(function($class)
{
    $root = dirname(__DIR__);
    $file = $root.'/'.str_replace('\\','/',$class).'.php';
    if(is_readable($file))
    {
        require $root.'/'.str_replace('\\','/',$class).'.php';
    }
});
$router = new core\Router();

$router->add('',['controller'=>'user','action'=>'login']);
$router->add('{controller}/{action}');
$router->add('{controller}/');
$router->add('{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}',['namespace'=>'admin']);
$router->add('admin/{controller}/{id:\d+}/{action}',['namespace'=>'admin']);
$router->add('{controller}/{action}/{url}');

 $url = $_SERVER['QUERY_STRING'];
if($router->match($url))
{
    echo "<pre>";
     var_dump($router->getparams());
     echo "</pre>";
    
}
else{
    echo "No Route Found";
}

//echo htmlspecialchars(print_r($router->getRoutes(),true));

$router->dispatch($_SERVER['QUERY_STRING']);

?>