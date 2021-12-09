<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($APPLICATION->GetCurPage() != "/news/") {
	CHTTP::SetStatus("404 Not Found"); 
	@define("ERROR_404","Y");
   
	require_once($_SERVER["DOCUMENT_ROOT"]."/404.php");
	
	die;
	
}

?>	
	
<section class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="/">Главная</a>
					<span>/</span>
					<span>Новости</span>
				</div>
			</div>
		</div>
	</section>
	
	<section class="stat-sect1">
		<div class="container">
	
	<h1>Новости</h1>

<?foreach($arResult["ITEMS"] as $arItem):?>

				 <div class="col-sm-12">
					
<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<b><?=$arItem["DISPLAY_ACTIVE_FROM"]?></b>
		<?endif?>
<div class="newsh2"><a href="<?=$arItem['DETAIL_PAGE_URL'];?>" ><?=$arItem['NAME'];?></a></div><br />

   <p><?=$arItem["PREVIEW_TEXT"];?></p>
          
        <p> <a href="<?=$arItem['DETAIL_PAGE_URL'];?>">Читать полностью</a></p>
		 
            </div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>



	</div>
</section>
