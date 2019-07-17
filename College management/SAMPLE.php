<?php
session_start();
require'classes/dnd.php';
require('header.php');
$clg_id=$_GET['clg_id'];
$sql= "select * from college where clg_id=:clg_id";
$statement= $connection->prepare($sql);
$statement->execute([':clg_id'=> $clg_id]);
$staff= $statement->fetch(PDO::FETCH_OBJ);

if(isset($_POST['clg_name']) && isset($_POST['clg_location']) && isset($_POST['clg_contact'])){
    //echo 'submitted';
    $clg_name= $_POST['clg_name'];
    $clg_location= $_POST['clg_location'];
    $clg_contact= $_POST['clg_contact'];


    $sql = 'SELECT clg_name FROM college WHERE college_name = :clg_name';
    $statement = $connection->prepare($sql);
    $statement->execute(
        array(
            'clg_name'     =>  $_POST["clg_name"]
        )
    );

    $count = $statement->rowCount();
    if($count > 0)
    {
        echo "<script>alertify.error('name already exist','3')</script>";
    }
    else
    {
        $sql= 'update college set clg_name=:clg_name, clg_location=:clg_location, clg_contact=:clg_contact where clg_id=:clg_id';
        $statement = $connection->prepare($sql);
        //echo $emp_id;
        if ($statement->execute(array(':name'=>$name,':email'=>$email,':phone'=>$phone,':department'=>$department,':designation'=>$designation,':clg_id'=>$clg_id,':empid'=>$emp_id))) {
            # code...
            //echo"details updated";
            header("location:index.php");
        }

    }

}


?>





<div class="container">
    <div class="row" style="margin-top: 60px;">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h2>UPDATE COLLEGE</h2>
                </div>
                <div class="panel-body text-center">
                    <form action="" method="post">
                        <input class="form-control" name="clg_name" type="text" id="clg_name" placeholder="College Name" value="<?php echo escape(Input::get('clg_name')); ?>"><br>
                        <input class="form-control" name="clg_location" type="text" id="clg_location" placeholder="College Location" value="<?php echo escape(Input::get('clg_location')); ?>"><br>
                        <input class="form-control" name="clg_contact" type="text" id="clg_contact" placeholder="College Contact"><br>
                        <input class="btn btn-info" type="submit" name="submit" value="Update">
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

