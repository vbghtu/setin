<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/*************************************************************************
	Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 180;

if(!is_array($arParams["IBLOCKS"]))
	$arParams["IBLOCKS"] = array($arParams["IBLOCKS"]);

$arIBlockFilter = array();
foreach($arParams["IBLOCKS"] as $IBLOCK_ID)
{
	$IBLOCK_ID=intval($IBLOCK_ID);
	if($IBLOCK_ID>0)
		$arIBlockFilter[]=$IBLOCK_ID;
}

if(count($arIBlockFilter)<=0)
{
	if(!CModule::IncludeModule("iblock"))
	{
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}
	$rsIBlocks = GetIBlockList($arParams["IBLOCK_TYPE"]);
	if($arIBlock = $rsIBlocks->GetNext())
		$arIBlockFilter[]=$arIBlock["ID"];
}

$PHOTO_TOTAL = intval($arParams["PHOTO_TOTAL"]);
unset($arParams["IBLOCK_TYPE"]);
$arParams["PARENT_SECTION"] = intval($arParams["PARENT_SECTION"]);
$arParams["IBLOCKS"] = $arIBlockFilter;

if(count($arIBlockFilter)>0 && $this->StartResultCache(false, $USER->GetGroups()))
{
	if(!CModule::IncludeModule("iblock"))
	{
		$this->AbortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}
	//SELECT
	$arSelect = array(
		"ID",
		"IBLOCK_ID",
		"CODE",
		"IBLOCK_SECTION_ID",
		"NAME",
		"PREVIEW_PICTURE",
		"DETAIL_PICTURE",
		"DETAIL_PAGE_URL",
	);
	//WHERE
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCKS"],
		"ACTIVE_DATE" => "Y",
		"ACTIVE"=>"Y",
	);
	if($arParams["PARENT_SECTION"]>0)
	{
		$arFilter["SECTION_ID"] = $arParams["PARENT_SECTION"];
		$arFilter["INCLUDE_SUBSECTIONS"] = "Y";
	}
	//ORDER BY
	$arSort = array(
		"RAND"=>"ASC",
	);
	//EXECUTE
	$rsIBlockElement = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
	$rsIBlockElement->SetUrlTemplates($arParams["DETAIL_URL"]);

	$arResult = array();

	while($PHOTO_TOTAL) {
		if($Result = $rsIBlockElement->GetNext())
		{
			$Result["PICTURE"] = CFile::GetFileArray($Result["PREVIEW_PICTURE"]);
			if(!is_array($Result["PICTURE"]))
			$Result["PICTURE"] = CFile::GetFileArray($Result["DETAIL_PICTURE"]);
			$Result["NAME"] = TruncateText($Result["NAME"], $arParams["CHARS_TITLE"]);			
            $arResult[] = $Result;
		}
		else
		{
			$this->AbortResultCache();
		}
		$PHOTO_TOTAL--;
	}
	$this->IncludeComponentTemplate();
}
?>
