<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

foreach($arResult["SECTIONS"] as $arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	//print_r ($arSection);
	$file = CFile::ResizeImageGet($arSection[PICTURE][ID], array('width'=>181, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	?>
	<div class="item fL">
    	<a href="<?=$arSection[SECTION_PAGE_URL]?>" class="preview fL" >
            <img src="<?=$file['src']?>" />
        </a>
        <div class="title_area fL w">
            <a href="<?=$arSection[SECTION_PAGE_URL]?>" class="title"><?=$arSection[NAME]?></a>
            
        </div>	
    </div>
<?endforeach;?>
