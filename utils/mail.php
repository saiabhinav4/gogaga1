<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function triggerMail($to,$subject,$msg){
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nature.test.email@gmail.com';
    $mail->Password = 'tgxhyepentwbkchh';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->SetFrom('nature.test.email@gmail.com');
    $mail->AddAddress($to);
    $mail->IsHTML(true);
    $mail->Subject =  $subject;
    $mail->Body = $msg;
    // $mail->SMTPDebug = 2;

    if(!$mail->send()){
        echo $mail->ErrorInfo;
        return false;
    }
    return true;
}


?>