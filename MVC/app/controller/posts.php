<?php
namespace app\controller;
use \Core\view;
use \app\model\post;
use \app\model\addPost;

class Posts extends \core\Controller
{
    public function indexaction()
    {
        $posts = Post::getAll();
        view::renderTemplate('posts/index.html',['posts'=>$posts]);
    }

    public function addNewaction()
    {
        view::renderTemplate('addPost/index.html');
    }

    public function addPost()
    {
        AddPost::addPost($_POST);
    }

    public function editaction()
    {
    $posts = addPost::editPost($this->route_params['id']);
    view::renderTemplate('addPost/index.html',['edit'=>'edit','posts'=>$posts]);
    }

    public function updatePost()
    {
        addPost::updatepost($this->route_params['id']);
    }

    public function delete()
    {
        addPost::deletepost($this->route_params['id']);
    }
}
?>