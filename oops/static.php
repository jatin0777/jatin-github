<?php


class irctc{


    public static $count=0;

    static function getCount(){
       return self::$count;
    }

    function __construct()
    {
        self::$count++;
    }

}
class xyz extends irctc {

    static  function getCount()
    {
        return parent::getCount(); // TODO: Change the autogenerated stub
    }
}

$obj=new xyz();
$obj1=new xyz();
$obj2=new xyz();
echo xyz::getCount();



?>