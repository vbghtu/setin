<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

		
	<section class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="/">Главная</a>
					<span>/</span>
					<a href="/oborudovanie/">Оборудование</a>
					<span>/</span>
					<span><?=$arResult["NAME"];?></span>
				</div>
			</div>
		</div>
	</section>
	
	<section class="stat-sect1">


		<div class="container"> 
		
<h1><?=$arResult['NAME'];?> (<?=$arResult["PROPERTIES"]['COUNTRY']['VALUE'];?>)</h1>

		<?
            //$file = CFile::ResizeImageGet($arResult["PROPERTIES"]['PHOTO']['VALUE'], array('width'=>202, 'height'=>242), BX_RESIZE_IMAGE_EXACT, true);
            $file = CFile::ResizeImageGet($arResult["PROPERTIES"]['PHOTO']['VALUE'], array('width'=>402, 'height'=>442), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
        ?>
		<div align="center"><img src="<?=$file['src']?>" alt="<?=$arResult["NAME"]?>" title="для технического контроля"/></div>

		<br />
		
		<p><?=$arResult["DETAIL_TEXT"];?></p>
	

<?$name=$arResult['NAME']?>
<?
 $matches=explode('.', $arResult['DETAIL_TEXT'], 2);
//$text= preg_replace('/[^а-яА-Я0-9-.,\s]/ui', '',$matches[0]);
$text=$matches[0];
$text=strip_tags($text);
$text=htmlspecialchars_decode($text);
?>

<?$tit=$name.' для технического контроля'?>
<?$key='исользование '.$name.' технический контроль'?>
<?$APPLICATION->SetPageProperty("title", "Обзор оборудования: " . $arResult['NAME'] . " | " . $arResult["PROPERTIES"]['MARKA']['VALUE'] . " | " . $arResult["PROPERTIES"]['COUNTRY']['VALUE'] . " | Компания СтройЭкспертНадзор");?>
<?$APPLICATION->SetPageProperty("keywords", $key);?>


