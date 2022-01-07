<?
require_once($_SERVER["DOCUMENT_ROOT"]. "/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("title", "Наши работы");
$APPLICATION->SetPageProperty("description", "Наши работы");

//$page = $APPLICATION->GetCurPage();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
//$APPLICATION->AddChainItem("Наши работы", "/portfolio/");

//while ($ob = $res->GetNextElement()) {
//    $row = $ob->GetFields();
//}
//$page = $APPLICATION->GetCurPage();



//$arSelect = Array("ID", "PROPERTY_SEVEN");
// $res = CIBlockElement::GetList ( array("ID" => "DESC"), Array("IBLOCK_ID" => 1, 'ACTIVE' => 'Y', "!PROPERTY_SEVEN"=>false, "SECTION_ID" => array(2)), false, false, $arSelect);
//$row = array();
//$i_count = 0;
//while($row = $res->GetNext()){
//	$i_count++;
//    $array_i[$row['ID']] = array("i" => $i_count);
//}
//var_dump($res);
//exit;

?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/section/section_default_h.php"); ?>
<?//require($_SERVER["DOCUMENT_ROOT"]."/section/section_popular.php");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/section/section_clients.php");?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>