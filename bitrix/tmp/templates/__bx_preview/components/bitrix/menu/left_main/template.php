<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<?
foreach($arResult as $arItem):
?>


	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

    <?$arItem["TEXT"] = str_replace("#%#", '<span style="color:red">%</span>', $arItem["TEXT"]);?>

	<?if ($arItem["IS_PARENT"]):?>
		<li>
					<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
					<?if($arItem["SELECTED"]){?>
					<ul>
					<?}else{?>
					<ul style="display:none;">
					<?}?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>
					<?if($arItem["SELECTED"]){?>
		<li class="active"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?}else{?>
		<li>
					<?if ($arItem["LINK"] == "/stroitelstvo/"):?><a href="<?=$arItem["LINK"]?>"><b><?=$arItem["TEXT"]?></b></a><?else:?><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><?endif?>
				</li>
		<?}?>
		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>
<?endif?>
