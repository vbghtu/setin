<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

	<section class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="/">Главная</a>
					<span> / </span>
					<a href="/review/">Рекомендательные письма</a>
					<span> / </span>
					<span>Рекомендательное письмо от <?=$arResult['NAME'];?></span>
				</div>
			</div>
		</div>
	</section>

<section class="stat-sect1">
		<div class="container"> 
						
<h1>Рекомендательное письмо от <?=$arResult['NAME'];?></h1>
								  
<div class="row"><div class="col-md-12">		  
		  								  
								  
<?if ($arResult["PREVIEW_PICTURE"]["SRC"]):?>
<p><img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>" /></p>
<?endif?>

<h2><?=$arResult['NAME'];?></h2> <br />

<p><?=$arResult["DETAIL_TEXT"];?></p>



 	</div>	</div>
</div></section>