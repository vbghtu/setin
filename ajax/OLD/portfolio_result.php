<?php

header('Content-Type: text/html; charset=utf-8');

function optimize($buffer) {
	return preg_replace(array("/<!--(?>(?!\[).)(.*)(?>(?!\]).)-->/Uis", "/[[:blank:]]+/"), array(""," "), str_replace(array("\n", "\r", "\t"), "",$buffer));
}

$url = urldecode($_SERVER['REQUEST_URI']);

$cache_file = $_SERVER['DOCUMENT_ROOT'] . "/bitrix/cache/portfolio_result/" . md5($url) . ".html";

if (file_exists($cache_file)) {
		#die(readfile($cache_file));
}	

ob_start();

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$act = htmlspecialchars($_GET['act']);
$page = (int) $_GET['page'] + 1;

$type = (int) $_GET['type'];

if($type == 1) {
	$type_select =  Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => 9);
	$url = "/portfolio/stroitelnaya-ekspertiza/";
} elseif($type == 2) {
	$type_select =  Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => 2);
	$url = "/portfolio/tehnadzor/";
	} elseif($type == 3) {
	$type_select =  Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => 15);
	$url = "/portfolio/cottage-towns/";
} else {
	$type_select =  Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => array(9, 2));
	$url = "/portfolio/";
}

$res = CIBlockElement::GetList(false, $type_select, array('IBLOCK_ID')); 

if ($el = $res->Fetch()) {
	$count_objects = $el['CNT'];
}

switch($act) {
	
case "load" :

CModule::IncludeModule("iblock");

$arSelect = Array("ID", "PROPERTY_FOUR");
 
$res = CIBlockElement::GetList ( array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "SECTION_ID" => array(9, 2)), false, false, $arSelect);

$row = array();

$i_count = 0;

while($row = $res->GetNext()){
	
if(!empty($row['PROPERTY_FOUR_VALUE'])) {
	
$i_count++;

$array_i[$row['ID']] = array("i" => $i_count);

}

}

list($pagertop, $pagerbottom, $limit) = pager(6, $count_objects, $url );

$arSelect = array(
'ID',
    'NAME',       
    'PROPERTY_ONE',
	 'PROPERTY_TWO',
	  'PROPERTY_THREE',
	   'PROPERTY_FOUR',
	   'PREVIEW_PICTURE',
	   'DETAIL_PAGE_URL',
);
            
$rsElement = CIBlockElement::GetList( array("ID" => "DESC"), $type_select, false,Array("nPageSize"=> 6, "iNumPage" => $page), $arSelect );
 


while( $row = $rsElement->GetNext()){
	

$img_obj = CFile::ResizeImageGet($row['PREVIEW_PICTURE'], array('width'=>310, 'height'=>253), BX_RESIZE_IMAGE_EXACT, true);
$obj['IMAGE'] = $img_obj['src'];
								
					
								
$result_project .= '		<div class="item">
					<a href="' . $row['DETAIL_PAGE_URL'] . '" class="wrap-img"><img src="' . $obj['IMAGE']  . '" alt="' . $row['NAME'] . '"></a>
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



	print_r(
	json_encode(
			array( 
				'html' =>  $result_project,
				'numpage' => $page,
		))
	);
		


break;

case "list" :

CModule::IncludeModule("iblock");

$arSelect = Array("ID", "PROPERTY_FOUR");
 
$res = CIBlockElement::GetList ( array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "!PROPERTY_FOUR"=>false, "SECTION_ID" => array(9, 2)), false, false, $arSelect);

$row = array();

$i_count = 0;

while($row = $res->GetNext()){
	
$i_count++;

$array_i[$row['ID']] = array("i" => $i_count);

}

list($pagertop, $pagerbottom, $limit) = pager(6, $count_objects, $url );

$arSelect = array(
'ID',
    'NAME',       
    'PROPERTY_ONE',
	 'PROPERTY_TWO',
	  'PROPERTY_THREE',
	   'PROPERTY_FOUR',
	   'PREVIEW_PICTURE',
	   'DETAIL_PAGE_URL',
);
            
$rsElement = CIBlockElement::GetList( array("ID" => "DESC"), $type_select, false,Array("nPageSize"=> 6, "iNumPage" => $page), $arSelect );
 


while( $row = $rsElement->GetNext()){
	

$img_obj = CFile::ResizeImageGet($row['PREVIEW_PICTURE'], array('width'=>310, 'height'=>253), BX_RESIZE_IMAGE_EXACT, true);
$obj['IMAGE'] = $img_obj['src'];
								
					
								
$result_project .= '		<div class="item">
					<a href="' . $row['DETAIL_PAGE_URL'] . '" class="wrap-img"><img src="' . $obj['IMAGE']  . '" alt="' . $row['NAME'] . '"></a>
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

	print_r(
	json_encode(
			array( 
				'html' => $pagertop . '
			<div class="wrap-items">
				' . $result_project . '
			</div>
			<div class="wrap-btn">
				<div id="loading_two"><a onclick="return false;" class="to-portfolio" id="load">Показать еще</a></div>

				' . $pagertop . '
			</div>',
			
			'count' => $count_objects,
			'numpage' => $page,
		))
	);
										
break;

}

$fp = fopen($cache_file, 'w'); 
fwrite($fp, optimize(ob_get_contents()));
fclose($fp);

ob_end_flush();


?>























