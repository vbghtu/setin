<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php 

$item_list = array();
$photos = array();

foreach ($arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['VALUE'] as $item)
{
	$rsItem = CIBlockElement::GetByID($item);

	$item = $rsItem->GetNextElement();

	$item->fields['PROPERTIES'] = $item->GetProperties();

	$item_list[] = $item->fields;

	foreach ($item_list as $item_value)
	{	
		$photos['FLOOR'] = $item_value['PROPERTIES']['FLOOR']['VALUE'];
		
		$ii = 0;
		foreach ($item_value['PROPERTIES']['PHOTO_FLOOR']['VALUE'] as $photo_value)
		{

			$ii++;
			$photos['PHOTO'][$ii]["SMALL"] = CFile::ResizeImageGet($photo_value, array('width'=>450, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$photos['PHOTO'][$ii]["THUMB"] = CFile::ResizeImageGet($photo_value, array('width'=>205, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$photos['PHOTO'][$ii]["LARGE"] = CFile::GetPath($photo_value);
		}

	}

	$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][] = $photos;		
}

?>