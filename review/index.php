<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Рекомендательные письма: строительная экспертиза и технадзор");
$APPLICATION->SetTitle("Рекомендательные письма: строительная экспертиза и технадзор");
$APPLICATION->SetPageProperty("description", "Отзывы клиентов о работе с компанией «СтройЭкспертНадзор». Нас рекомендуби такие компании как: ВТБ Страхование, сеть магазинов Перекрёсток, Первый канал, Россети и другие.");
?> 
		
	<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
					<span>/</span>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name">Рекомендательные письма</span></a><meta itemprop="position" content="2" /></span>
				</div>
			</div>
		</div>
	</section>


<section class="stat-sect1">
		<div class="container"> 
         <h1>Рекомендательные письма</h1>
		 
		 <div class="row">
       				 				 
<?$APPLICATION->IncludeComponent("bitrix:news.list", "rew", array(
	"IBLOCK_TYPE" => "objects",
	"IBLOCK_ID" => "7",
	"NEWS_COUNT" => "2000",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"PAGER_TEMPLATE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?> 				


	
</div>
</div></section>




<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_map.php");?>			

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>