<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

CModule::IncludeModule("iblock");

$arSelect = Array("NAME", "PROPERTY_h1", "DETAIL_TEXT", "ID" => 1951);
$arFilter = Array("IBLOCK_ID"=>26, "ID" => 1951);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement()){
   $row = $ob->GetFields();  
} 

$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(26,1951); 

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
				<span> / </span>
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/pereplanirovka/"><span itemprop="name">Перепланировка</span></a><meta itemprop="position" content="2" /></span>
				<span> / </span>
				<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name"><?=$row['PROPERTY_H1_VALUE'];?></span></a><meta itemprop="position" content="3" /></span>
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

<!--noindex--><section class="about-sect2 eksert_sect2">
	<div class="container">
		<div class="title">Почему выбирают «СтройЭкспертНадзор»</div>
		<div class="row">

			<div class="col-md-4 col-sm-4 col-md-push-8">
				<div class="wrap-dir">
					<div class="wrap-img"><span itemscope itemtype="http://schema.org/ImageObject"><img title="Независимая строительная экспертизам ногоквартирного жилого дома" alt="Независимая строительная экспертизам ногоквартирного жилого дома - СтройЭкспертНадзор" itemprop="contentUrl" src="<?=SITE_TEMPLATE_PATH;?>/img/photo-gen2.png" ></span></div>
					<div>Делендик Игорь Иванович</div>
					<div class="newh3">Руководитель отдела экспертиз</div>
					<a href="#" class="write-mess write_to_expert">Написать сообщение</a>
				</div>
			</div>

			<div class="col-md-8 col-sm-8 col-md-pull-4">
				<p>Компания «СтройЭкспертНадзор» проводит все виды строительно-технических экспертиз. Мы всесторонне оценим перепланировки, их возможность, законность и качество проведения. Нас выбирают, потому что мы обеспечиваем:</p>
				<ul>
					<li>объективный, истинный и полный результат обследований — после работы не останется невыясненных моментов и «слепых зон»;</li>
					<li>скорость работы — нам понадобится минимум времени, все процессы отлажены, простоев и задержек не будет;</li>
					<li>гибкость при сотрудничестве — если понадобится, добавим или уберем исследования.</li>
				</ul>
				<p>С нами вы обеспечиваете качество и законность перепланировки. Звоните, и консультанты расскажут о наших услугах, расценках и условиях сотрудничества. </p>


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

<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form_two.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_popular.php");?>

<section class="sect10 eksert_sect10">
	<div class="container">
		<div class="title">
			Полезная информация
		</div>
		<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_polezno.php");?>
	</div>
</section>


<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_form.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>