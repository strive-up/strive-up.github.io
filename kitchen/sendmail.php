<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom('reloadanta@yandex.ru', 'Расчет стоимости - '.$_POST['name'].'');
    $mail->addAddress('reloadanta@yandex.ru');
    $mail->Subject = 'Расчет стоимости - '.$_POST['name'].'';

    $hand = "Правая";
    if($_POST['hand'] == "left"){
        $hand = "Левая";
    }

    if(trim(!empty($_POST['name']))){
        $body.='<br>Имя: '.$_POST['name'].'';
    }

    if(trim(!empty($_POST['number']))){
        $body.='<br>Телефон: '.$_POST['number'].'';
    }

    if(trim(!empty($_POST['style']))){
        $body.='<br>Стиль: '.$_POST['style'].'';
    }

    if(trim(!empty($_POST['fasad']))){
        $body.='<br>Фасад: '.$_POST['fasad'].'';
    }

    if(trim(!empty($_POST['location']))){
        $body.='<br>Вариант расположения: '.$_POST['location'].'';
    }

    if(trim(!empty($_POST['price']))){
        $body.='<br>Ценовой сегмент: '.$_POST['price'].'';
    }

    if(trim(!empty($_POST['gift']))){
        $body.='<br>Подарок: '.$_POST['gift'].'';
    }

    $mail->Body = $body;

    if(!$mail->send()){
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены';
    }
    
    $response = ['message', $message];

    header('Content-type: application/json');
    echo json_encode($response);

?>