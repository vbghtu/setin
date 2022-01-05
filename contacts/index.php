<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Компания СтройЭкспертНадзор. Услуги по техническому надзору и обследованию зданий и сооружений, более 7 лет в Москве, московской области и других регионах РФ.");
$APPLICATION->SetPageProperty("title", "Конаткты");
$APPLICATION->SetTitle("");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1935);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1935);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1935); 
$IPROPERTY = $ipropValues->getValues();
$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);

?>


<? require($_SERVER["DOCUMENT_ROOT"]."/section/section_default_h.php");?>
	<? //require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>

<? require($_SERVER["DOCUMENT_ROOT"]."/section/section_form.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>