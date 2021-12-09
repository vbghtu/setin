<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
    "SET_JQUERY" => Array(
        "NAME" => GetMessage("SET_JQUERY"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
    ),

    "HIDE_PERIOD" => Array(
        "NAME" => GetMessage("HIDE_PERIOD"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
    ),

    "SEND_MAIL" => Array(
        "NAME" => GetMessage("SEND_MAIL"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
    ),

    "ACTION" => Array(
        "NAME" => GetMessage("ACTION"),
        "TYPE" => "TEXT",
        "DEFAULT" => "/bitrix/components/bitrix/focus.calculator/templates/.default/order.php",
    ),

    "OPEN_DEFAULT" => Array(
        "NAME" => GetMessage("OPEN_DEFAULT"),
        "TYPE" => "TEXT",
        "DEFAULT" => "",
    ),

	"LIST_TYPE" => array(
		"NAME" => GetMessage("LIST_TYPE"),
		"TYPE" => "LIST",
		"VALUES" => array(
			"onelist" => GetMessage("LIST_TYPE_ONELIST"),
			"" => GetMessage("LIST_TYPE_MULTYBOX"),
			),
		"DEFAULT" => "onelist",
	),

);

?>
