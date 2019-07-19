<?php



class AC
{
    protected $model;
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

    function getModel(){
        return $this->model;
    }



}

class SmartAc extends AC {

}


$jatin=new AC('voltas',17);
echo $jatin->speed;
echo $jatin->getModel();


$sankit=new SmartAc('samsung',19);
echo $sankit->getModel();



?>