<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? foreach($arResult["ITEMS"] as $arItem):
	if ($arItem["PREVIEW_PICTURE"]) $file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"][ID], array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
	
  <div class="col-sm-4"> <?if ($arItem["PREVIEW_PICTURE"]):?>
		<p align="center"><a target="_blank" href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>">
			<img style="width;200px;height:274px;" src="<?=$file['src']?>" alt="<?=$arItem["NAME"]?>" />
		</a></p>
		<p align="center"><b><?=$arItem['NAME'];?></b></p>
		 <?if ($arItem["DETAIL_TEXT"]):?>
                <p align="center"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать текст письма</a></p>
             <?endif?>
        <?endif?></div>
 
<?endforeach;?>

