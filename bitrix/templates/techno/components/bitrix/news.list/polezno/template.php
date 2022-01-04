<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? foreach($arResult["ITEMS"] as $arItem): ?>
	
	<div class="newh2"><a href="/polezno/<?=$arItem['CODE'];?>/"><?=$arItem['NAME'];?></a></div>
   <p><?=$arItem['PREVIEW_TEXT'];?>...</p>
          
         <a href="/polezno/<?=$arItem['CODE'];?>/">Прочитать статью полностью</a> 
          <br />

          <br />

          <br />
  
        
 
<?endforeach;?>

