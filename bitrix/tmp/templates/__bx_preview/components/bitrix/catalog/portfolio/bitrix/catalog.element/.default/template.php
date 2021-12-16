<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
		CModule::IncludeModule("iblock");
		$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
		$arFilter = Array("IBLOCK_ID"=> 1, "SECTION_ID"=> $arResult[SECTION][ID], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array("date_active_from"=>"desc"), $arFilter, false, Array("nPageSize"=>1000), $arSelect);
		while($ob = $res->GetNextElement())
		{
		  $arFields = $ob->GetFields();
		  //print_r($arFields);											
			
			$arNew[$arFields[ID]] = array ( 
			'ID' => $arFields[ID],
			'NAME' => $arFields[NAME],
			'URL' => $arFields[DETAIL_PAGE_URL],
			);
		  }
		  $id_start = '';
		   //print_r ($arNew);
		  
		  foreach($arNew as $arElement):
		  
			if ($id_start == ''){
			  $id_start = $arElement[ID];
			};
			if ($ii == 1) {
			  $id_next = $arElement[ID];
			  $ii = ''; 
			};
			if ($arElement[ID] == $arResult[ID]) {
			   $ii = 1;
			   $bb = 1;
			  };
			if ($bb == 1) {
				$id_prew = $id_stek;
				$bb = 0;
			};
		 $id_stek = $arElement[ID];
		  endforeach;
		  if ($id_next == '') {
			  $id_next = $id_start;
			  };
		 if ($id_prew == '') {
			  $id_prew = $id_stek;
			  };
$file = CFile::ResizeImageGet($arResult[PREVIEW_PICTURE][ID], array('width'=>301, 'height'=>301), BX_RESIZE_IMAGE_PROPORTIONAL, true);
$file_pr_big = CFile::ResizeImageGet($arResult[PREVIEW_PICTURE][ID], array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>

<div class="category fL w">
	<div class="item fL w">
		<div class="images fL">
			<a href="<?=$file_pr_big[src]?>" rel="example_group"><img src="<?=$file[src]?>" class="preview fL" width="301" height="228" alt="" /></a>
			<div class="previews fL w">

			<?if (!empty($arResult[PROPERTIES][PHOTO_ALL][VALUE])){?>			 
				<?foreach ($arResult[PROPERTIES][PHOTO_ALL][VALUE] as $value){
					$file_small = CFile::ResizeImageGet($value, array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					$file_big = CFile::ResizeImageGet($value, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				?>

                    <a href="<?=$file_big[src]?>" rel="example_group">
                        <img src="<?=$file_small[src]?>" width="94" height="72" alt="" />                    
                    </a>	

				<?}?>

			<?}?>

			</div>
		</div>

		<div class="descr fL">
			<? if ($arResult[DISPLAY_PROPERTIES][OPIS_2]["VALUE"]){
                echo ('<span class="field fL"><span class="title">'.$arResult[DISPLAY_PROPERTIES][OPIS_2][NAME].':</span> '.$arResult[DISPLAY_PROPERTIES][OPIS_2]["~VALUE"].'</span>');
            }?>
            <? if ($arResult[DISPLAY_PROPERTIES][OPIS_1]["VALUE"]){
                echo ('<span class="field fL"><span class="title">'.$arResult[DISPLAY_PROPERTIES][OPIS_1][NAME].':</span> '.$arResult[DISPLAY_PROPERTIES][OPIS_1]["~VALUE"].'</span>');
            }?>                       
            <? if ($arResult[DISPLAY_PROPERTIES][OPIS_4]["VALUE"]){
                echo ('<span class="field fL"><span class="title">'.$arResult[DISPLAY_PROPERTIES][OPIS_4][NAME].':</span> '.$arResult[DISPLAY_PROPERTIES][OPIS_4]["~VALUE"].'</span>');
            }?>

			<? if ($arResult[DISPLAY_PROPERTIES][OPIS_3]["VALUE"]){
                 echo ('<div class="problem fL"><span class="field fL"><span class="title">'.$arResult[DISPLAY_PROPERTIES][OPIS_3][NAME].':</span> '.$arResult[DISPLAY_PROPERTIES][OPIS_3]["~VALUE"].'</span></div>');
            }?>
           
            <? if ($arResult[PROPERTIES][ZIP_LINK][VALUE]){?>
	        	<a href="<?=CFile::GetPath($arResult[PROPERTIES][ZIP_LINK][VALUE])?>" class="download fL">Скачать проект</a>
			<?}?>
		</div>
	</div>
</div>

<div class="category inner_content inner fL w">
	<p>
		Объектом обследования являлся фундамент. Данный фундамент выполнен  ленточным,  монолитным.  Сверху ж/б монолитного фундамента  зафиксирована гидроизоляция.
	</p>
</div>

<div class="inner_content fL w">
	<ol class="colored">
		<?if ($arResult[PROPERTIES][DESCRIPTION]){
		?>
			<?=$arResult[PROPERTIES][DESCRIPTION]["~VALUE"][TEXT]?>       
		<?}?>
	</ol>
</div>	