<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1955);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1955);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1955); 

$IPROPERTY = $ipropValues->getValues();

$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);
?> 


	<section class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="/">Главная</a>
					<span> / </span>
					<span><?=$row['PROPERTY_H1_VALUE'];?></span>
				</div>
			</div>
		</div>
	</section>

<section class="stat-sect1">
		<div class="container"> 
 
<h1><?=$row['PROPERTY_H1_VALUE'];?></h1>

	
	<?=$row['DETAIL_TEXT'];?>

 	</div></div>
</div></section>



<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>			

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>