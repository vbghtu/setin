<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


foreach ($arResult["ITEMS"] as $key => $arElement)
{

    if(is_array($arElement["DISPLAY_PROPERTIES"]["KART_PHOTO"]["FILE_VALUE"]))
    {

            $arFilter = array("name" => "sharpen", "precision" => 30);

        $arFileTmp = CFile::ResizeImageGet(
            $arElement["DISPLAY_PROPERTIES"]["KART_PHOTO"]["FILE_VALUE"],
            array("width" => 207, "height" => 180),
            BX_RESIZE_IMAGE_EXACT,
            true, $arFilter
        );

        $arResult["ITEMS"][$key]["PREVIEW_PICTURE"] = array(
            "SRC" => $arFileTmp["src"],
            'WIDTH' => $arFileTmp["width"],
            'HEIGHT' => $arFileTmp["height"],
        );
    }

}

?>