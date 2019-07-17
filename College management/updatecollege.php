<?php
require_once 'core/init.php';
require 'header.php';

$user=new User();
$data=new Database();

if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}


if(Input::exists()){
    if (Token::check(Input::get('token'))){
        $clg_id=$_GET['clg_id'];
        $clg_name=Input::get('clg_name');
        $clg_location=Input::get('clg_location');
        $clg_contact=Input::get('clg_contact');


        if($clg_name=='' || $clg_location=='' || $clg_contact=='') {
            echo "<script>alertify.error('Please enter all details of college',3);</script>";
        }
        else{

            try{
                $user->updateClg(array(
                    'clg_name'=>Input::get('clg_name'),
                    'clg_location'=>Input::get('clg_location'),
                    'clg_contact'=>Input::get('clg_contact')
                ),$clg_id);

                Session::flash('home',"<script>alertify.notify('College Updated Successfully','success',3);</script>");
                Redirect::to('index.php');


            }catch (Exception $e){
                die($e->getMessage());
            }
        }
    }
}

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
                    <h4><a href="profile.php?user=<?php  echo escape($user->data()->name) ?>"><?php  echo escape($user->data()->name) ?></a></h4>
                </div>
            </div>
        </div>
        <div class="navbar-collapse collapse" id="navComp">
            <ul class="nav navbar-nav pull-right">

                <li class="active"><a href="#" style="color:aquamarine;"><?php echo $_GET['clg_name'] ?></a></li>
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
                    <h2>UPDATE COLLEGE</h2>
                </div>
                <div class="panel-body text-center">
                    <form action="" method="post">
                        <label for="clg_name">COLLEGE NAME</label>
                        <input class="form-control" name="clg_name" type="text" id="clg_name" placeholder="College Name" value="<?php echo escape(Input::get('clg_name')); ?>"><br>
                        <label for="clg_location">COLLEGE LOCATION</label>
                        <input class="form-control" name="clg_location" type="text" id="clg_location" placeholder="College Location" value="<?php echo escape(Input::get('clg_location')); ?>"><br>
                        <label for="clg_contact">COLLEGE CONTACT</label>
                        <input class="form-control" name="clg_contact" type="text" id="clg_contact" placeholder="College Contact" value="<?php echo escape(Input::get('clg_contact'))?>"><br>
                        <input class="btn btn-info" type="submit" name="submit" value="Update">
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
