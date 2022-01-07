<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");

$res = CIBlockSection::GetByID($arResult["IBLOCK_SECTION_ID"]);
if($ar_res = $res->GetNext())
$cat = $ar_res['NAME'];

?>

<section class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="/">Главная</a>
					<span>/</span>
					<a href="/portfolio/">Портфолио</a>
			
					<span>/</span>
					<span><?=$arResult['NAME'];?></span>
				</div>
			</div>
		</div>
</section>
	
<?php

if(!empty($arResult['PREVIEW_PICTURE']['ID'])) {
	
array_unshift($arResult['PROPERTIES']['PHOTO_ALL']['VALUE'], $arResult['PREVIEW_PICTURE']['ID']);

}		

foreach ($arResult['PROPERTIES']['PHOTO_ALL']['VALUE'] as $value){
	
$file_small = CFile::ResizeImageGet($value, array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$file_big = CFile::ResizeImageGet($value, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);	

$full .= '<div class="slider_item"><a href="' . $file_big['src'] . '"><img src="' . $file_big['src'] . '" alt="' . $arResult['NAME'] . '"></a></div>';
$mini .= '<div class="navslider_item"><img src="' . $file_small['src'] . '"  alt="' . $arResult['NAME'] . '"></div>';


}	


	?>

	<section class="sect_kartochka1">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-5">

					<div class="wrap-slider-tovara">
						<div class="big-slider">
							<?=$full;?>
						</div>
						
					
						<div class="nav-slider">
							<?=$mini;?>
						</div>
					</div>

				</div>
				<div class="col-md-7 col-sm-7">
					<h1><?=$cat;?>: <?=$arResult['NAME'];?></h1>
					
					<?php
					
					$uslugi_list = array("Пример услуги #1" => "ONE_LINK", "Пример услуги #2" => "TWO_LINK", "Пример услуги #3" => "THREE_LINK");
					
					foreach($arResult['PROPERTIES']['ONE']['VALUE'] as $name) {
						$href = $uslugi_list[$name];
						$list_uslugi_view .= '<a href="' . ((!empty($href)) ? $href : "#") . '" class="one-tag">' . $name . '</a>';
					}
					
					if(!empty($list_uslugi_view)) {
					
					?>
					
					<p class="podpis">Услуги:</p>
					
					<div class="wrap-tags">
						<?=$list_uslugi_view;?>
					</div>
					
					<?php
					
					}
					
				?>
						
						
					
					<p class="podpis">Заказчик:</p>
					<p><?=$arResult['PROPERTIES']['THREE']['VALUE'];?></p>
					<p class="podpis">Объект:</p>
					<p><?=$arResult['PROPERTIES']['FOUR']['VALUE'];?></p>
					<p class="podpis">Задача:</p>
					<p><?=$arResult['PROPERTIES']['FIVE']['VALUE']['TEXT'];?></p>
					<p class="podpis">Решение:</p>
					<p><?=$arResult['PROPERTIES']['FOURTEEN']['VALUE']['TEXT'];?></p>
					<ul>
						<?=htmlspecialcharsBack($arResult['PROPERTIES']['FIFTEEN']['VALUE']['TEXT']);?>
					</ul>
					<div class="wrap-btn">
						<a href="#" class="btn kartochka-zayavka">Заказать услугу</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
	

	
$tabs = array($arResult['PROPERTIES']['EIGHT']['NAME'] => $arResult['PROPERTIES']['EIGHT']['VALUE']['TEXT'], $arResult['PROPERTIES']['NINE']['NAME'] => $arResult['PROPERTIES']['NINE']['VALUE']['TEXT'],  $arResult['PROPERTIES']['TEN']['NAME'] => $arResult['PROPERTIES']['TEN']['VALUE']['TEXT'],  $arResult['PROPERTIES']['ELEVEN']['NAME'] => $arResult['PROPERTIES']['ELEVEN']['VALUE']['TEXT'], $arResult['PROPERTIES']['TWELVE']['NAME'] => $arResult['PROPERTIES']['TWELVE']['VALUE']['TEXT'], $arResult['PROPERTIES']['THIRTEEN']['NAME'] => $arResult['PROPERTIES']['THIRTEEN']['VALUE']['TEXT'], $arResult['PROPERTIES']['SIXTEEN']['NAME'] => $arResult['PROPERTIES']['SIXTEEN']['VALUE']['TEXT']);

$tabs = array_diff($tabs, array(''));

$i_tabs = 0;

foreach ($tabs as $key => $value) {

$i_tabs++;

$list .= "<li" . (($i_tabs == 1) ? " class=\"active\"" : "") . ">" . $key . "</li>";
$list_tab_info_desctop .= "<div class=\"tabs__content". (($i_tabs == 1) ? " active" : "") . "\">" . htmlspecialcharsBack($value) . "</div>";
$list_tab_info_mobile .= "<div class=\"vkladka" . (($i_tabs == 1) ? " active" : "") . "\"><a href=\"#\">" . $key . "</a><div class=\"content\"" . (($i_tabs == 1) ? " style=\"display: block;\"" : "") . ">" . htmlspecialcharsBack($value) . "</div></div>";

}

$review_id = $arResult['PROPERTIES']['REVIEW']['VALUE'];

if(count($tabs) > 0) { 

?>

	<section class="tehn-sect7 kartochka7">
		<div class="container">
			
			<!-- Вкладки отображаются на ДЕСКТОПЕ -->
			<div class="tabs min700">

				<div class="wrap-tabs">
					<ul class="tabs__caption">
						<?=$list;?>
					</ul>
				</div>

				<div class="wrap-content">
			<?=$list_tab_info_desctop;?>
				</div>
				<div class="clear"></div>

			</div><!-- .tabs-->

		</div>
	</section>
	
<?php 

} 

if(!empty($review_id)) {

$arSelect = Array("ID", "NAME", "DETAIL_PICTURE", "PROPERTY_COMPAMY", "PROPERTY_FIO", "PROPERTY_REVIEW");
 
$res = CIBlockElement::GetList (false, Array("IBLOCK_ID" => 20, "ID" => $review_id), false, false, $arSelect);

$row_review = $res->GetNext();

if(!empty($row_review['DETAIL_PICTURE'])) {
	
$review_image = CFile::ResizeImageGet($row_review['DETAIL_PICTURE'], array('width'=>275, 'height'=>171), BX_RESIZE_IMAGE_PROPORTIONAL, true);	
$review_image_view = '<div class="col-md-4 col-sm-4 center"><img src="' . $review_image['src'] . '" alt="' . $row_review['NAME'] . '"></div>';

}

if(!empty($row_review)) {

?>

<section class="otziv_klienta">
		<div class="container">
			<div class="row">
				<div class="title">Отзыв клиента</div>
				<?=$review_image_view;?>
				<div class="col-md-8 col-sm-8">
					<p><b><?=$row_review['PROPERTY_FIO_VALUE'];?></b></p>
					<p><?=$row_review['PROPERTY_COMPAMY_VALUE'];?></p>
					<br>
					<p><?=$row_review['PROPERTY_REVIEW_VALUE']['TEXT'];?></p>
				</div>
			</div>
		</div>
	</section>
	
<?php
	
}

}

?>	

	<section class="tehn-sect4 kart_tovara4">
		<div class="container">
			<div class="row">
				<div class="title">Похожие проекты</div>
				<div class="wrap-tehn-sect4-slider">
					<div class="tehn-sect4-slider owl-carousel">
					
					<?php
					
					$arSelect = Array("ID", "IBLOCK_SECTION_ID", "PROPERTY_PHOTO_ALL", "NAME");
 
$res = CIBlockElement::GetList (array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "!PROPERTY_PHOTO_ALL"=>false, "SECTION_ID" => array(9, 2)), false, Array("nTopCount" => 12), $arSelect);

$row = array();

while($row = $res->GetNext()){
	
	
$recomendate_image = CFile::ResizeImageGet($row['PROPERTY_PHOTO_ALL_VALUE'], array('width'=>251, 'height'=>189), BX_RESIZE_IMAGE_PROPORTIONAL, true);		
	
if($row['IBLOCK_SECTION_ID'] == 9) {
	$cat = "Строительная экспертиза";
} else {
	$cat = "Технический надзор";	
}
	
	?>
					
					
						<div class="item">
							<a href="#" class="wrap-img"><img src="<?=$recomendate_image['src'];?>" alt="<?=$row['NAME'];?>"></a>
							<div class="wrap-text"><?=$cat;?><br /><?=$row['NAME'];?></div>
						</div>
						
<?php } ?>						

					</div>
					<div id="tehn-sect4_owl_prev"></div>
					<div id="tehn-sect4_owl_next"></div>
				</div>
			</div>
		</div>
	</section>

	<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_popular.php");?>

	<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php");?>