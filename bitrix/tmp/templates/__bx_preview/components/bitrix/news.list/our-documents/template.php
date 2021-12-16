<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

 <style>
   .leftimg {
    float:left; 
    margin: 5px 5px 5px 0;
   }
   
   .imgob {
    border: 1px solid #c0d0e0;
    padding: 2px;
}

  </style>

<?
$rsSect = CIBlockSection::GetList(Array("SORT" => "ASC"), Array('IBLOCK_ID' => $arResult["ID"]));
while ($arSect = $rsSect->GetNext()) $SECTIONS[$arSect["ID"]]["NAME"] = $arSect["NAME"];
foreach($arResult["ITEMS"] as $arItem) $SECTIONS[$arItem["IBLOCK_SECTION_ID"]]["ITEMS"][] = $arItem;
?> 

<?foreach($SECTIONS as $arSec):?>
    <h2><?=$arSec["NAME"]?></h2><br />
<?foreach($arSec["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	
	<p><a href="<?=$arItem["DETAIL_PICTURE"]["SRC"];?>" target="_blank"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="132" height="174" class="imgob leftimg"></a>
    <?=$arItem["DETAIL_TEXT"];?></p> 
	 
<div class="clear"></div><br />

<?endforeach;?>

<?endforeach;?>



