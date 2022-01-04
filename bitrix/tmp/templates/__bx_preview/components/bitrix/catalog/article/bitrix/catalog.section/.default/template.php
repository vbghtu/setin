<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		//print_r ($arElement);
		$file = CFile::ResizeImageGet($arElement[PREVIEW_PICTURE][ID], array('width'=>301, 'height'=>301), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
	  <div class="object">
                	<div class="object-image">
                    	<? if ($arResult[ID] == '10'){?>
			    <a href="<?=$arElement[PROPERTIES][SITE_URL]["VALUE"]?>" target="_blank">
			<?}else{?>
			    <a href="<?=$arElement[DETAIL_PAGE_URL]?>">
			<?}?>
                            <img src="<?=$file['src']?>" width="301" height="198" alt="" />
                            <span class="corners clt"></span>
                            <span class="corners crt"></span>
                            <span class="corners crb"></span>
                            <span class="corners clb"></span>
                        </a>
                    </div>
                	<div class="object-text">
				<h3><?=$arElement[NAME]?></h3>
				<p><?=$arElement['~PREVIEW_TEXT']?></p>   
                    </div>
		    <div class="clear"></div>
		  
                    <div class="c"></div>
                </div>

		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
