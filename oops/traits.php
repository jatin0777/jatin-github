<?php



class test{
    public function show(){
        echo "hello jatin";
    }
}



trait t1{
    function test1(){
        echo "hello sankit";
    }
}
trait t2{
    function test2(){
        echo "hello ronaldo";
    }
}

class one extends test {

}
class two extends test{

}
class three extends test{
    use t1,t2;
}

$obj=new three();
$obj->test2();





?>