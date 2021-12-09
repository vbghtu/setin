<?

require_once($_SERVER["DOCUMENT_ROOT"]. "/bitrix/modules/main/include/prolog_before.php");

$page = $APPLICATION->GetCurPage();

if($page == "/portfolio/heading_2/") {

header('HTTP/1.1 301 Moved Permanently');
header('Location: http://seitn.ru/portfolio/tehnadzor/');
die;

} elseif($page == "/portfolio/examination/") {
header('HTTP/1.1 301 Moved Permanently');
header('Location: http://seitn.ru/portfolio/stroitelnaya-ekspertiza/');
die;
}

$explode = explode("/", $page);

if($explode[2] == "heading_2") {

if(CModule::IncludeModule("iblock"))
{
 $obElement = CIBlockElement::GetByID($explode[3]);
 if($arEl = $obElement->GetNext())
   $code = $arEl["CODE"];

if(!empty($code)) {
	header('HTTP/1.1 301 Moved Permanently');
header('Location: http://seitn.ru/portfolio/tehnadzor/' . $code . "/");
die;
}

}

} elseif($explode[2] == "examination") {
	
	if(CModule::IncludeModule("iblock"))
{
 $obElement = CIBlockElement::GetByID($explode[3]);
 if($arEl = $obElement->GetNext())
   $code = $arEl["CODE"];

if(!empty($code)) {
	header('HTTP/1.1 301 Moved Permanently');
header('Location: http://seitn.ru/portfolio/stroitelnaya-ekspertiza/' . $code . "/");
die;
}

}
	
} elseif($explode[2] == "cottage-towns") {
	
	if(CModule::IncludeModule("iblock"))
{
 $obElement = CIBlockElement::GetByID($explode[3]);
 if($arEl = $obElement->GetNext())
   $code = $arEl["CODE"];

if(!empty($code)) {
	header('HTTP/1.1 301 Moved Permanently');
header('Location: http://seitn.ru/portfolio/cottage-towns/' . $code . "/");
die;
}

}
	
}


CModule::IncludeModule("iblock");

$res = CIBlockElement::GetList(false, Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => array(9, 2)), array('IBLOCK_ID')); 

if ($el = $res->Fetch()) {
	$count_objects = $el['CNT'];
}

$mypage = (int) $_GET['page'];

$max_page = ceil($count_objects / 6);

if($mypage >= $max_page) {
	
	CHTTP::SetStatus("404 Not Found"); 
	@define("ERROR_404","Y");

require_once($_SERVER["DOCUMENT_ROOT"]."/404.php");

die;

}
	
		

if (isset($_GET["PAGEN_1"]) && isset($_GET["PAGEN_2"]) && strpos($_SERVER['REQUEST_URI'], "/cottage-towns/") !== false)
{
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: http://".$_SERVER['HTTP_HOST']."/portfolio/cottage-towns/?PAGEN_1=".$_GET["PAGEN_1"]);
  exit();
}

if (isset($_GET["PAGEN_1"]) && isset($_GET["SHOWALL_1"]) && strpos($_SERVER['REQUEST_URI'], "/cottage-towns/") !== false)
{
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: http://".$_SERVER['HTTP_HOST']."/portfolio/cottage-towns/?PAGEN_1=".$_GET["PAGEN_1"]);
  exit();
}

if (isset($_GET["PAGEN_2"]) && isset($_GET["SHOWALL_1"]) && strpos($_SERVER['REQUEST_URI'], "/cottage-towns/") !== false)
{
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: http://".$_SERVER['HTTP_HOST']."/portfolio/cottage-towns/?PAGEN_2=".$_GET["PAGEN_2"]);
  exit();
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
$APPLICATION->AddChainItem("Наши работы", "/portfolio/");

$page = $APPLICATION->GetCurPage();

if($page == "/portfolio/") {
	
		
$arSelect = Array("ID", "PROPERTY_SEVEN");
 
$res = CIBlockElement::GetList ( array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "!PROPERTY_SEVEN"=>false, "SECTION_ID" => array(2)), false, false, $arSelect);

$row = array();

$i_count = 0;

while($row = $res->GetNext()){
	
$i_count++;

$array_i[$row['ID']] = array("i" => $i_count);

}





if(!empty($mypage)) {
	$APPLICATION->SetPageProperty("title", "Примеры работ в области строительной экспертизы и технадзора от компании СтройЭкспертНадзор - страница №" . ($mypage + 1));
	$h1 = '<h1 class="title">Примеры работ по строительной экспертизе и технадзору - страница №' . ($mypage + 1) . '</h1>';
	$sum_prev = $mypage - 1;
	$prev = ((!empty($sum_prev)) ? '<link rel="prev" href="http://seitn.ru' . $page. '?page=' . $sum_prev . '">' : '<link rel="prev" href="http://seitn.ru' . $page. '">');
	$sum_next = $mypage + 1;
	$next = (($sum_next < $max_page) ? '<link rel="next" href="http://seitn.ru' . $page. '?page=' . $sum_next . '">' : "");
} elseif(empty($mypage)) {
	$APPLICATION->SetPageProperty("title", "Примеры работ в области строительной экспертизы и технадзора от компании СтройЭкспертНадзор");
	$APPLICATION->SetPageProperty("description", "Портфолио компании СтройЭкспертНадзор. Наши работы в категориях: Коттеджные посёлки, Строительная экспертиза, Технический надзор.");
	$prev = "";
	$h1 = '<h1 class="title">Примеры работ по строительной экспертизе и технадзору</h1>';
	$sum_next = $mypage + 1;
	$next = '<link rel="next" href="http://seitn.ru' . $page. '?page=1">';
}

$APPLICATION->SetPageProperty("next", $next);
$APPLICATION->SetPageProperty("prev", $prev);

?>



	<section class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="/"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></span>
					<span>/</span>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#"><span itemprop="name">Портфолио</span></a><meta itemprop="position" content="2" /></span>
				</div>
			</div>
		</div>
	</section>

	<section class="sect8 portf-sect1">
		<div class="container">
			<div class="title">Заказчики</div>
		
				<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_clients.php");?>

			<div class="row">
				<div class="col-md-12">
					<div class="wrap-btn">
						<a href="/nashi_zakazchiki/" class="to-portfolio">Посмотреть все</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="sect6">
		<div class="container">
			<div class="row">
				<?=$h1;?>
				<div class="usluga-select">
					<form>
						<span>Услуга:</span>
						<select id="portfolio_usluga">
							<option value="0">Все услуги</option>
							<option value="1">строительная экспертиза</option>
							<option value="2">технический надзор</option>
						</select>
					</form>
				</div>
				
				<?php
				
				
			

?>
				
				<p class="numb-res"><b>Найдено:</b> <span id="count_objects"><?=$count_objects;?></span></p>
			</div>
		</div>
		<div class="wrap-map">
			<div id="my-map"></div>
		</div>
	</section>

	<section class="sect7 port-sect2">
		<div id="portfolio_result" class="container">

		<?php
		
		
list($pagertop, $pagerbottom, $limit) = pager(6, $count_objects,  "/portfolio/");

$arSelect = array(
'ID',
    'NAME',       
    'PROPERTY_ONE',
	 'PROPERTY_TWO',
	  'PROPERTY_THREE',
	   'PROPERTY_SEVEN',
	   'PREVIEW_PICTURE',
	   'DETAIL_PAGE_URL',
	   'PREVIEW_PICTURE',
);

$numpage = (int) $_GET['page'];

if(empty($numpage)) {
	$numpage = 1;
}


$rsElement = CIBlockElement::GetList( array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => array(9, 2)), false,Array("nPageSize"=> 6, "iNumPage" => $numpage), $arSelect );
 
echo $pagertop . '<div class="wrap-items">';

while( $row = $rsElement->GetNext()){
	

$img_obj = CFile::ResizeImageGet($row['PREVIEW_PICTURE'], array('width'=>310, 'height'=>253), BX_RESIZE_IMAGE_EXACT, true);
$obj['IMAGE'] = $img_obj['src'];

echo '<div class="item">
					<a href="' . $row['DETAIL_PAGE_URL'] . '" class="wrap-img"><img src="' . $obj['IMAGE'] . '" alt="' . $row['NAME'] . '"></a>
					<div class="right-part">
						<a href="' . $row['DETAIL_PAGE_URL'] . '"><div>' . $row['NAME'] . '</div></a>
						<div class="left">
							<p>Задача:</p>
							<p>Оценка технического состояния и определение несущей способности несущих конструкций.</p>
						</div>
						<div class="right">
							<p>Решение:</p>
							<p>Выполнено визуально-инструментальное обследование с последующим поверочным расчетом несущей способности конструкции в программе SCAD.</p>
							<ul>
								<li>Подготовлен отчет о выявленных дефектах несущих конструкции объекта экспертизы и о результатах инструментальнои оценки.</li>
								<li>Даны рекомендации для восстановления утраченных эксплуатационных качеств строительных конструкции здания.</li>
							</ul>
						</div>
					</div>
					
					
					
					<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
				</div>';

				}	
				
?>
</div>
		
		<div class="wrap-btn">
				<div id="loading_two"><a onclick="return false;" class="to-portfolio" id="load">Показать еще</a></div>

				<?=$pagertop;?> 
			</div>
			
			</div>
			
	
			
		
		<span id="numpage" style="display:none;">1</span>
		
	</section>

		
<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_popular.php");?>

<?php } else { ?>

<?$APPLICATION->IncludeComponent("bitrix:catalog", "portfolio", array(
	"IBLOCK_TYPE" => "objects",
	"IBLOCK_ID" => "1",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/portfolio/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"USE_ELEMENT_COUNTER" => "Y",
	"USE_FILTER" => "N",
	"USE_COMPARE" => "N",
	"PRICE_CODE" => array(
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"SHOW_TOP_ELEMENTS" => "Y",
	"TOP_ELEMENT_COUNT" => "9",
	"TOP_LINE_ELEMENT_COUNT" => "3",
	"TOP_ELEMENT_SORT_FIELD" => "sort",
	"TOP_ELEMENT_SORT_ORDER" => "asc",
	"TOP_ELEMENT_SORT_FIELD2" => "id",
	"TOP_ELEMENT_SORT_ORDER2" => "desc",
	"TOP_PROPERTY_CODE" => array(
		0 => "OPIS_2",
		1 => "OPIS_4",
		2 => "OPIS_1",
		3 => "OPIS_3",
		4 => "OPIS_5",
		5 => "",
	),
	"SECTION_COUNT_ELEMENTS" => "Y",
	"SECTION_TOP_DEPTH" => "2",
	"PAGE_ELEMENT_COUNT" => "5",
	"LINE_ELEMENT_COUNT" => "3",
	"ELEMENT_SORT_FIELD" => "DATE_ACTIVE_FROM",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"LIST_PROPERTY_CODE" => array(
		0 => "SITE_URL",
		1 => "OPIS_2",
		2 => "OPIS_4",
		3 => "OPIS_1",
		4 => "OPIS_3",
		5 => "OPIS_5",
		6 => "",
	),
	"INCLUDE_SUBSECTIONS" => "Y",
	"LIST_META_KEYWORDS" => "-",
	"LIST_META_DESCRIPTION" => "-",
	"LIST_BROWSER_TITLE" => "-",
	"DETAIL_PROPERTY_CODE" => array(
		0 => "OPIS_2",
		1 => "OPIS_4",
		2 => "OPIS_1",
		3 => "DESCRIPTION",
		4 => "OPIS_3",
		5 => "OPIS_5",
		6 => "",
	),
	"DETAIL_META_KEYWORDS" => "-",
	"DETAIL_META_DESCRIPTION" => "-",
	"DETAIL_BROWSER_TITLE" => "-",
	"LINK_IBLOCK_TYPE" => "",
	"LINK_IBLOCK_ID" => "",
	"LINK_PROPERTY_SID" => "",
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
	"USE_STORE" => "N",
	"PAGER_TEMPLATE" => "modern",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Объекты",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"sections" => "",
		"section" => "#SECTION_CODE#/",
		"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		"compare" => "compare.php?action=#ACTION_CODE#",
	),
	"VARIABLE_ALIASES" => array(
		"compare" => array(
			"ACTION_CODE" => "action",
		),
	)
	),
	false
);?> 

<?php } ?>
	
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>