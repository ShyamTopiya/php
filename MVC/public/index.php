<?php

require_once '../core/router.php';
echo "<pre>";
$router = new Router();

$router->add('',['controller'=>'Home','action'=>'index']);
$router->add('posts',['controller'=>'Posts','action'=>'index']);
$router->add('{controller}/{action}');
$router->add('{conroller}/{id:\d+}/{action}');
$url = $_SERVER['QUERY_STRING'];
if($router->match($url))
{
    
    var_dump($router->getparams());
    
}
else{
    echo "No Route Found";
}

echo htmlspecialchars(print_r($router->getRoutes(),true));
?>