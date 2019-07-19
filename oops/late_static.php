<?php

class dbdemo
{

    protected static $table="demoTable";


public function select()
{

    echo"SELECT * FROM ".static::$table;

}

}


class student extends dbdemo {

    protected static $table="student";

}

class feedback extends dbdemo{

    protected static $table="feedback";
}







$obj=new feedback();
$obj->select();



?>