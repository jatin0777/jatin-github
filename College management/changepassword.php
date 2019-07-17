<?php

require_once 'core/init.php';

$user=new User();

if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

if(Input::exists()){
    if (Token::check(Input::get('token'))){
        $validate=new Validate();
        $validation=$validate->check($_POST,array(
            'curr_pass'=>array(
                'required'=>true,
                'min'=>6,
                'max'=>30
            ),
            'password_new'=>array(
                'required'=> true,
                'min'=>6,
                'max'=>30
            ),
            'password_new_again'=>array(
                'required'=>true,
                'min'=>6,
                'matches'=>'password_new'
            )
        ));

        if($validation->passed()){
            if (Hash::make(Input::get('curr_pass'),$user->data()->salt) !== $user->data()->password){
                echo "OOPS! Your current password is wrong<br>";
            }
            else{
                $salt=Hash::salt(32);
                $user->update(array(
                   'password'=>Hash::make(Input::get('password_new'),$salt),
                    'salt'=>$salt
                ));

                Session::flash('home','Your password has been changed successfully');
                Redirect::to('index.php');
            }
        }else{
            foreach ($validation->errors() as $error){
                echo $error.'<br>';
            }
        }


    }
}

?>

<form action="" method="post">

    <div class="field">
        <label for="curr_pass">Current Password</label>
        <input type="text" name="curr_pass" id="curr_pass">
    </div>

    <div class="field">
        <label for="password_new">New Password</label>
        <input type="password" name="password_new" id="password_new">
    </div>
    <div class="field">
        <label for="password_new_again">Confirm Password</label>
        <input type="password" name="password_new_again" id="password_new_again">
    </div>

    <input type="submit" name="change" value="Change">
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">


</form>
