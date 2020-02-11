<?php

namespace app\controller;
use \Core\view;
class Posts extends \core\Controller
{
    public function indexaction()
    {
        echo "Hello from the index action in the post controller!";
        view::renderTemplate('posts/index.html');
        //echo "<p>Query String Parameters:<pre>".
        //htmlspecialchars(print_r($this->route_params,true))."</pre></p>";
    }

    public function addNewaction()
    {
        echo "Hello from the addNew action in the post controller!";
    }

    public function editaction()
    {
        echo "Hello from the index action in the post controller!";
        echo "<p>Query String Parameters:<pre>".
        htmlspecialchars(print_r($this->route_params,true))."</pre></p>";
    }
}
?>