<?php
require_once 'core/init.php';
require'classes/dnd.php';

$emp_id=$_GET['staff_id'];

$sql= 'delete from staff where emp_id=:emp_id';
$statement= $connection->prepare($sql);
if($statement->execute([':emp_id'=>$emp_id]))
{
    $clg_id=$_GET['clg_id'];
    $clg_name=$_GET['clg_name'];
    Session::flash('staff',"<script>alertify.notify('Employee deleted','success',3);</script>");
    Redirect::to("staff.php?clg_id=$clg_id&clg_name=$clg_name" );
}
