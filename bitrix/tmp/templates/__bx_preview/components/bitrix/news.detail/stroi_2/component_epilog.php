<?$tit='Строительство и проектирование: '.$arResult['NAME'].' цена '.$arResult['PROPERTIES']["NEW_PRICE"]["VALUE"]?>
<?$APPLICATION->SetPageProperty("title", $tit);?>

<?

 $matches=explode('.', $arResult['PROPERTIES']['KART_DESCRIPTION']['VALUE']['TEXT'], 2);
//print_r($matches);
$text= preg_replace('/[^а-яА-Я0-9-.,\s]/ui','',$matches[0]);
//$text=strip_tags($matches[0]);
//$text=$matches[0];
//$text=strip_tags($text);
//$text=htmlspecialchars_decode($text);
?>
<?$pl=$arResult['PROPERTIES']["KVM"]["VALUE"]?>
<?$gb=$arResult['PROPERTIES']["KART_ATTR"]["VALUE"]['0']?>
<?$pr=$arResult['PROPERTIES']["NEW_PRICE"]["VALUE"]?>

<?$dsc=$text.' Общая площадь '.$pl.' м2, '.$gb.' цена '.$pr?>
<?$APPLICATION->SetPageProperty("description", $dsc);?>