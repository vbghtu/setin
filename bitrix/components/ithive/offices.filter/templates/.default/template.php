<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <style>
        #shop_search_form select{border: 1px solid #968C8C;border-radius: 8px;}
        #filter_submit{border: 1px solid #fff;border-radius: 8px;}
    </style>
	<div class="seach_block fL w">
		<span class="title fL">Найти объект:</span>
		<form id="shop_search_form" class="search fL w" name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
			<?foreach($arResult["ITEMS"] as $arItem):
				if(array_key_exists("HIDDEN", $arItem)):
					echo $arItem["INPUT"];
				endif;
			endforeach;?>
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?if(!array_key_exists("HIDDEN", $arItem)):?>
			<!-- <p><?=$arItem["NAME"]?></p> -->
			<?=$arItem["INPUT"]?>
				<?endif?>
			<?endforeach;?>
			<div class="shop_search_form_buttons">
				<input id="filter_submit" type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" />
			</div>
			<input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;
			<input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" class="clear fL"/>
		</form>
	</div>
