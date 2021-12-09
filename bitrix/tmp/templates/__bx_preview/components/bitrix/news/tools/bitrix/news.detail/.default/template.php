<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="item fL w">
	<div class="images fL">
		<?
            //$file = CFile::ResizeImageGet($arResult["PROPERTIES"]['PHOTO']['VALUE'], array('width'=>202, 'height'=>242), BX_RESIZE_IMAGE_EXACT, true);
            $file = CFile::ResizeImageGet($arResult["PROPERTIES"]['PHOTO']['VALUE'], array('width'=>402, 'height'=>442), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
        ?>
		<img src="<?=$file['src']?>" class="preview fL" />
	</div>
	
		<div class="tools-descr"><p style="padding-right: 20px"><?echo $arResult["DETAIL_TEXT"];?></p></div>
	
</div>


