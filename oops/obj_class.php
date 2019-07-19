<?php



class AC
{
    public $model;
    public $speed;


    function speedUp(){
       echo $this->speed+1;
    }

    function speedDown(){
        echo $this->speed-1;
    }

    function __construct($model,$speed)
    {
        $this->model=$model;
        $this->speed=$speed;
    }

    function Display(){
       return $this->model;
    }

    function Display1(){
        return $this->Display();
    }
}

class SmartAc extends AC {


    public $wifi="available";


 //   function __construct()
  //  {
      //  parent::__construct('samsung',19);
   // }

    function Smart_ac1(){
       return $this->Display1();
    }
}

$jatin=new AC('voltas',16);
echo $jatin->model;
echo $jatin->Display1();
echo $jatin->speed."<br>";

$sankit=new SmartAc('samsung',20);
echo $sankit->model;
echo $sankit->speed." ";
echo $sankit->wifi;
echo $sankit->Smart_ac1();






?>