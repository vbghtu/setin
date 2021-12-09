<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("FOCUS_CALCULATOR_TEMPLATE_NAME"),
    "DESCRIPTION" => GetMessage("FOCUS_CALCULATOR_TEMPLATE_DESCRIPTION"),
    "ICON" => "/images/sections_top.gif",
    "CACHE_PATH" => "Y",
    "SORT" => 100,
    "PATH" => array(
        "ID" => "content",
        "NAME" => GetMessage("FOCUS_CALCULATOR_GLOBAL_DIR_NAME"),
        "CHILD" => array(
            "ID" => "iblock",
            "NAME" => GetMessage("FOCUS_CALCULATOR_DIR_NAME"),
            "SORT" => 30,
        )
    ),
);

?>