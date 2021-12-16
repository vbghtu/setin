<?

require_once($_SERVER["DOCUMENT_ROOT"]. "/bitrix/modules/main/include/prolog_before.php");

	CModule::IncludeModule("iblock");
	
		
$res = CIBlockElement::GetList(false, Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => array(15)), array('IBLOCK_ID')); 

if ($el = $res->Fetch()) {
	$count_objects = $el['CNT'];
}

				
$max_page = ceil($count_objects / 6);

$mypage = (int) $_GET['page'];

if($mypage >= $max_page) {
	
	CHTTP::SetStatus("404 Not Found"); 
	@define("ERROR_404","Y");

require_once($_SERVER["DOCUMENT_ROOT"]."/404.php");

die;

}
	
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$page = $APPLICATION->GetCurPage();

	

$arSelect = Array("ID", "PROPERTY_SEVEN");
 
$res = CIBlockElement::GetList ( array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "!PROPERTY_SEVEN"=>false, "SECTION_ID" => array(15)), false, false, $arSelect);

$row = array();

$i_count = 0;

while($row = $res->GetNext()){
	
$i_count++;

$array_i[$row['ID']] = array("i" => $i_count);

}


if(!empty($mypage)) {
	$APPLICATION->SetPageProperty("title", "Коттеджные посёлки – примеры работ компании СтройЭкспертНадзор - страница №" . ($mypage + 1));
	$h1 = '<h1 class="title">Коттеджные посёлки - примеры работ - страница №' . ($mypage + 1) . '</h1>';
	$sum_prev = $mypage - 1;
	$prev = ((!empty($sum_prev)) ? '<link rel="prev" href="http://seitn.ru' . $page. '?page=' . $sum_prev . '">' : '<link rel="prev" href="http://seitn.ru' . $page. '">');
	$sum_next = $mypage + 1;
	$next = (($sum_next < $max_page) ? '<link rel="next" href="http://seitn.ru' . $page. '?page=' . $sum_next . '">' : "");
} elseif(empty($mypage)) {
	$APPLICATION->SetPageProperty("title", "Коттеджные посёлки – примеры работ компании СтройЭкспертНадзор");
	$APPLICATION->SetPageProperty("description", "Портфолио компании СтройЭкспертНадзор в области Коттеджные посёлки с подробным описанием объектов и фото.");
	$prev = "";
	$h1 = '<h1 class="title">Коттеджные посёлки - примеры работ</h1>';
	$sum_next = $mypage + 1;
	$next = '<link rel="next" href="http://seitn.ru' . $page. '?page=1">';
}

$APPLICATION->SetPageProperty("next", $next);
$APPLICATION->SetPageProperty("prev", $prev);


?>


<section class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="/">Главная</a>
					<span>/</span>
					<a href="/portfolio/">Портфолио</a>
					<span>/</span>
					<span>Коттеджные посёлки</span>
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
		
		<div id="portfolio_usluga" style="display:none;">3</div>
				
				<?php
			
?>
	
			</div>
		</div>
		<div class="wrap-map">
			<div id="my-map"></div>
		</div>
	</section>

	<section class="sect7 port-sect2">
		<div id="portfolio_result" class="container">

		<?php
		

list($pagertop, $pagerbottom, $limit) = pager(6, $count_objects , "/portfolio/cottage-towns");

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


$numpage = $numpage + 1;

$rsElement = CIBlockElement::GetList( array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => array(15)), false,Array("nPageSize"=> 6, "iNumPage" => $numpage), $arSelect );
 
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
					
					
					
					<div class="show-on-map" onclick="showOnMap(' . ($array_i[$row['ID']]['i'] - 1) . ');">Показать на карте</div>
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
	
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>