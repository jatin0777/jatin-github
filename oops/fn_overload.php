<?php


class test{

    function __construct()
    {
        echo"Implement fn overloading<br>";
    }

    function __call($name, $arguments)
    {
        $count=count($arguments);

        if($name=='overload'){

            switch ($count){

                case '1':
                    echo "one argument<br>";
                    break;

                    case '2':
                    echo "two argument<br>";
                    break;

                    case '3':
                    echo "three argument<br>";
                    break;

                default:
                    echo "wrong no. of arguments";
                    break;

            }


        }


        // TODO: Implement __call() method.
    }


}

$obj=new test();
$obj->overload('jatin');
$obj->overload('jatin',2);
$obj->overload('jatin',3,'pandita',4);














?>