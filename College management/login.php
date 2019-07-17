<?php

require_once 'core/init.php';
require 'header.php';
$message='';
if(Input::exists()){
    if(Token::check(Input::get('token'))){


        $user=new User();

        if($user){
            $user= new User();
            $remember=(Input::get('remember')=== 'on')? true:false;
            $login= $user->Login(Input::get('email'),Input::get('password'),$remember);
            if($login){
                Redirect::to('index.php');
            }elseif (Input::get('email')==''){
                echo "<script>alertify.error('Please enter Email id',3);</script>";
            }
            elseif (Input::get('password')==''){
                echo "<script>alertify.error('Please enter password',3);</script>";
            }
            else{
                echo "<script>alertify.error('Wrong credentials,please check',3);</script>";
            }


        }
    }
}

if(Session::exists('login')){
    echo'<p>'.Session::flash('login').'</p>';
}

?>


<body background="designbig.jpg">

<div class="container">
    <a href="index.php" style="margin-top: 10px;" class="btn btn-info">Back to homepage</a>
    <div class="row" style="margin-top: 60px;">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h2>LOGIN</h2>
                </div>
                <div class="panel-body text-center">
                    <form action="" method="post">
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo escape(Input::get('email')); ?>" autocomplete="off" placeholder="Email"><br>
                        <input class="form-control" type="password" name="password" id="password" autocomplete="off" placeholder="Password">
                        <br>
                        <label for="remember"><input type="checkbox" name="remember" id="remember">remember me!</label><br><br>
                        <input class="btn btn-primary" type="submit" name="submit" id="login" value="Login"><br><br>
                        <a href="register.php">Don't have an account? Register here</a>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

