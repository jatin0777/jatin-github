<?php



class logger{
    public function log($message){
        echo "logging message:$message";
    }
}


class userinfo{

    private $logger;
    public function user(){

        $this->logger->log("user created<br>");
    }


    public function update(){
        $this->logger->log("user updated");
    }

    public function __construct()
    {
        $this->logger=new logger();
    }
}
$jatin=new userinfo();
$jatin->user();
$jatin->update();




?>

