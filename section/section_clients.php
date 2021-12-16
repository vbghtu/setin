<?php
CModule::IncludeModule("iblock");
$arSelect = Array("ID", "NAME", "PROPERTY_TIP", "PROPERTY_KOD", "PROPERTY_IMG", "PROPERTY_URL", "PROPERTY_SITE", "PROPERTY_PISMO");
$res = CIBlockElement::GetList (Array("sort"=>"ASC"), Array("IBLOCK_ID" => 2), false, false, $arSelect);

$i = 0;

while($row = $res->GetNext()) {

    if(!empty($row['PROPERTY_IMG_VALUE'])) {

        $img_src = CFile::ResizeImageGet($row['PROPERTY_IMG_VALUE'], array('width'=>200, 'height'=>140), BX_RESIZE_IMAGE_EXACT, true);
       //$img_src = CFile::ResizeImageGet($row['PROPERTY_IMG_VALUE'], array(), BX_RESIZE_IMAGE_EXACT, true);
        $src_img = $img_src['src'];
        var_dump($src_img);
    }
}
    ?>
<!--
 <a rel="nofollow" href="<?=$row['PROPERTY_SITE_VALUE'];?>" target="_blank">

-->