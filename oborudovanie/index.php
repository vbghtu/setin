<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?>

			<?php if($APPLICATION->GetCurPage() == "/oborudovanie/") { 
			
			CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1943);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1943);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1943); 

$IPROPERTY = $ipropValues->getValues();

$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);
			
		
			
			?>



	<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
					<span>/</span>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name"><?=$row['PROPERTY_H1_VALUE'];?></span></a><meta itemprop="position" content="2" /></span>
				</div>
			</div>
		</div>
	</section>
	
	<section class="stat-sect1">


		<div class="container"> 
	
			<?php } ?>


 
			<?php if($APPLICATION->GetCurPage() == "/oborudovanie/") { ?>
 
          <h1><?=$row['PROPERTY_H1_VALUE'];?></h1>
		  
			<?php } ?>
		  
		  <div class="row">
		  
	
	<div class="col-md-12">	
	
	<?php if($APPLICATION->GetCurPage() == "/oborudovanie/") { ?>
		
	
		  
   	<?=$row['DETAIL_TEXT'];?>
	 
	 
	<?php } ?>
	 
	         <?$APPLICATION->IncludeComponent("bitrix:news", "tools", array(
	"IBLOCK_TYPE" => "tools",
	"IBLOCK_ID" => "12",
	"NEWS_COUNT" => "",
	"USE_SEARCH" => "N",
	"USE_RSS" => "N",
	"USE_RATING" => "N",
	"USE_CATEGORIES" => "N",
	"USE_FILTER" => "N",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"CHECK_DATES" => "N",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/oborudovanie/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"USE_PERMISSIONS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
	"LIST_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"LIST_PROPERTY_CODE" => array(
		0 => "",
		1 => "PHOTO",
		2 => "",
	),
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"DISPLAY_NAME" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
	"DETAIL_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"DETAIL_PROPERTY_CODE" => array(
		0 => "",
		1 => "PHOTO",
		2 => "",
	),
	"DETAIL_DISPLAY_TOP_PAGER" => "N",
	"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
	"DETAIL_PAGER_TITLE" => "Страница",
	"DETAIL_PAGER_TEMPLATE" => "",
	"DETAIL_PAGER_SHOW_ALL" => "Y",
	"PAGER_TEMPLATE" => "pagi",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Оборудование",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"USE_SHARE" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"news" => "",
		"section" => "",
		"detail" => "#ELEMENT_CODE#/",
	)
	),
	false
);?> 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
       
        
        
 	</div>	</div>
</div></section>

    	<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>