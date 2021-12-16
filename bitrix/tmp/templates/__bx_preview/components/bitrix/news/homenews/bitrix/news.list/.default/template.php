<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem):?>

<div class="item-news">
						<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="small-h"><?=$arItem['NAME']?></a>
						<div class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"];?></div>
						<div class="descr"><?=$arItem['PREVIEW_TEXT']?></div>
					</div>
<?endforeach;?>










