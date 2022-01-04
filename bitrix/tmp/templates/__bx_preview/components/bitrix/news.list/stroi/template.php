<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="item fL fh">
		<?
		$img_obj = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>207, 'height'=>180), BX_RESIZE_IMAGE_EXACT, true);
 		$arItem['IMAGE'] = $img_obj['src'];
		?>

		<a href="<?=$arItem[DETAIL_PAGE_URL]?>">
	        <img src="<?=$arItem['IMAGE']?>" class="preview"/>   
		    <span class="title" style="display:block;text-align:center;"><?=$arItem['NAME']?></span>
	    </a>    
	    <span class="price fL"><?=$arItem['DISPLAY_PROPERTIES']['CLASS']['VALUE']?></span>
	    <span class="anons fL"><?=$arItem['PREVIEW_TEXT']?></span>       
	</div>
<?endforeach;?>




