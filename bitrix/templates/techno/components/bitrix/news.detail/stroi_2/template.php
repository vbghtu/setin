<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetTitle($arResult['NAME'] . " | Проекты по строительству");

$file = CFile::ResizeImageGet($arResult['DISPLAY_PROPERTIES']['KART_PHOTO']['VALUE'], array('width'=>302, 'height'=>222), BX_RESIZE_IMAGE_PROPORTIONAL, true);

?>

<section class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="/">Главная</a>
					<span>/</span>
					<a href="/stroitelstvo/">Строительство</a>
					<span>/</span>
					<span><?=$arResult['NAME'];?></span>
					
				</div>
			</div>
		</div>
	</section>
	
	<?php
	
	foreach ($arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'] as $key => $fasadphoto) {
		
	
		
$file_small = CFile::ResizeImageGet($fasadphoto, array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$file_big = CFile::ResizeImageGet($fasadphoto, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);	

$full .= '<div class="slider_item"><a href="' . $file_big['src'] . '"><img src="' . $file_big['src'] . '" alt="' . $arResult['NAME'] . '"></a></div>';
$mini .= '<div class="navslider_item"><img src="' . $file_small['src'] . '" alt="' . $arResult['NAME'] . '"></div>';

}
	
foreach ($arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'] as $photo) {
	foreach($photo['PHOTO'] as $key => $photo) {

$full .= '<div class="slider_item"><a href="' . $photo['LARGE'] . '"><img src="' . $photo['LARGE'] . '" alt="' . $arResult['NAME'] . '"></a></div>';
$mini .= '<div class="navslider_item"><img src="' . $photo['SMALL']['src'] . '"></div>';
		
}
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
					<h1><?=$arResult['NAME'];?></h1> <br />
					
				
				<?php

foreach ($arResult['DISPLAY_PROPERTIES']['KART_ATTR']['VALUE'] as $key => $attribute) {

?>

<p class="podpis"><?=trim($arResult['DISPLAY_PROPERTIES']['KART_ATTR']['~VALUE'][$key], "-");?></p>

					
<?php
	
}

?>				

<p><?=$arResult['DISPLAY_PROPERTIES']['KART_DESCRIPTION']['~VALUE']['TEXT'];?></p>				
					<div class="wrap-btn">
						<a href="#" class="btn kartochka-zayavka">Заказать услугу</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	
<section class="tehn-sect7 kartochka7">
		<div class="container">
			
			<!-- Вкладки отображаются на ДЕСКТОПЕ -->
			<div class="tabs min700">

				<div class="wrap-tabs">
					<ul class="tabs__caption">
						<li class="active">Комплектация</li>
					</ul>
				</div>

				<div class="wrap-content">
					<div class="tabs__content active"> 
						<?=str_replace("<table", '<table class="table-responsive"', $arResult['DISPLAY_PROPERTIES']['COMPLECT_ATTR2']['~VALUE']["TEXT"]);?>	
					</div>
				</div>
				<div class="clear"></div>

			</div><!-- .tabs-->


			<!-- АККОРДЕОН отображается на МОБИЛЬНОМ -->
<!--			<div class="accordion">
				<div class="vkladka active"><a href="#">Комплектация</a>
					<div class="content " style="display: block;">
						<?php //echo str_replace("<table", '<table class="table-responsive"', $arResult['DISPLAY_PROPERTIES']['COMPLECT_ATTR2']['~VALUE']["TEXT"]);?>	
						</ol>
					</div>
				</div>
			</div>-->

		</div>
	</section>