<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
/**
 * @global CMain $APPLICATION
 */

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1941);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1941);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 
$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1941);

$IPROPERTY = $ipropValues->getValues();

$APPLICATION->AddChainItem("Наши Заказчики","");
$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);

?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_default_h.php"); ?>
<div class="container">
    <div class="container__text">
	    <?=$row['DETAIL_TEXT'];?>
    </div>
</div>
<section>
    <div class="container ourclients">
<?php

CModule::IncludeModule("iblock");

$arSelect = Array("ID", "NAME", "PROPERTY_TIP", "PROPERTY_KOD", "PROPERTY_IMG", "PROPERTY_URL", "PROPERTY_SITE", "PROPERTY_PISMO");
$res = CIBlockElement::GetList (Array("sort"=>"ASC"), Array("IBLOCK_ID" => 2), false, false, $arSelect);

while($row = $res->GetNext()) {
	$img_src = CFile::ResizeImageGet($row['PROPERTY_IMG_VALUE'], array('width'=>200, 'height'=>120), BX_RESIZE_IMAGE_EXACT, true);
?>

    <div class="clients__slider-img">
        <img src="<?=$img_src['src'];?>" alt="<?=$row['NAME'];?>">
        <a href="<?=$row['PROPERTY_SITE_VALUE']?>" target="_blank" rel="nofollow" class="clients__slider-hidden">
            <div class="tabs__item small-text">
                <i><?=$row['NAME'];?></i>
                <p><?=$row['PROPERTY_KOD_VALUE']['TEXT']?></p>
                <span class="icon-arrow-rigth clients__slider-arrow"></span>
            </div>
        </a>
    </div>



<?php
	
}
			


?>			


		</div>
	</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>