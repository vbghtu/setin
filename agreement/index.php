<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1934);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1934);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 
$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1934);
$IPROPERTY = $ipropValues->getValues();
$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_default_h.php"); ?>

    <div class="container">
        <div class="container__text">
            <?=$row['DETAIL_TEXT'];?>
        </div>
    </div>



<? //require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php");?>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>