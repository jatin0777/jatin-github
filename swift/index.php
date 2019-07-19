<?php
$msg='';
if (isset($_POST['submit'])){
    require_once 'vendor/autoload.php';
    require_once 'info.php';

// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
        ->setUsername(EMAIL)
        ->setPassword(PASS)
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom([EMAIL])
        ->setTo([$_POST['email']])
        ->setBody($_POST['message'])
        ->setSubject($_POST['subject'])
    ;

// Send the message
    $result = $mailer->send($message);

    if (!$result){
        $msg="<div class='alert alert-danger text-center'>
something went wrong 
</div>";
    }else{
        $msg="<div class='alert alert-success text-center'>
Mail sent success
</div>";
    }


}

?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div><?= $msg;?></div>
<form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <!-- Form Name -->
        <legend>Form Name</legend>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Add Subject:</label>
            <div class="col-md-4">
                <input id="textinput" name="subject" type="text" placeholder="add subject" class="form-control input-md">
                <span class="help-block">help</span>
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Send To:</label>
            <div class="col-md-4">
                <input type="email" id="textinput" name="email" type="text" placeholder="add recipient email" class="form-control input-md">
                <span class="help-block">help</span>
            </div>
        </div>
        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textarea">Message</label>
            <div class="col-md-4">
                <textarea class="form-control" id="textarea" name="message">default text</textarea>
            </div>
        </div>
        <!-- File Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="filebutton">Attach file</label>
            <div class="col-md-4">
                <input name="file" class="input-file" type="file">
            </div>
        </div>
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">Click to Send Mail</label>
            <div class="col-md-4">
                <button type="submit" name="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </fieldset>
</form>
</body>
</html>