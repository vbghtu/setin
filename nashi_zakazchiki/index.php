<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1941);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1941);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1941); 

$IPROPERTY = $ipropValues->getValues();

$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);

?> 


	<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
					<span> / </span>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name"><?=$row['PROPERTY_H1_VALUE'];?></span></a><meta itemprop="position" content="2" /></span>
				</div>
			</div>
		</div>
	</section>
	
	<section class="stat-sect1 nashi_zakazchiki">
		<div class="container">
		<h1><?=$row['PROPERTY_H1_VALUE'];?></h1>
			<div class="row">
				<div class="col-md-12">
				
					

	<?=$row['DETAIL_TEXT'];?>
				
					
</div>
		
			
			</div><br />
			<div class="row wrap-items">
			
<?php

CModule::IncludeModule("iblock");

$arSelect = Array("ID", "NAME", "PROPERTY_TIP", "PROPERTY_KOD", "PROPERTY_IMG", "PROPERTY_URL", "PROPERTY_SITE", "PROPERTY_PISMO");
$res = CIBlockElement::GetList (Array("sort"=>"ASC"), Array("IBLOCK_ID" => 2), false, false, $arSelect);

while($row = $res->GetNext()) {
	
$img_src = CFile::ResizeImageGet($row['PROPERTY_IMG_VALUE'], array('width'=>200, 'height'=>120), BX_RESIZE_IMAGE_EXACT, true);

?>

<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
<div align="center" class="item">
<p><a href="<?=$row['PROPERTY_SITE_VALUE']?>" target="_blank" rel="nofollow"><img src="<?=$img_src['src'];?>"></a></p>
<p><a href="<?=$row['PROPERTY_SITE_VALUE']?>" target="_blank" rel="nofollow"><?=$row['NAME'];?></a></p><br />
</div>
</div>

<?php
	
}
			


?>			

			</div>
		</div>
	</section>

	<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php");?>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>