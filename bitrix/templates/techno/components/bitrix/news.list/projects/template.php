<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="our_projects_wrapper fL w">
    <div class="projects_block fL">
    <?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item" style="min-height:325px; display:inline-block;vertical-align:top; border: solid 2px #c8c8c8;padding:10px;border-radius: 8px;margin-right:12px" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <a style="text-decoration:none;" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
            <?if (is_array($arItem["PREVIEW_PICTURE"])):?>
            <img
                class="preview"
                border="0"
                src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                style="float:left"
                />
            <?endif;?>
            <span class="title" style="display: block; text-align: center;"><?echo $arItem["NAME"]?></span>
        </a>

        <?if ($arItem["DISPLAY_PROPERTIES"]["KVM"]['DISPLAY_VALUE']):?><span style="display:block;color:#0975e9;text-align:center;padding-bottom:5px"><b><?=$arItem["DISPLAY_PROPERTIES"]["KVM"]['DISPLAY_VALUE']?> м²</b></span><?endif?>

        <span class="price fL"><?=$arItem["DISPLAY_PROPERTIES"]["NEW_PRICE"]['DISPLAY_VALUE']?></span>


        <span class="anons fL"><?=$arItem["DISPLAY_PROPERTIES"]["KART_SMALL_DESCRIPTION"]['DISPLAY_VALUE']?></span>


	</div>
<?endforeach;?>
</div>

<script>
    $('.item').hover(function(){$(this).css('border-color', '#696969');}, function(){$(this).css('border-color', '#c8c8c8');});
</script>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
