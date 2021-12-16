<br />

<div><a href="/stroitelstvo/projects/">Наши проекты:</a></div><br />

<?php

CModule::IncludeModule("iblock");


$arSelect = Array("ID", "NAME", "PROPERTY_NEW_PRICE", "PROPERTY_KART_SMALL_DESCRIPTION", "PROPERTY_KART_DESCRIPTION", "PROPERTY_KVM", "PROPERTY_KART_PHOTO", "DETAIL_PAGE_URL", "PROPERTY_KVM");
$res = CIBlockElement::GetList (Array("RAND" => "ASC"), Array("IBLOCK_ID" => 15, "ACTIVE" => "Y"), false, Array ("nTopCount" => 8), $arSelect);

while($row = $res->GetNext()) {
	
$img_src = CFile::ResizeImageGet($row["PROPERTY_KART_PHOTO_VALUE"], array('width'=>220, 'height'=>200), BX_RESIZE_IMAGE_EXACT, true);	

$text = substr($row['PROPERTY_KART_SMALL_DESCRIPTION_VALUE']['TEXT'], 0, 80);
$text = rtrim($text, "!,.-");
$text = substr($text, 0, strrpos($text, ' '));
	
?>

<div class="col-md-3 col-sm-6"><div align="center"><a href="<?=$row['DETAIL_PAGE_URL'];?>"><br />
<p><img style="border: 1px solid #c0d0e0;padding: 3px;" src="<?=$img_src['src'];?>"></p>
<p><b><?=$row['NAME']?></b></p>
<p style="color:#0975e9;font-size: 14px;font-weight: bold;"><?=$row['PROPERTY_KVM_VALUE'];?> м²</p>
<p style="color: #df1d0d;font-size: 14px;font-weight: bold;"><?=$row['PROPERTY_NEW_PRICE_VALUE'];?></p>
<p style="text-align:justify;padding:5px;"><?=$text;?>...</p>
</a></div></div>

<?php	
	
}
			
?>

<div class="clear"></div>