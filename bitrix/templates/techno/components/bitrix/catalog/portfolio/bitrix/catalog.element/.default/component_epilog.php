<?$adr=$arResult['PROPERTIES']["OPIS_2"]["VALUE"]?>
<?$vid=$arResult['PROPERTIES']["OPIS_4"]["VALUE"]?>
<?$razd=$arResult['SECTION']["NAME"]?>


<?if($adr):?>
<?$tit=$razd.': '.$adr?>
<?else:?>
<?$tit=$razd.': '.$arResult["NAME"]?>
<?endif?>

<?if($vid):?>
<?$dsc='Вид экспертизы: '.$vid?>
<?else:?>
<?$dsc=$arResult["NAME"].': '.$adr?>
<?endif?>

<?$APPLICATION->SetPageProperty("description", $dsc);?>
<?$APPLICATION->SetPageProperty("title", $tit);?>