<?php

// require_once '../core/router.php';
// require_once '../app/controller/posts.php';
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

$router->add('',['controller'=>'Home','action'=>'index']);
//$router->add('posts',['controller'=>'Posts','action'=>'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}',['namespace'=>'admin']);
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