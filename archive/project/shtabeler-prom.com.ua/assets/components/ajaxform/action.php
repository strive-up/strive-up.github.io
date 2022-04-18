<?
$names = $_REQUEST['name'];
$tels = $_REQUEST['phone'];
$mails = $_REQUEST['email'];
$forma = $_REQUEST['form_name'];

$text = 'Имя: <b>'.$names.'</b>
Телефон: <b>'.$tels.'</b>
Email: <b>'.$mails.'</b>
Сообщение: <b>'.$poshels.'</b>
Название формы: <b>'.$forma.'</b>';
$token = '2043248253:AAFe6tus6hPNm0zuM3C3R9c6hnIko6beCyo'; // telegram token
$my_arr = array(1940635350);//айди кому отправить
   
foreach ($my_arr as $value) {
    $data = [
    'chat_id' => $value,
    'text' => $text,
	'parse_mode' => 'html'
];
$resp = file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?" . http_build_query($data) );
  }
