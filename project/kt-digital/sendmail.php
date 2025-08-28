<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
/* 
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'PHPMailer/language/phpmailer.lang-ru.php');
$mail->IsHTML(true); */

// От кого
/* $mail->setFrom('ауцкыу', 'уцкуцк'); */

// Кому
/* ;mail->addAddres('admin@kt-digital.ru'); */

// Тема
/* $mail->Subject = 'Квиз'; */

// Обработчик
/* $hand = "Правая";
if($_POST['hand'] == "left"){
    $hand = "Левая";
} */

// Письмо

/* $body = 'Текст письма'; */

// Отправляем

/* $mail->Body = $body;

if(!$mail->send()){
    $message = 'Ошибка';
} else {
    $message = "Данные отправлены!"
}

$response = ['message' = $message];

header('Content-type: application/json');
echo json_encode($response); */

$mail             = new PHPMailer(); // defaults to using php "mail()"
$body             = "body"
$body             = eregi_replace("[\]",'',$body);

$mail->AddReplyTo("name@yourdomain.com","First Last");
$mail->SetFrom('name@yourdomain.com', 'First Last');
$mail->AddReplyTo("name@yourdomain.com","First Last");

$address = "admin@kt-digital.ru";
$mail->AddAddress($address, "John Doe");

$mail->Subject    = "PHPMailer Test Subject via mail(), basic";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);


if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>

