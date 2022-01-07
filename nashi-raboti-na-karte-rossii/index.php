<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши объекты на карте РФ");
$APPLICATION->SetPageProperty("description", "Компания СтройЭкспертНадзор оказывает услуги в Москве и по вссей России. Посмотреть работы на карте России.");

?>


	<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
					<span>/</span>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name">Наши работы на карте России</span></a><meta itemprop="position" content="2" /></span>
				</div>
			</div>
		</div>
	</section>
	
	<section class="stat-sect1">
		<div class="container">

        	<h1>Наши работы на карте России</h1>
			
			<div class="row">
			
			<div class="col-md-12">	
<div class="wrap-map">
			<div id="my-map"></div>
		</div>

		
        
  </div> </div>
      </div></section>

	  
	<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_projects.php");?>
	
	<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_map.php");?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>