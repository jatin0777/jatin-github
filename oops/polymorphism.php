<?php



interface shape{

    public function calcArea();
}

class rectangle implements shape {

    public $length;
    public $breadth;

    function __construct($l,$b)
    {
        $this->length=$l;
        $this->breadth=$b;
    }

    public function calcArea()
    {
        return $this->length*$this->breadth;
        // TODO: Implement calcArea() method.
    }
}


class circle implements shape {

    public $radius;
    function __construct($r)
    {
        $this->radius=$r;
    }

    public function calcArea()
    {
        return 3.14*$this->radius*$this->radius;
        // TODO: Implement calcArea() method.
    }

}








$obj=new rectangle(54,22);
echo $obj->calcArea()."<br>";

$obj1=new circle(20);
echo $obj1->calcArea();







?>