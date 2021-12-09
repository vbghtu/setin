<?

$id = (int) $_GET['ELEMENT_ID'];

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


?>

     <?$APPLICATION->IncludeComponent("bitrix:news.detail", "stroi_sud", array(
	"IBLOCK_TYPE" => "pages",
	"IBLOCK_ID" => "28",
	"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/sudebnaya_ekspertiza/",
	"ELEMENT_CODE" => $_REQUEST["ELEMENT_ID"],
	"CHECK_DATES" => "Y",
	"FIELD_CODE" => array(
		0 => "PREVIEW_PICTURE",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => 104,
		1 => 105,
		2 => 106,
		3 => 107,
	),
	"IBLOCK_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "N",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "N",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"USE_PERMISSIONS" => "N",
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Страница",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"USE_SHARE" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?> 		

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>