<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$file = CFile::ResizeImageGet($arResult['DISPLAY_PROPERTIES']['KART_PHOTO']['VALUE'], array('width'=>302, 'height'=>222), BX_RESIZE_IMAGE_PROPORTIONAL, true);
// print_r($arResult);die();
?>
<div class="inner_content fL">
	<h1><?=$arResult['NAME']?></h1>
</div>

<div class="triggers fL w">
	<a href="#" id="cart" class="active">Карточка проекта</a>
	<!--<a href="#" id="fasad">Фасады</a>-->
	<a href="#" id="plan">Планировка</a>
	<a href="#" id="complection" >Комплектация</a>
</div>

<div class="products_blocks fL w">

	<div id="cart_block" class="product_cart active fL w fasad">
		<!--<div class="head fL w">
			<a href="<?=$arResult['DISPLAY_PROPERTIES']['KART_PHOTO']['FILE_VALUE']['SRC']?>" class="fancybox" rel="example_group"><img src="<?=$file[src]?>" class="preview fL" width="402"  alt="" /></a>

			<div class="chars inner_content fR" style="width:296px">
				<table>
					<?foreach ($arResult['DISPLAY_PROPERTIES']['KART_ATTR']['VALUE'] as $key => $attribute): ?>
						<tr>
							<td>
								<?php echo $arResult['DISPLAY_PROPERTIES']['KART_ATTR']['~VALUE'][$key] ?>
							</td>
							<td>
								<?php echo $arResult['DISPLAY_PROPERTIES']['KART_ATTR']['DESCRIPTION'][$key] ?>
							</td>
						</tr>
					<?endforeach;?>
				</table>

			</div>
            <div class="price_block fL" style="padding-top:10px">
                    <?=$arResult['DISPLAY_PROPERTIES']['PRICE_BLOCK']["DISPLAY_VALUE"]?>
					<?/*<span class="old_price fL"><?=$arResult['DISPLAY_PROPERTIES']['OLD_PRICE']['VALUE']?></span>
					<span class="price fL"><?=$arResult['DISPLAY_PROPERTIES']['NEW_PRICE']['VALUE']?></span>*/?>
				</div>
		</div>
		<div class="inner_content fL w" style="font-size: 14px;">
			<p >
				<?=$arResult['DISPLAY_PROPERTIES']['KART_DESCRIPTION']['~VALUE']['TEXT']?>
			</p>
		</div>-->

        <a href="<?=$arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'][0]['SRC']?>" rel="example_group_fasad1" class="main_img_a1 fL fancybox" style="display:block;position:relative">
				<img src="<?=$arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'][0]['SRC']?>" class="main_img mim1 fL" alt="" width="550"  />
                <img src="/images/lupa.png" style="position:absolute;right:10px;bottom:10px;display:none" class="lupa" />
			</a>
            <?foreach ($arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'] as $key => $fasadphoto): if ($key == 0) continue;?>
            <a href="<?=$fasadphoto['SRC']?>" class="fancybox" rel="example_group_fasad1" style="display:none;">
				<img src="<?=$fasadphoto['SRC']?>"  />
			</a>
            <?endforeach;?>

        <script>
            $('.main_img_a1').hover(function(){$(this).find('.lupa').show();}, function(){$(this).find('.lupa').hide();});
        </script>

		<div class="previews fR" style="width:150px">

			<?foreach ($arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'] as $fasadphoto): ?>

			<a href="<?=$fasadphoto['SRC']?>" class="fL fbx1 fancybox" rel="example_group_fasad_preview1" style="display:block;float:none;width:138px;">
				<img width="138" src="<?=$fasadphoto['SRC']?>" class="fR smi1" alt=""  />
			</a>
            <div style="clear:both;height:5px"></div>
			<?endforeach;?>
		</div>

        <div class="chars inner_content fR" style="clear:left;padding:10px 0; font-size:11pt">
				<table>
					<?foreach ($arResult['DISPLAY_PROPERTIES']['KART_ATTR']['VALUE'] as $key => $attribute): ?>
						<tr>
							<td>
								<?php echo $arResult['DISPLAY_PROPERTIES']['KART_ATTR']['~VALUE'][$key] ?>
							</td>
							<td>
								<?php echo $arResult['DISPLAY_PROPERTIES']['KART_ATTR']['DESCRIPTION'][$key] ?>
							</td>
						</tr>
					<?endforeach;?>
				</table>

			</div>
            <div class="price_block fL">
                    <?=$arResult['DISPLAY_PROPERTIES']['PRICE_BLOCK']["DISPLAY_VALUE"]?>
					<?/*<span class="old_price fL"><?=$arResult['DISPLAY_PROPERTIES']['OLD_PRICE']['VALUE']?></span>
					<span class="price fL"><?=$arResult['DISPLAY_PROPERTIES']['NEW_PRICE']['VALUE']?></span>*/?>
				</div>

        <div class="inner_content fL w" style="font-size: 14px;">
			<p >
				<?=$arResult['DISPLAY_PROPERTIES']['KART_DESCRIPTION']['~VALUE']['TEXT']?>
			</p>
		</div>

	</div>

	<div id="fasad_block" class="fasad">
		
			<a href="<?=$arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'][0]['SRC']?>" rel="example_group_fasad" class="main_img_a1 fL fancybox">
				<img src="<?=$arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'][0]['SRC']?>" class="main_img mim1 fL" alt="" width="402" />
			</a>
            <?foreach ($arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'] as $key => $fasadphoto): if ($key == 0) continue;?>
            <a href="<?=$fasadphoto['SRC']?>" class="fancybox" rel="example_group_fasad" style="display:none;">
				<img src="<?=$fasadphoto['SRC']?>"  />
			</a>
            <?endforeach;?>
		
		<div class="previews fR">
			<?foreach ($arResult['DISPLAY_PROPERTIES']['FASAD_PHOTO']['FILE_VALUE'] as $fasadphoto): ?>
			
			<a href="<?=$fasadphoto['SRC']?>" class="fL fbx1 fancybox" rel="example_group_fasad_preview" style="display:block;float:none;width:138px;">
				<img width="138" src="<?=$fasadphoto['SRC']?>" class="fR smi1" alt=""  />
			</a>
            <div style="clear:both;height:5px"></div>
			<?endforeach;?>
		</div>
	</div>

	<div id="plan_block" class="fasad">
        <span class="main_img_a2 fL">
		<?/*<a href="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]?>" rel="example_group_plan" class="main_img_a2 fL">?>
			<img id="zoom_plan" src="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['SMALL']["src"]?>" data-zoom-image="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['LARGE']?>" class="main_img mim2 fL" alt=""
                width="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['SMALL']["width"]?>"
                height="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['SMALL']["height"]?>"

                />
		<?/*</a>*/?>

       <?$hb = floor($arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['SMALL']["height"] / 2) - 6;?>
        <a href="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['LARGE']?>" rel="example_group_plan" class="main_img_a2 fL fancybox">
			<img src="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['SMALL']["src"]?>" data-zoom-image="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['LARGE']?>" class="main_img mim2 fL" alt=""
                width="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['SMALL']["width"]?>"
                height="<?=$arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'][0]['PHOTO'][1]['SMALL']["height"]?>"

                />
		</a>

        <?foreach ($arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'] as $photo): ?>
            <?foreach($photo['PHOTO'] as $key=>$pic): if ($key == 1) continue;?>

                <a href="<?=$pic['LARGE']?>" class="fancybox" rel="example_group_plan" style="display:none">
						<img src="<?=$pic['LARGE']?>" alt=""/>
					</a>
            <?endforeach;?>
        <?endforeach;?>
        </span>
		<div class="previews fR">
			
			<div id="gallery_plan" class="plan_floor fL">

				<?foreach ($arResult['DISPLAY_PROPERTIES']['PLAN_PHOTO']['PROP'] as $photo): ?>
					<?/*<div class="titles fL w">
						<span><?=$photo['FLOOR']?></span>
					</div>*/?>

					<?foreach($photo['PHOTO'] as $pic): ?>
                        <?$previewPic = CFile::ResizeImageGet($pic, array('width'=>400, 'height'=>320), BX_RESIZE_IMAGE_EXACT, true);?>
					<!--<a href="<?=$pic['LARGE']?>" data-image="<?=$pic['SMALL']["src"]?>" data-zoom-image="<?=$pic['LARGE']?>" class="fL <?/*fancybox*/?>" rel="example_group_plan_preview">-->
                    <a href="<?=$pic['LARGE']?>" class="fL fancybox" rel="example_group_plan_preview">
						<img src="<?=$pic['THUMB']["src"]?>" class="fR smi2" style="height:<?=$hb?>px" alt=""/>
					</a>
					<?endforeach;?>
				<?endforeach;?>		

			</div>

            <?/*
			<div class="inner_content fL w">
				<?foreach ($arResult['DISPLAY_PROPERTIES']['PLAN_ATTR']['VALUE'] as $key => $attribute): ?>
					<p>
						
						<?php echo $arResult['DISPLAY_PROPERTIES']['PLAN_ATTR']['VALUE'][$key] ?>
						....................
						<?php echo $arResult['DISPLAY_PROPERTIES']['PLAN_ATTR']['DESCRIPTION'][$key] ?>
						
					</p>		
				<?endforeach;?>			
			</div>
             */?>
		</div>
	</div>

	<div id="complection_block" class="inner_content w fL">
		<table style="font-size:11pt;">

		<?foreach ($arResult['DISPLAY_PROPERTIES']['COMPLECT_ATTR']['VALUE'] as $key => $attribute): ?>
			<tr>
				<td>
					<?php echo $arResult['DISPLAY_PROPERTIES']['COMPLECT_ATTR']['VALUE'][$key] ?>
				</td>
				<td>
					<?php echo $arResult['DISPLAY_PROPERTIES']['COMPLECT_ATTR']['DESCRIPTION'][$key] ?>
				</td>
			</tr>
		<?endforeach;?>
		
		</table><br><br>
        <?=$arResult['DISPLAY_PROPERTIES']['PRICE_BLOCK']["DISPLAY_VALUE"]?><br><br>
	</div>
	
</div>
