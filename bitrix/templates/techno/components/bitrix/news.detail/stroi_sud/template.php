<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="sect1 ekspert_sect1">
	<div class="container">
		<?=$arResult['PROPERTIES']['h1']['~VALUE']['TEXT'];?>
		<div class="secondh2">эксперты в строительстве более 10 лет</div>
		<a href="#" class="big-btn prof_consult_modal">Получить консультацию</a>
		<a target="_blank" href="/upload/presentation.pdf" class="big-btn-empty" id="dwn_file" download>Скачать презентацию</a>
		<span class="pdf">(pdf., 12 Mb)</span>
	</div>
</section>

<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
				<span> / </span>
		<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/sudebnaya_ekspertiza/"><span itemprop="name">Судебная экспертиза</span></a><meta itemprop="position" content="2" /></span>
				<span> / </span>			
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name"><?=$arResult['NAME'];?></span></a><meta itemprop="position" content="3" /></span>
			</div>
		</div>
	</div>
</section>


<?php

$text = $arResult['DETAIL_TEXT'];

$text = preg_replace('#<div class="wrap-table">.*?</section>#s', "	<div align='center'><p><h2><a style='color:#255287;' href=\"/stoimost_uslug/\">Ознакомиться с ценами можно здесь</a></h2></p></div></div>
			</div>
		</div></section>", $text); 
		
echo $text;




echo $arResult['PROPERTIES']['etapi']['~VALUE']['TEXT'];

echo $arResult['PROPERTIES']['vkladki']['~VALUE']['TEXT'];


?>




<section class="ekspert_sect5">
		<div class="container">
			<p class="title">При заказе услуг судебной экспертизы получите скидку 20%!</p>
		</div>
	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_form.php");?>

<section class="sect6">
	<div class="title">Наши объекты на карте России</div>
	<div class="wrap-map">
		<div id="my-map"></div>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_projects.php");?>

<?php

echo $arResult['PROPERTIES']['vibor']['~VALUE']['TEXT'];

?>

<!--/noindex--><section class="about-sect2 eksert_sect2">
	<div class="container">
		<div class="row">
			<div class="title">Нам доверяют</div>
			<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_reviews.php");?>
		</div>
	</div>
</section>


<section class="sect8">
	<div class="container">
		<div class="title">Нас уже выбрали</div>
		<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_clients.php");?>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_form_two.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_popular.php");?>

<section class="sect10 eksert_sect10">
	<div class="container">
		<div class="title">
			Полезная информация
		</div>
		<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_polezno.php");?>
	</div>
</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>