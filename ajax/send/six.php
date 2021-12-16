<?php

if(empty($_POST)) {
	die;
}

require($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php');

date_default_timezone_set('Europe/Moscow');

$email = htmlspecialchars($_POST['email']);
$name = htmlspecialchars($_POST['name']);
$mess = htmlspecialchars($_POST['mess']);

CModule::IncludeModule('iblock');

$el = new CIBlockElement;

$arLoadProductArray = Array(
  "MODIFIED_BY"    => 1,
  "IBLOCK_SECTION_ID" => false,
  "IBLOCK_ID"      => 23,
  "NAME"           => "Новое письмо эксперту (генеральному директору) - " . date("Y-m-d H:i:s"),
  "ACTIVE"         => "N", 
  "DETAIL_TEXT"    => '<p><b>Имя:</b> ' . $name . '</p>
<p><b>E-mail:</b> ' . $email . '</p>
<p><b>Сообщение:</b> ' . $mess . '</p>
<p><b>Заявка со страницы:</b> ' . $_SERVER['HTTP_REFERER']  . '</p>
<p><b>IP отправителя:</b> ' . $_SERVER['REMOTE_ADDR'] . '</p>
<p><b>Отправлено:</b> ' . date("d/m/Y h:i", time())  . '</p>
'
  ); 

$PRODUCT_ID = $el->Add($arLoadProductArray);

$to = "mail@seitn.ru";

$subject = "Новое письмо эксперту (генеральному директору) - " . date("Y-m-d H:i:s");

$message = '
<html>
<head>
 <title>Новое письмо эксперту (генеральному директору) - ' . date("Y-m-d H:i:s") . '</title>
</head>
<body>
<p>Новое письмо эксперту (генеральному директору) - ' . date("Y-m-d H:i:s") . '</p>

<p><b>Имя:</b> ' . $name . '</p>
<p><b>E-mail:</b> ' . $email . '</p>
<p><b>Сообщение:</b> ' . $mess . '</p>
<p><b>Заявка со страницы:</b> ' . $_SERVER['HTTP_REFERER']  . '</p>

<hr>

<p><b>IP отправителя:</b> ' . $_SERVER['REMOTE_ADDR'] . '</p>
<p><b>Отправлено:</b> ' . date("d/m/Y h:i", time())  . '</p>
</body>
</html>
';

$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

$headers .= "From: SEITN.RU <dontreply@seitn.ru>\r\n";

mail($to, $subject, $message, $headers);
	
?>