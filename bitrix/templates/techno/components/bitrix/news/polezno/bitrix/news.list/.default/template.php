<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<br />

  <div class="row">
	
	
<? foreach($arResult["ITEMS"] as $arItem):

$file = CFile::ResizeImageGet($arItem["PROPERTIES"]['PHOTO']['VALUE'], false, BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?> 				

  <div class="col-md-3 col-sm-6">
            <div align="center" class="footer-widget">
                <p><a href="<?=$arItem['DETAIL_PAGE_URL']?>" target="_blank"><img style="width:150px;height:150px;" src="<?=$file['src'];?>"></a></p>
<p><a href="<?=$arItem['DETAIL_PAGE_URL']?>" target="_blank"><?=$arItem['NAME'];?></a></p><br /> 
            </div>
        </div>

<?endforeach;?> 

</div>

<?