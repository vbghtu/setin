<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if ($arResult["NavPageCount"] > 1):?>
	<div class="pagination fL w">
		<a href="<?=$arResult["NAV"]["URL"]["PREV_PAGE"]?>" class="prev"></a>
		<?for ($PAGE_NUMBER=$arResult["NAV"]["START_PAGE"]; $PAGE_NUMBER<=$arResult["NAV"]["END_PAGE"]; $PAGE_NUMBER++):?>
			<?if ($PAGE_NUMBER == $arResult["NAV"]["PAGE_NUMBER"]):?>
				<a href="#" class="active"><?=$PAGE_NUMBER?></a>
			<?else:?>
				
					<a href="<?=$arResult["NAV"]["URL"]["SOME_PAGE"][$PAGE_NUMBER]?>">
						<?=$PAGE_NUMBER?>
					</a>
		
			<?endif;?>
		<?endfor;?>
		<a href="<?=$arResult["NAV"]["URL"]["NEXT_PAGE"]?>" class="next"></a>	
	</div>
<?endif;?>