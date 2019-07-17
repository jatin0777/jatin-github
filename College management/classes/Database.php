<?php

class Database{
    public $con;

    public function __construct()
    {
        $this->con=mysqli_connect("localhost","root","","jlogin");

        if(!$this->con){
            echo 'database connect error';
        }
    }


    public function select($table){
        $array=array();
        $query="SELECT * FROM college";
        $result=mysqli_query($this->con,$query);
        while ($row=mysqli_fetch_assoc($result)){
            $array[]=$row;
        }
        return $array;
    }


    public function selectStaff($table){
        $array=array();
        $query="SELECT * FROM staff";
        $result=mysqli_query($this->con,$query);
        while ($row=mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }









    public function select_where($table_name, $where_condition)
    {
        $condition = '';
        $array = array();
        foreach($where_condition as $key => $value)
        {
            $condition .= $key . " = '".$value."' AND ";
        }
        $condition = substr($condition, 0, -5);
        $query = "SELECT * FROM college WHERE " . $condition;
        $result = mysqli_query($this->con, $query);
        while($row = mysqli_fetch_array($result))
        {
            $array[] = $row;
        }
        return $array;
    }
    public function update($table_name, $fields, $where_condition)
    {
        $query = '';
        $condition = '';
        foreach($fields as $key => $value)
        {
            $query .= $key . "='".$value."', ";
        }
        $query = substr($query, 0, -2);
        /*This code will convert array to string like this-
        input - array(
             'key1'     =>     'value1',
             'key2'     =>     'value2'
        )
        output = key1 = 'value1', key2 = 'value2'*/
        foreach($where_condition as $key => $value)
        {
            $condition .= $key . "='".$value."' AND ";
        }
        $condition = substr($condition, 0, -5);
        /*This code will convert array to string like this-
        input - array(
             'id'     =>     '5'
        )
        output = id = '5'*/
        $query = "UPDATE college SET ".$query." WHERE ".$condition;
        if(mysqli_query($this->con, $query))
        {
            return true;
        }
    }













}