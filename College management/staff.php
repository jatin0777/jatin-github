<?php
require_once 'core/init.php';
$clg_id=$_GET['clg_id'];
$clg_name=$_GET['clg_name'];

require('classes/dnd.php');
$query = "select 
 	 staff.emp_id, staff.emp_name,
 	 staff.emp_email, staff.emp_department,
 	 staff.emp_contact,
 	 college.clg_name 
 	 from staff 
 	 inner join college 
 	 on staff.clg_id = college.clg_id where staff.clg_id=$clg_id
 	 ";
$statement = $connection->prepare($query);
$statement->execute();
$staff= $statement->fetchAll(PDO::FETCH_OBJ);









$user=new User();
if($user->isLoggedIn()){
    require 'header.php';
    ?>
    <!--navbar-->
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navComp">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="col-md-12 col-md-offset-2 col-sm-12 col-sm-offset-3 col-xs-offset-2">
                    <div class="navbar-brand" style="padding:3.5px; margin-left: -42px;">
                        <h4> <a href="profile.php?user=<?php  echo escape($user->data()->name) ?>"><?php  echo escape($user->data()->name) ?></a></h4>
                    </div>
                </div>
            </div>
            <div class="navbar-collapse collapse" id="navComp">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="setting.php" style="color:white;">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--navbar ends-->

    <?php
    if(Session::exists('staff')){
        echo'<p>'.Session::flash('staff').'</p>';
    }


    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center">
                            <h3>Staff list of <?php echo $clg_name; ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-8">
                                <input type="search" name="search" id="search" class="form-control" placeholder="Search Staff Here">
                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="addstaff.php?clg_id=<?php echo $clg_id ?>&clg_name=<?php echo $clg_name;?>"><button class="btn btn-info">Add Staff</button></a>
                            </div>
                            <div  class="col-lg-12">
                                <br>
                                <table class="table table-bordered" id="employee_table">
                                    <tr>

                                        <td class="bg-info text-center">Emp Id</td>
                                        <td class="bg-info text-center">Name</td>
                                        <td class="bg-info text-center">Email</td>
                                        <td class="bg-info text-center">Department</td>
                                        <td class="bg-info text-center">Contact</td>
                                        <td class="bg-info text-center">Action</td>
                                    </tr>
                                    <?php foreach($staff as $emp): ?>
                                        <tr>

                                            <td class="text-center">#<?=$emp->emp_id?></td>
                                            <td class="text-center"><?=$emp->emp_name?></td>
                                            <td class="text-center"><?= $emp->emp_email?></td>
                                            <td class="text-center"><?= $emp->emp_department?></td>
                                            <td class="text-center"><?= $emp->emp_contact?></td>
                                            <td class="text-center">

                                                <a href="updatestaff.php?clg_id=<?=$clg_id?>&clg_name=<?=$clg_name?>&emp_id=<?php echo $emp->emp_id ?>&emp_name=<?php echo $emp->emp_name ?>&emp_email=<?php echo $emp->emp_email ?>&emp_department=<?php echo $emp->emp_department ?>&emp_contact=<?php echo $emp->emp_contact ?>" class="btn btn-danger btn-sm">Edit</a>
                                                <a href="deletestaff.php?clg_id=<?=$clg_id?>&staff_id=<?php echo $emp->emp_id ?>&clg_name=<?php echo $clg_name; ?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
                search_table($(this).val());
            });
            function search_table(value){
                $('#employee_table tr').each(function(){
                    var found = 'false';
                    $(this).each(function(){
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                        {
                            found = 'true';
                        }
                    });
                    if(found == 'true')
                    {
                        $(this).show();
                    }
                    else
                    {
                        $(this).hide();
                    }
                });
            }
        });
    </script>


    <?php

}