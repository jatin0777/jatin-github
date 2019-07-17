<?php
require_once 'core/init.php';
require 'header.php';
include 'classes/Database.php';
include 'classes/dnd.php';



if(Input::exists()){
    if (Token::check(Input::get('token'))){

        $name=Input::get('name');
        $email=Input::get('email');
        $contact=Input::get('contact');
        $password=Input::get('password');
        $re_pass=Input::get('re_pass');
        $pattern='/^[\w._-]+[+]?[\w._-]+@[\w.-]+\.[a-zA-Z]{2,6}$/';
        $sql = "SELECT email FROM users WHERE email = :email";
        $statement = $connection->prepare($sql);
        $statement->execute(
            array(
                'email'     =>     $_POST['email']
            ));
        $count = $statement->rowCount();
        if($count > 0) {
            echo "<script>alertify.error('Email already exist',3);</script>";
        }elseif ($name==''){
            echo "<script>alertify.error('Please enter name',3);</script>";
        }elseif ($email==''){
            echo "<script>alertify.error('Please enter valid email',3);</script>";
        }elseif ($contact==''){
            echo "<script>alertify.error('Please enter contact no.',3);</script>";
        }elseif (strlen($contact) < 10 || strlen($contact)>10){
            echo "<script>alertify.error('Please enter valid phone no.',3);</script>";
        }elseif ($password==''){
            echo "<script>alertify.error('Please enter password',3);</script>";
        }elseif (strlen($password) < 4){
            echo "<script>alertify.error('Password length must be greater than 4',3);</script>";
        }
        elseif ($re_pass!=$password){
            echo "<script>alertify.error('Password do not match',3);</script>";
        }elseif(!preg_match($pattern, $email)) {
            echo "<script>alertify.error('Provide valid email',3);</script>";
        }
        else{
            $user=new User();
            $salt=Hash::salt(32);

            try{
                $user->create(array(
                    'email'=>Input::get('email'),
                    'contact'=>Input::get('contact'),
                    'password'=>Hash::make(Input::get('password'),$salt),
                    'salt'=>$salt,
                    'name'=>Input::get('name'),
                    'joined'=>date('Y-m-d H:i:s'),
                    'group'=>1
                ));
                Session::flash('login',"<script>alertify.notify('Registered Successfully','success',3);</script>");
                Redirect::to('login.php');

            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }
}

?>

<body background="designbig.jpg">


<div class="container">
    <a href="index.php" style="margin-top: 10px;" class="btn btn-info">Back to homepage</a>
    <div class="row" style="margin-top: 60px;">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-danger">
                <div class="panel-heading text-center">
                    <h2>REGISTER</h2>
                </div>
                <div class="panel-body text-center">
                    <form action="" method="post">
                        <input class="form-control" type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>" placeholder="Name">
                        <br>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>" placeholder="Email">
                        <br>
                        <input class="form-control" type="text" name="contact" id="contact" placeholder="Contact No." value="<?php echo escape(Input::get('contact')); ?>">
                        <br>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                        <br>
                        <input class="form-control" type="password" name="re_pass" id="re_pass" placeholder="Confirm Password">
                        <br>
                        <input class="btn btn-primary" type="submit" name="submit" value="Register"><br><br>
                        <a href="login.php">Already have an account? Login here</a>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>







