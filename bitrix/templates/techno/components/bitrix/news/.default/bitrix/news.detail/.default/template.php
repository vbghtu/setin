<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<section class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="/">Главная</a>
					<span>/</span>
					<a href="/news/">Новости</a>
					<span>/</span>
					<span><?=$arResult['NAME'];?></span>
				</div>
			</div>
		</div>
	</section>
	
	<section class="stat-sect1">
		<div class="container">

<h1><?=$arResult['NAME'];?></h1>

		 <div class="col-sm-12">
		 
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<b><?=$arResult["DISPLAY_ACTIVE_FROM"]?></b><br />
	<?endif;?>

	<p><?=$arResult["DETAIL_TEXT"];?></p>
	
	


<?$data = $arResult["DISPLAY_ACTIVE_FROM"]?>
<?if($arResult["PREVIEW_TEXT"]):
$text=strip_tags($arResult["PREVIEW_TEXT"]);
//$text=htmlspecialchars_decode($text);
$text=mb_substr($text, 0, 150);
else:
$text=strip_tags($arResult["DETAIL_TEXT"]);
//$text=htmlspecialchars_decode($text);
$text=mb_substr($text, 0, 150);
endif;?>


<?$dsc=$data.' '.$text ?>
<?$APPLICATION->SetPageProperty("description", $dsc);?>


