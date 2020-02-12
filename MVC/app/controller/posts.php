<?php

namespace app\controller;
use \Core\view;
use app\model\post;

class Posts extends \core\Controller
{
    public function indexaction()
    {
        $posts = Post::getAll();
        echo "Hello from the index action in the post controller!";
        view::renderTemplate('posts/index.html',['posts'=>$posts]);
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