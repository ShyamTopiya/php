<?php
namespace core;

use Core\Controller;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function add($route,$params = [])
    {
        $route = preg_replace('/\//','\\/',$route);
        $route = preg_replace('/\{([a-z]+)\}/','(?P<\1>[a-z-]+)',$route);
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)',$route);
        $route = '/^'.$route.'$/i';
        $this->routes[$route] = $params;
    }
    public function getRoutes()
    {
        return $this->routes;
    }
    public function match($url)
    {
        foreach($this->routes as $route=>$params)
        {
            if(preg_match($route,$url,$matches))
            {
                foreach($matches as $key=>$match)
            {
                if(is_string($key))
                {
                    $params[$key] = $match;
                }
            }
            $this->params = $params;
            if(!isset($this->params['action']))
            {
                $this->params['action'] = 'index';
            }
                return true;
            }   
            }
            return false;
        }
        
    public function getparams()
    {
        return $this->params;
    }
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariable($url);

        if($this->match($url))
        {
           
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            //$controller = "app\controller\\$controller";
            $controller = $this->getNamespace().$controller;

            if(class_exists($controller))
            {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if(is_callable([$controller_object,$action]))
                {
                    $controller_object->$action();
                }else{
                    echo "Method $action (in controller $controller) not Found";
                }
            }else{
                echo "Controller Class $controller not found";
            }
        }else{
            echo "No Route matched";
        }
    }


    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ','',ucwords(str_replace('-',' ',$string)));
    }

    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    protected function removeQueryStringVariable($url)
    {
        if($url != '')
        {
            $parts = explode('&',$url,2);
            if(strpos($parts[0], '=') === FALSE)
            {
                $url = $parts[0];
            }
            else{
                $url = '';
            }
        }
        return $url;
    }

    protected function getNamespace()
    {
        $namespace = 'app\controller\\';
        if(array_key_exists('namespace',$this->params))
        {
            $namespace.=$this->params['namespace'].'\\';
        }
        return $namespace; 
    }
}
?>