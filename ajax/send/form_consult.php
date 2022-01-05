<?php
if(empty($_REQUEST)) { die; }

require($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php');

date_default_timezone_set('Europe/Moscow');

$tel = htmlspecialchars($_POST['phone']);
$name = htmlspecialchars($_POST['name']);
$page_url= htmlspecialchars($_POST['page_url']);

CModule::IncludeModule('iblock');

$el = new CIBlockElement;

$PROP = array();
$PROP[18] = $tel;
$PROP[19] = $name;

$arLoadProductArray = Array(
    "MODIFIED_BY"    => 1,
    "IBLOCK_SECTION_ID" => false,
    "IBLOCK_ID"      => 4,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Новая заявка на бесплатную консультацию - " . date("Y-m-d H:i:s"),
    "ACTIVE"         => "N",
    "DETAIL_TEXT"    => ""
);

$PRODUCT_ID = $el->Add($arLoadProductArray);

//$to = "mail@seitn.ru";
$to = "aitwork@yandex.ru";

$subject = "Новая заявка на бесплатную консультацию - " . date("Y-m-d H:i:s");

$message = '
<html>
<head>
 <title>Новая заявка на бесплатную консультацию - ' . date("Y-m-d H:i:s") . '</title>
</head>
<body>
<p>Новая заявка на бесплатную консультацию - ' . date("Y-m-d H:i:s") . '</p>

<p><b>Имя:</b> ' . $name . '</p>
<p><b>Телефон:</b> ' . $tel . '</p>
<p><b>Заявка со страницы:</b> ' . $page_url  . '</p>

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