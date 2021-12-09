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
			<p><a href="<?=$arElement[DETAIL_PAGE_URL]?>" style="font-size:20px;text-decoration:none;"><img src="<?=$file['src']?>" class="preview fL" alt="Объект экспертизы: <?=$arElement['DISPLAY_PROPERTIES']['OPIS_2']['VALUE']?>" /><b><?=$arElement['NAME'];?></b></a></p>
			<br />
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



<?$nomer=$_REQUEST['PAGEN_1'];
if($nomer=='') $nomer=1;
//echo $nomer;
?>
<?$razd=$arResult['NAME']?>

<?if($arResult["ITEMS"][0]['PROPERTIES']['OPIS_1']['VALUE']):?>
<?$dsc='Объект экспертизы: '.$arResult["ITEMS"][0]['PROPERTIES']['OPIS_1']['VALUE'].' Вид экспертизы:'.$arResult["ITEMS"][0]['PROPERTIES']['OPIS_4']['VALUE']?>
<?$dsc=mb_substr($dsc, 0, 160);?>
<?$APPLICATION->SetPageProperty("description", $dsc);?>
<?else:?>
<?$APPLICATION->SetPageProperty("description", "");?>
<?endif?>

<?$tit=$razd.' - выполненные работы '.$nomer?>

<?$APPLICATION->SetPageProperty("title", $tit);?>

