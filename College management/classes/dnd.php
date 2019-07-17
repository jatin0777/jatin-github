<?php
try{
    $connection= new PDO('mysql:host=localhost;dbname=jlogin','root','');
    //echo'connection succes..';
}
catch(PDOException $e){

}
?>