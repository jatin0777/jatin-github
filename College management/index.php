<?php
require_once 'core/init.php';





$user=new User();
if($user->isLoggedIn()){
    $data=new Database();
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
                        <h4>Welcome <a href="profile.php?user=<?php  echo escape($user->data()->name) ?>"><?php  echo escape($user->data()->name) ?></a></h4>
                    </div>
                </div>
            </div>
            <div class="navbar-collapse collapse" id="navComp">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="update.php" style="color:white;">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--navbar ends-->

    <?php
    if(Session::exists('home')){
        echo'<p>'.Session::flash('home').'</p>';
    }

    if($user->hasPermission('admin')){
        echo "<h3>Hello admin!</h3>";
    }






    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                            <h3>College List</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-8">
                                <input type="search" name="search" id="search" class="form-control" placeholder="Search College Name Here">
                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="addcollege.php"><button class="btn btn-info">Add College</button></a>
                            </div>
                            <div  class="col-lg-12">
                                <br>
                                <table class="table table-bordered result" id="employee_table" >
                                    <tr>
                                        <td class="bg-info text-center">Id</td>
                                        <td class="bg-info text-center">College Name</td>
                                        <td class="bg-info text-center">Contact</td>
                                        <td class="bg-info text-center">Location</td>
                                        <td class="bg-info text-center">Action</td>
                                    </tr>

                                        <?php
                                        $post_data=$data->select('college');
                                        foreach ($post_data as $post){?>
                                            <tr>

                                                <td class="text-center"><?php echo $post["clg_id"] ?></td>
                                                <td class="text-center"><?php echo $post["clg_name"] ?></td>
                                                <td class="text-center"><?php echo $post["clg_contact"] ?></td>
                                                <td class="text-center"><?php echo $post["clg_location"] ?></td>
                                                <td class="text-center">
                                                    <a href="updatecollege.php?clg_id=<?php echo $post["clg_id"]?>&clg_name=<?php echo $post['clg_name']?>&clg_location=<?php echo $post['clg_location']?>&clg_contact=<?php echo $post['clg_contact']?>" class="btn btn-danger btn-sm">Edit</a>
                                                    <a href="deletecollege.php?clg_id=<?php echo $post["clg_id"]?>" class="btn btn-danger btn-sm">Delete</a>
                                                    &nbsp;<a href="staff.php?clg_id=<?php echo $post["clg_id"] ?>&clg_name=<?php echo $post["clg_name"] ?>"><button class="btn btn-danger btn-sm">View Staff</button></a>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
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
else{
    require 'header.php';
    echo '
    <body background="designbig.jpg">


<div class="container">
    <div class="row" style="margin-top: 150px;">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h2>ALREADY A USER?</h2>
                </div>
                <div class="panel-body text-center">
                    Please login by clicking on the login button below and enter details to login.
                </div>
                <div class="panel-footer text-center">
                    <a href="login.php"><button class="btn btn-primary">Login</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h2>NEW USER?</h2>
                </div>
                <div class="panel-body text-center">
                    Please register by clicking on the register button below and enter details.
                </div>
                <div class="panel-footer text-center">
                    <a href="register.php"><button class="btn btn-danger">Register</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
    
    ';
}