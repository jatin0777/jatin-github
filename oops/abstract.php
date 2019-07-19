<?php


abstract class base{

    public function demo(){
        echo "hello jatin";
    }

    //abstract function demo1();


}

class child extends base {

    /*function demo1()
    {
     echo "hi sankit";
        // TODO: Implement demo1() method.
    }*/

}

$obj=new child();
$obj->demo();







?>