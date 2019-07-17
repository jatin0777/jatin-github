<?php
require_once 'core/init.php';
require 'classes/dnd.php';
$clg_id=$_GET['clg_id'];

$sql = "delete from college where clg_id=:clg_id; 
SET @autoid:=0;
UPDATE college SET clg_id=@autoid:=(@autoid+1);
ALTER TABLE college AUTO_INCREMENT=1;";

$statement = $connection->prepare($sql);
if ($statement->execute([':clg_id' => $clg_id])) {
    $clg_id = $_GET['clg_id'];
    Session::flash('home',"<script>alertify.notify('Deleted Successfully','success',3);</script>");
    Redirect::to('index.php');
}
