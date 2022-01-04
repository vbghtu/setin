<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//print_r ($arResult)?>
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
<div class="project">
                	<div class="project-img">
                    	<div class="project-img-big">	
                        <a href="<?=$file_pr_big[src]?>" rel="example_group">
							<img src="<?=$file[src]?>" width="301" height="198" alt="" />
                        	<span class="corners clt"></span>
                            <span class="corners crt"></span>
                            <span class="corners crb"></span>
                            <span class="corners clb"></span>
						</a>
                        </div>
						<?if (!empty($arResult[PROPERTIES][PHOTO_ALL][VALUE])){?>
						 <ul class="project-list">
							<?foreach ($arResult[PROPERTIES][PHOTO_ALL][VALUE] as $value){
								$file_small = CFile::ResizeImageGet($value, array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
								$file_big = CFile::ResizeImageGet($value, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
							
								<li>
                                <a href="<?=$file_big[src]?>" rel="example_group">
                                    <img src="<?=$file_small[src]?>" width="94" height="61" alt="" />
                                    <span class="corners clt"></span>
                                    <span class="corners crt"></span>
                                    <span class="corners crb"></span>
                                    <span class="corners clb"></span>
                                </a>
                            </li>							
							<?}
							?>
							 </ul>
						<?}?>
                        
                       
                            
                       
                        <div class="c"></div>
                        
                    </div>
                	<div class="overflow">
                    	 <? if ($arResult[DISPLAY_PROPERTIES][OPIS_2]["VALUE"]){
                            echo ('<p><b>'.$arResult[DISPLAY_PROPERTIES][OPIS_2][NAME].':</b> '.$arResult[DISPLAY_PROPERTIES][OPIS_2]["~VALUE"].'</b></p><p>&nbsp;</p>');
                        }?>
                        <? if ($arResult[DISPLAY_PROPERTIES][OPIS_1]["VALUE"]){
                            echo ('<p><b>'.$arResult[DISPLAY_PROPERTIES][OPIS_1][NAME].':</b> '.$arResult[DISPLAY_PROPERTIES][OPIS_1]["~VALUE"].'</b></p><p>&nbsp;</p>');
                        }?>                       
                        <? if ($arResult[DISPLAY_PROPERTIES][OPIS_4]["VALUE"]){
                            echo ('<p><b>'.$arResult[DISPLAY_PROPERTIES][OPIS_4][NAME].':</b> '.$arResult[DISPLAY_PROPERTIES][OPIS_4]["~VALUE"].'</b></p><p>&nbsp;</p>');
                        }?>
                        
                        </div>
                     <div class="clear"></div>
                    <div>
                        
                        
                        <? if ($arResult[DISPLAY_PROPERTIES][OPIS_3]["VALUE"]){
                            echo ('<p><b>'.$arResult[DISPLAY_PROPERTIES][OPIS_3][NAME].':</b> '.$arResult[DISPLAY_PROPERTIES][OPIS_3]["~VALUE"].'</b></p><p>&nbsp;</p>');
                        }?>
                        <? if ($arResult[DISPLAY_PROPERTIES][OPIS_5]["VALUE"]){
                            echo ('<p><b>'.$arResult[DISPLAY_PROPERTIES][OPIS_5][NAME].':</b> '.$arResult[DISPLAY_PROPERTIES][OPIS_5]["~VALUE"].'</b></p><p>&nbsp;</p>');
                        }?>
                        <?if ($arResult[PROPERTIES][DESCRIPTION]) {?>
			    <p><b><?=$arResult[PROPERTIES][DESCRIPTION][NAME]?>:</b> <?=$arResult[PROPERTIES][DESCRIPTION]["~VALUE"][TEXT]?></p>
                            <p>&nbsp;</p>
			<?}?>
                    </div>
                    <div class="clear"></div>
                	<?if ($arNew[$id_prew][URL]){?>
						<a href="<?=$arNew[$id_prew][URL]?>" class="prev-poject">Предыдущий проект</a>
					<?}?>
					<?if ($arNew[$id_next][URL]){?>
						<a href="<?=$arNew[$id_next][URL]?>" class="next-project">Следующий проект</a>
					<?}?>
                    
					<?if ($arResult[PROPERTIES][ZIP_LINK][VALUE]){?>
                    <div class="download-project"><a href="<?=CFile::GetPath($arResult[PROPERTIES][ZIP_LINK][VALUE])?>">Скачать проект</a></div>
					<?}?>
                    <div class="c"></div>
                    <p>&nbsp;</p>
                </div>