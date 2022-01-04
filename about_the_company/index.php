<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1961);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1961);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1961); 

$IPROPERTY = $ipropValues->getValues();


$APPLICATION->SetPageProperty("title","О компании «СтройЭкспертНадзор» - скачать презентацию");
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);



?> 



	<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
					<span> / </span>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name">О компании</span></a><meta itemprop="position" content="2" /></span>
				</div>
			</div>
		</div>
	</section>

	<?=$row['DETAIL_TEXT'];?>

	<section class="tehn-sect4">
		<div class="container">
			<div class="row">
				<div class="title">Портфолио</div>
				<div class="wrap-tehn-sect4-slider">
				<div class="tehn-sect4-slider owl-carousel">
					
					<?php 
					
									
				CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_ADDRESS", "PREVIEW_PICTURE", "PROPERTY_OPIS_1", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID");
 
$res = CIBlockElement::GetList (Array('ID' => 'DESC'), Array("IBLOCK_ID" => 1), false, Array("nTopCount" => 24), $arSelect);

$row = array();

while($row = $res->GetNext()){
	

								


?>
					
						<div class="item">
							<a href="<?=$row['DETAIL_PAGE_URL'];?>" class="wrap-img"><img src="<?=CFile::GetPath($row['PREVIEW_PICTURE']);?>" alt="<?=$row['NAME'];?>"></a>
							<div class="wrap-text"><?php

							$resex = CIBlockSection::GetByID($row["IBLOCK_SECTION_ID"]);
if($ar_res = $resex->GetNext()) {
echo $ar_res['NAME'];
}

?><br><?=$row['PROPERTY_OPIS_1_VALUE'];?></div>
						</div>
						
						<?php

 } ?>
 
					</div>
					<div id="tehn-sect4_owl_prev"></div>
					<div id="tehn-sect4_owl_next"></div>
				</div>
				<div class="col-md-12">
					<div class="wrap-btn">
						<a href="/portfolio/" class="to-portfolio">Перейти в портфолио</a>
					</div>
				</div>
			</div>
		</div>
	</section>

<section class="about-sect6">
		<div class="container">
			<div class="row">
				<div class="title">Нам доверяют</div>
				<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_reviews.php");?>
			</div>
		</div>
	</section>

	<section class="sect10">
		<div class="container">
			<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_news.php");?>
		</div>
	</section>
	
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>