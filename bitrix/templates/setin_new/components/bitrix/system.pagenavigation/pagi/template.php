<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
//!todo добавить финальную страницу

?>
<?if ($arResult["NavPageCount"] > 1):?>
	<div class="pagination">
		<a href="<?=$arResult["NAV"]["URL"]["PREV_PAGE"]?>" class="prev"></a>
		<?for ($PAGE_NUMBER=$arResult["NAV"]["START_PAGE"]; $PAGE_NUMBER<=$arResult["NAV"]["END_PAGE"]; $PAGE_NUMBER++):?>
			<?if ($PAGE_NUMBER == $arResult["NAV"]["PAGE_NUMBER"]):?>
				<span class="active"><?=$PAGE_NUMBER?></span>
			<?else:?>
				   <?if($PAGE_NUMBER==1):?>
                    <a href="<?=$arResult["NAV"]["nav_filename"]?>">
                        <?=$PAGE_NUMBER?>
                    </a>
                   <?else:?>
                       <a href="<?=$arResult["NAV"]["URL"]["SOME_PAGE"][$PAGE_NUMBER]?>">
                            <?=$PAGE_NUMBER?>
                       </a>
                   <?endif;?>

		
			<?endif;?>
		<?endfor;?>
        <?
//        var_dump($PAGE_NUMBER);
//        if($arResult["NAV"]["PAGE_NUMBER"]<$arResult["NavPageCount"]):?>
<!--		    <a href="--><?//=$arResult["NAV"]["URL"]["NEXT_PAGE"]?><!--" class="next"> след</a>-->
<!--        --><?//endif;?>
	</div>
<?endif;?>