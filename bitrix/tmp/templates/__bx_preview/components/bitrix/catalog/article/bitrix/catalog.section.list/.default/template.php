<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
foreach($arResult["SECTIONS"] as $arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	//print_r ($arSection);
	$file = CFile::ResizeImageGet($arSection[PICTURE][ID], array('width'=>301, 'height'=>301), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	?>
	<div class="object">
                	<div class="object-image">                    	
			    <a href="<?=$arSection[SECTION_PAGE_URL]?>">
                            <img src="<?=$file['src']?>" width="301" height="198" alt="" />
                            <span class="corners clt"></span>
                            <span class="corners crt"></span>
                            <span class="corners crb"></span>
                            <span class="corners clb"></span>
                        </a>
                    </div>
                	<div class="object-text">
				<h3><?=$arSection[NAME]?></h3>
                       		<p><?=$arSection['~DESCRIPTION']?></p>      
                    </div>
		    <div class="clear"></div>		  
                    <div class="c"></div>
                </div>
<?endforeach;?>
