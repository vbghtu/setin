<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1959);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1959);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1959); 

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

<section class="stat-sect1">
		<div class="container"> 
	<h1><?=$row['PROPERTY_H1_VALUE'];?></h1>
		  
<div class="row"><div class="col-md-12">		  
		  
<?=$row['DETAIL_TEXT'];?>
 	</div>	</div>
</div></section>



<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>			

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>