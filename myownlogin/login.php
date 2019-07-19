<?php
session_start();
$error="";
$success="";
if(isset($_POST['submit'])){

    include ('connection.php');
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error="Please enter all field";
    }
    else{
        $username=$_POST['username'];
        $password=$_POST['password'];

        $username=mysqli_escape_string($conn,filter_var(strip_tags($_POST['username']),FILTER_SANITIZE_STRIPPED));
        $password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));



        $result=mysqli_query($conn,"select * from users where username='$username' and password='$password'") or die("Can not connect to DB");
        $row=mysqli_fetch_array($result);
        if($row['Username']==$username && $row['Password']==$password){
            echo "<script> location.href='welcome.php'; </script>";
        }
        else{
            $error="Invalid credentials";
        }
    }


}




?>
























<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="bootstrap/js/bootstrap.js">
    <link href="bootstrap/fonts">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<style>
    body{
        background-image: url("designbig.jpg");
        color: white;
    }

    form{
        padding: 20px;
        margin-top: 40px;
    }
    #formDiv{
        border:2px solid gray;
        margin-top: 50px;
        padding: 10px;

    }
</style>

<div class="container">
    <div class="col-lg-5 col-lg-offset-4" id="formDiv">
        <p class="text-center"><img id="image" src="web.png" width="350" height="80" ></p>
        <h1 align="center" style="color:#3c3c3c; border:1px solid lightgray;  margin-top: 40px;">LOGIN FORM</h1>
        <form action="login.php" method="post">
            <input class="form-control" type="text" name="username" placeholder="Username"><br>
            <input class="form-control" type="password" name="password" placeholder="Password"><br>
            <p class="text-center"><span class="text" style="color:dodgerblue;"><?php if(isset($success)) {echo $success;}?></span>
                <span class="text" style="color: crimson;"><?php if(isset($error)){ echo $error ;}?></span></p>
            <p class="text-center"><input class="btn btn-group-lg btn-danger" type="submit" name="submit" value="Login"><br><br>
                <a href="index.php" title="register simply then" style="color: black;" id="register">New User?Register here!</a><br>
            </p>
            <br>
        </form>

    </div>
</div>







</body>
</html>