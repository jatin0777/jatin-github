<?php
require_once 'core/init.php';
require 'header.php';
$user=new User();


if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}


if(Input::exists()){
    if (Token::check(Input::get('token'))){
        $name=Input::get('name');
        $password=Input::get('password');

        if ($name=='' || $password=''){
            echo "<script>alertify.error('Please enter details',3)</script>";
        }


            try{
                $user->update(array(
                   'name'=>Input::get('name'),
                ));

                Session::flash('home','Your profile has been updated');
                Redirect::to('index.php');


            }catch (Exception $e){
                die($e->getMessage());
            }
    }
}
?>
<div class="col-lg-6 col-lg-offset-3" style="margin-top: 80px;">



    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            <h2>SETTINGS</h2>
        </div>
        <div class="panel-body">
            <form action="" method="post">
                <div class="field">
                    <label for="name">Update Profile Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="<?php echo escape(Input::get('name')); ?>" autocomplete="off" placeholder="Profile Name"><br>

                </div>
        </div>
                <div class="panel-footer">
                    <input class="btn btn-primary" type="submit" name="submit" value="Update">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                </div>

            </form>

    </div>
</div>