<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? foreach($arResult["ITEMS"] as $arItem): ?>

    <div class="">
        <a href="/polezno/<?=$arItem['CODE'];?>/"><?=$arItem['NAME'];?></a>
        <p><?=$arItem['PREVIEW_TEXT'];?>...</p>

    </div>





<?endforeach;?>

