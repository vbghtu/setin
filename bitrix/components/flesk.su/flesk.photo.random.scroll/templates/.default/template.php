<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="marqueecontainer" onmouseover="copyspeed=pausespeed" onmouseout="copyspeed=marqueespeed" style="height: <?=$arParams["BLOCK_HEIGHT"]?>px; width: <?=$arParams["BLOCK_WIDTH"]?>px;">
	<div align="center" id="vmarquee" style="position:absolute; width:98%;">
		<?php
		foreach ($arResult as $Result){?>
			<?if(is_array($Result["PICTURE"])):?>
				<a href="<?=$Result["DETAIL_PAGE_URL"]?>"><img border="0" src="<?=$Result["PICTURE"]["SRC"]?>" width="<?=$Result["PICTURE"]["WIDTH"]?>" height="<?=$Result["PICTURE"]["HEIGHT"]?>" alt="<?=$Result["PICTURE"]["ALT"]?>" /></a><br />
			<?endif?>
			<a href="<?=$Result["DETAIL_PAGE_URL"]?>"><?=$Result["NAME"]?></a><br /><br />
		<?}?>
	</div>
</div>