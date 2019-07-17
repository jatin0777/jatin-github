<?php
require_once 'core/init.php';
require 'header.php';
include 'classes/dnd.php';
include 'classes/Database.php';

$user=new User();
$data=new Database();
$clg_id=$_GET['clg_id'];
$clg_name=$_GET['clg_name'];
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}


if(Input::exists()){
    if (Token::check(Input::get('token'))){
        $emp_id=$_GET['emp_id'];
        $emp_name=Input::get('emp_name');
        $emp_email=Input::get('emp_email');
        $emp_contact=Input::get('emp_contact');
        $emp_department=Input::get('emp_department');
        $pattern='/^[\w._-]+[+]?[\w._-]+@[\w.-]+\.[a-zA-Z]{2,6}$/';

        if($emp_name=='' || $emp_email=='' || $emp_contact=='' || $emp_department=='') {
            echo "<script>alertify.error('Please enter all details of college',3);</script>";
        }elseif(!preg_match($pattern, $emp_email)) {
            echo "<script>alertify.error('Provide valid email',3);</script>";
        }
        else{

            try{
                $user->updateEmp(array(
                    'emp_name'=>Input::get('emp_name'),
                    'emp_email'=>Input::get('emp_email'),
                    'emp_contact'=>Input::get('emp_contact'),
                    'emp_department'=>Input::get('emp_department')
                ),$emp_id);

                Session::flash('staff',"<script>alertify.notify('Employee Updated Successfully','success',3);</script>");
                Redirect::to("staff.php?clg_id=$clg_id&clg_name=$clg_name");


            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    }
}

?>



<body background="designbig.jpg">
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
                    <h4><a href="profile.php?user=<?php  echo escape($user->data()->name) ?>"><?php  echo escape($user->data()->name) ?></a></h4>
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

<div class="container">
    <div class="row" style="margin-top: 60px;">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h2>UPDATE STAFF</h2>
                </div>
                <div class="panel-body text-center">
                    <form action="" method="post">
                        <input class="form-control" name="emp_name" type="text" id="emp_name" placeholder="Name" value="<?php echo escape(Input::get('emp_name')); ?>"><br>
                        <input class="form-control" name="emp_email" type="email" id="emp_email" placeholder="Email" value="<?php echo escape(Input::get('emp_email')); ?>"><br>
                        <input class="form-control" name="emp_contact" type="text" id="emp_contact" placeholder="Contact" value="<?php echo escape(Input::get('emp_contact'))?>"><br>
                        <input class="form-control" name="emp_department" type="text" id="emp_department" placeholder="Department" value="<?php echo escape(Input::get('emp_department')); ?>"><br>
                        <input class="btn btn-info" type="submit" name="submit" value="Update">
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
