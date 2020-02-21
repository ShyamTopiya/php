<?php

namespace Core;

//use Twig\Cache\NullCache;

class view
{
    public static function render($view,$args = [])
    {
        extract($args,EXTR_SKIP);
        
        $file = "../app/view/$view";
        
        if(is_readable($file))
        {
            require $file;
        }else{
            echo "$file not found";
        }
    }
    public static function renderTemplate($template,$args = [])
    {
        static $twig = null;
        if($twig === null)
        {
            $loader = new \Twig\Loader\FilesystemLoader('../app/view');

            $twig = new \Twig\Environment($loader);
            $twig -> addGlobal('session',$_SESSION);
        }
        
            echo $twig->render($template,$args);
        
    }
}

?>