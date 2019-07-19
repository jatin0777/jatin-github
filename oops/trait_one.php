<?php




class abc{
    function test(){
        echo "function of abc class";
    }
}

trait t1{
    function test(){
        echo"function of trait";
    }
}
class demo extends abc{
    use t1;
    function test(){
        echo"function of demo class";
    }
}

$obj=new demo();
$obj->test();

?>