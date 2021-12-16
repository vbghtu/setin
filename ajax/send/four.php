<?php

if(empty($_POST)) {
	die;
}

require($_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php');

date_default_timezone_set('Europe/Moscow');

$email = htmlspecialchars($_POST['email_four']);

CModule::IncludeModule('iblock');

$el = new CIBlockElement;

$arLoadProductArray = Array(
  "MODIFIED_BY"    => 1,
  "IBLOCK_SECTION_ID" => false,
  "IBLOCK_ID"      => 21,
  "NAME"           => $email . " - " . date("Y-m-d H:i:s"),
  "ACTIVE"         => "N", 
  "DETAIL_TEXT"    => "Подписка на рассылку по email (" . $email . ") со страницы " . $_SERVER['HTTP_REFERER'] . " в " . date("Y-m-d H:i:s")
  ); 

$PRODUCT_ID = $el->Add($arLoadProductArray);

?>