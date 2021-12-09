<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords_inner", "проект жилой дом коттедеж одноквартирный стоимость площадь");
$APPLICATION->SetPageProperty("title", "Все проекты одноквартирных жилых домов и коттеджей");
$APPLICATION->SetPageProperty("keywords", "проект жилой дом коттедеж одноквартирный стоимость площадь");
$APPLICATION->SetPageProperty("description", "Проекты одноквартирных жилых домов и коттеджей площадью от 151 м² и стоимостью от 6 миллионов рублей. Максимальный комфорт за минимальные деньги.");
$APPLICATION->SetTitle("Все проекты одноквартирных жилых домов и коттеджей");
?>


	<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
					<span>/</span>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/stroitelstvo/"><span itemprop="name">Строительство</span></a><meta itemprop="position" content="2" /></span>
					<span>/</span>			
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name">Наши проекты</span></a><meta itemprop="position" content="3" /></span>
				</div>
			</div>
		</div>
	</section>

<section class="stat-sect1">
		<div class="container"> 
 
<h1>Все проекты одноквартирных жилых домов и коттеджей</h1>
		  
<div class="row"><div class="col-md-12">		  

<?php

CModule::IncludeModule("iblock");


$arSelect = Array("ID", "NAME", "PROPERTY_NEW_PRICE", "PROPERTY_KART_SMALL_DESCRIPTION", "PROPERTY_KART_DESCRIPTION", "PROPERTY_KVM", "PROPERTY_KART_PHOTO", "DETAIL_PAGE_URL", "PROPERTY_KVM");
$res = CIBlockElement::GetList (Array("RAND" => "ASC"), Array("IBLOCK_ID" => 15, "ACTIVE" => "Y"), false, false, $arSelect);

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

</div></div>
</div></section>



<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>			

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>