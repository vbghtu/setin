<?

require_once($_SERVER["DOCUMENT_ROOT"]. "/bitrix/modules/main/include/prolog_before.php");

$page = $_SERVER['REQUEST_URI'];

$explode = explode("/", $page);

if($explode[1] == "review") {

if(CModule::IncludeModule("iblock"))
{

	
 $obElement = CIBlockElement::GetByID($explode[2]);
 if($arEl = $obElement->GetNext())
   $code = $arEl["CODE"];

if(!empty($code)) {
	header('HTTP/1.1 301 Moved Permanently');
header('Location: http://seitn.ru/review/' . $code . "/");
die;
}

}

}


$file = (int) $_GET['ELEMENT_ID'];

$one = explode("?", $_SERVER['REQUEST_URI']);

$explode = explode("/", $one[0]);
		
$explode = array_diff($explode, array('', NULL, false));
		
if(end($explode) != $file) {

   CHTTP::SetStatus("404 Not Found"); 
   @define("ERROR_404","Y");
   
require_once($_SERVER["DOCUMENT_ROOT"]."/404.php");

die;

} 

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Рекомендательные письма");

?>

        <?$APPLICATION->IncludeComponent("bitrix:news.detail", "review", array(
	"IBLOCK_TYPE" => "objects",
	"IBLOCK_ID" => "7",
	"ELEMENT_CODE" => $_REQUEST["ELEMENT_ID"],
	"CHECK_DATES" => "Y",
	"FIELD_CODE" => array(
		0 => "PREVIEW_PICTURE",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
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

<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php");?>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>