<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? foreach($arResult["ITEMS"] as $arItem):
	$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"][ID], array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
	<div class="item fL">
		<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="preview fL" rel="example_group">
			<img src="<?=$file['src']?>" alt="<?echo $arItem["NAME"]?>" />
		</a>
		<div class="title_area fL w">
			<a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="title">
				<?echo $arItem["NAME"]?>
			</a>
		</div>	
	</div>
<?endforeach;?>

