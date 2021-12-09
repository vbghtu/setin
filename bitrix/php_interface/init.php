<?

function myGetProperty($property_id, $default_value=false) 
{ 
    global $APPLICATION; 
        return $APPLICATION->AddBufferContent(Array(&$APPLICATION, "GetProperty"), $property_id, $default_value);
}

function optimize($buffer) {
	
$search = array('/\>[^\S ]+/su', '/[^\S ]+\</su', '/(\s)+/su');
$replace = array('>', '<', '\\1');
$buffer = preg_replace($search, $replace, $buffer);
     $buffer = str_replace("http://seitn", "https://seitn", $buffer);
return $buffer;

}

function pager($rpp, $count, $href, $opts = array()) {
	$pages = ceil($count / $rpp);
	if (!isset($opts['lastpagedefault']))
		$pagedefault = 0;
	else {
		$pagedefault = floor(($count - 1) / $rpp);
		if ($pagedefault < 0)
			$pagedefault = 0;
	}
	if (isset($_GET['page'])) {
		$page = 0 + (int) $_GET['page'];
		if ($page < 0)
			$page = $pagedefault;
	}
	else
		$page = $pagedefault;
	$pager = "<div class=\"wrap-paginate\">";
	$pager2 = "";
	$bregs = "";
	$mp = $pages - 1;

	if ($count) {
		$pagerarr = array();
		$dotted = 0;
		$dotspace = 2;
		$dotend = $pages - $dotspace;
		$curdotend = $page - $dotspace;
		$curdotstart = $page + $dotspace;
		for ($i = 0; $i < $pages; $i++) {
			if (($i >= $dotspace && $i <= $curdotend) || ($i >= $curdotstart && $i < $dotend)) {
				if (!$dotted)
				   $pagerarr[] = "<span class=\"item-pag\">...</span>";
				$dotted = 1;
				continue;
			}
			$dotted = 0;
			$start = $i * $rpp + 1;
			$end = $start + $rpp - 1;
			if ($end > $count)
				$end = $count;
			 $text = $i+1;
			if ($i != $page)
				$pagerarr[] = "<a title=\"$i\" href=\"" . $href . (!empty($i) ? "?page=" . $i : "") . "\"  onclick=\"return false\" class=\"item-pag\">$text</a>";
			else
				$pagerarr[] = "<a class=\"item-pag active\">$text</a>";
				  }
		$pagerstr = join("", $pagerarr);
		$pagertop = "$pager $pagerstr $pager2</div>";
	}
	else {
		$pagertop = $pager;
		$pagerbottom = $pagertop;
	}
	$start = $page * $rpp;
	return array($pagertop, $pagerbottom, "LIMIT $start,$rpp");
}

AddEventHandler("main", "OnEndBufferContent", "optimize");

AddEventHandler('main', 'OnEpilog', '_Check404Error',1);
function _Check404Error()
{
   if (defined("ERROR_404") && ERROR_404=="Y")
   {
      global $APPLICATION;
      $APPLICATION->RestartBuffer();
      include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php";
      require ($_SERVER["DOCUMENT_ROOT"]."/404.php");
      include $_SERVER['DOCUMENT_ROOT']."/bitrix/templates/".SITE_TEMPLATE_ID."/footer.php"; 
   }
}

/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/

// ������������ ����������

	/*AddEventHandler( 'iblock', 'OnAfterIBlockElementAdd', 'SendEmail' );

	function SendEmail( &$arFields ) {

		if( $arFields[ 'IBLOCK_ID' ] == 3 ) :
			$arIBlockElement = GetIBlockElement($arFields["ID"]);
			$arSend = array('TEXT' => '<b>���:</b> '.$arFields['NAME'].'<br/><b>��������: </b>'.$arIBlockElement['PROPERTIES']['COMPANY']['VALUE'].'<br/><b>����������� �����: </b>'.$arIBlockElement['PROPERTIES']['EMAIL']['VALUE'].'<br/><b>���������: </b>'.$arIBlockElement['PROPERTIES']['STATUS']['VALUE'].'<br/><b>�������: </b>'.$arIBlockElement['PROPERTIES']['TELE']['VALUE'].'<br/><b>���������: </b>'.$arIBlockElement['PROPERTIES']['MESS']['VALUE']);

			CEvent::Send( 'ORDER_NEW', SITE_ID, $arSend, N);

		endif;

		}*/
?>