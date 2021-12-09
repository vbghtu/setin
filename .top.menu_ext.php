<?
global $APPLICATION; 
$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections", 
	"", 
	array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"DEPTH_LEVEL" => "1",
		"IBLOCK_ID" => "26",
		"IBLOCK_TYPE" => "pages",
		"ID" => $_REQUEST["ID"],
		"IS_SEF" => "Y",
		"SECTION_URL" => "",
		"SEF_BASE_URL" => "/catalog/phone/",
		"SECTION_PAGE_URL" => "#SECTION_ID#/",
		"DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#"
	),
	false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);

?>