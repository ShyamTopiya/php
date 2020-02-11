<?php
namespace app\controller;
use \Core\view;
class Home extends \core\Controller
{
    // protected function before()
    // {
    //     echo "(before)";
    //   //  return false;
    // }
    // protected function after()
    // {
    //     echo "(after)";
    // }
    public function indexaction() 
    {
       // echo "Hello from the index action in the home controller!";
        view::renderTemplate('home/index.html',[
            'name'=>'shyam',
            'hobby'=>['gaming','traveling','coding']
        ]);

    }
}
?>