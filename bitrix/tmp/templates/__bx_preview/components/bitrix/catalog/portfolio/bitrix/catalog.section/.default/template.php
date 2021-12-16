<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<div class="category fL w">		
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		//print_r ($arElement);
		$file = CFile::ResizeImageGet($arElement[PREVIEW_PICTURE][ID], array('width'=>301, 'height'=>228), BX_RESIZE_IMAGE_EXACT, true);?>

		<div class="item fL w">
			<a href="<?=$arElement[DETAIL_PAGE_URL]?>"><img src="<?=$file['src']?>" class="preview fL" /></a>
			<div class="descr fL">
				<? if ($arResult[ID] == '15'){?>
			  	   <span class="field fL"><?=$arElement[NAME]?></span>
				<?}?>
		                    <? if ($arElement[DISPLAY_PROPERTIES][OPIS_2]["VALUE"]){
		                        echo ('<span class="field fL"><span class="title">'.$arElement[DISPLAY_PROPERTIES][OPIS_2][NAME].':</span> '.$arElement[DISPLAY_PROPERTIES][OPIS_2]["~VALUE"].'</span>');
		                    }?>
		                    <? if ($arElement[DISPLAY_PROPERTIES][OPIS_1]["VALUE"]){
		                        echo ('<span class="field fL"><span class="title">'.$arElement[DISPLAY_PROPERTIES][OPIS_1][NAME].':</span> '.$arElement[DISPLAY_PROPERTIES][OPIS_1]["~VALUE"].'</span>');
		                    }?>                       
		                    <? if ($arElement[DISPLAY_PROPERTIES][OPIS_4]["VALUE"]){
		                        echo ('<span class="field fL"><span class="title">'.$arElement[DISPLAY_PROPERTIES][OPIS_4][NAME].':</span> '.$arElement[DISPLAY_PROPERTIES][OPIS_4]["~VALUE"].'</span>');
		                    }?>
				    <? if ($arResult[ID] == '15'){?>
				   		<span class="field fL"><?=$arElement[PROPERTIES][DESCRIPTION]['~VALUE'][TEXT]?></span>
					<?}?>

				<? if ($arElement[DISPLAY_PROPERTIES][OPIS_3]["VALUE"]){

                    echo ('<div class="problem fL"><span class="field"><span class="title">'.$arElement[DISPLAY_PROPERTIES][OPIS_3][NAME].':</span> '.$arElement[DISPLAY_PROPERTIES][OPIS_3]["~VALUE"].'</span></div>');
                }?>
		
			</div>
		</div>

		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"];?>
<?endif;?>

</div>