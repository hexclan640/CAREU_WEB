<?php

class Controller{

    public function model($model){
        require_once '../app/models/'.$model.'.php';
        return new $model();
    }

    public function view($view,$data =[]){
        if(file_exists('../app/views/pages/'.$view.'.php')){
            require_once '../app/views/pages/'.$view.'.php';
        }else{
            die("View does not exists.");
        }
    }

    public function PHPMailer(){
        require_once '../app/PHPMailer/PHPMailerAutoload.php';
		require_once '../app/PHPMailer/class.phpmailer.php';
		require_once '../app/PHPMailer/class.smtp.php';
    }

    public function dompdf(){
        require_once '../app/vendor/autoload.php';
    }
}
?>