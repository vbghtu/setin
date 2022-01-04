<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? foreach($arResult["ITEMS"] as $arItem):

	$file = CFile::ResizeImageGet($arItem["PROPERTIES"]['PHOTO']['VALUE'], array('width'=>202, 'height'=>242), BX_RESIZE_IMAGE_EXACT, true);?>
	
	<div class="item fL">
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="preview fL">
		  <img src="<?=$file['src']?>" />
		</a>
		<div class="title_area fL w">
		  <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="title"><?=$arItem["NAME"]?></a>
		</div>
	</div>

<?endforeach;?>
