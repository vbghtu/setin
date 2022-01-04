<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1942);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1942);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1942); 

$IPROPERTY = $ipropValues->getValues();

$APPLICATION->SetTitle($IPROPERTY['ELEMENT_META_TITLE']);
$APPLICATION->SetPageProperty("description", $IPROPERTY['ELEMENT_META_DESCRIPTION']);

?> 


<section class="sect1 ekspert_sect1">
	<div class="container">
		<h1><?=$row['PROPERTY_H1_VALUE'];?></h1>
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
				<span>/</span>
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name"><?=$row['PROPERTY_H1_VALUE'];?></span></a><meta itemprop="position" content="2" /></span>
			</div>
		</div>
	</div>
</section>

	<?=$row['DETAIL_TEXT'];?>

<section class="ekspert_sect5">
	<div class="container">
		<div class="title">При заказе услуг экспертизы получите скидку 20%!</div>
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

<!--noindex-->
<section class="about-sect2 eksert_sect2">
	<div class="container">
		<div class="title">Почему выбирают «СтройЭкспертНадзор»</div>
		<div class="row">

			<div class="col-md-4 col-sm-4 col-md-push-8">
				<div class="wrap-dir">
					<div class="wrap-img">
						<span itemscope="" itemtype="http://schema.org/ImageObject">
							<img title="Строительный контроль качества в Москве" alt="Строительный контроль качества в Москве - СтройЭкспертНадзор" itemprop="contentUrl" src="/bitrix/templates/techno/img/photo-gen2.png">
						</span>
					</div>
					<p class="name">Делендик Игорь Иванович</p>
					<p class="posada">Руководитель отдела экспертиз</p>
					<a href="#" class="write-mess write_to_expert">Написать сообщение</a>
				</div>
			</div>

			<div class="col-md-8 col-sm-8 col-md-pull-4">
				
				<p>Мы работаем в сфере более 10 лет и предоставляем услуги по всей РФ:</p>
				
				<ul>
					<li>проводим полностью независимые, непредвзятые и объективные строительные экспертизы любой сложности и объема;</li>
					<li>гарантируем качество и высокую оперативность исследований;</li>
					<li>сотрудничаем на прозрачных условиях — цены представлены на сайте, сотрудники готовы предоставить полную информацию о процессе исследований.</li> 
				</ul>

				<p>Стоимость услуг формируется гибко – вы платите только за тот объем работ, который необходим в вашем случае. На всех этапах мы консультируем по профильным вопросам.</p>


				
			</div>
		</div>

	</div>
</section>

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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>