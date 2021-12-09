<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//if($USER->IsAdmin()){echo "arResult[ITEMS]<pre>"; print_r($arResult["ITEMS"]); echo "</pre>";}
if(!ereg("(.*),(.*)", $arParams["ICON_SIZE"])) $arParams["ICON_SIZE"] = '46,31';
if(!ereg("(.*),(.*)", $arParams["ICON_OFFSET"])) $arParams["ICON_OFFSET"] = '-15,-30';

?>

<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>

<script type="text/javascript">
var myMap;
ymaps.ready(init);

function init () {
    myMap = new ymaps.Map('YMapsID', {
        center:[58.746114,60.223949],
        zoom:3
    });

    myPlacemark = new Array();

    CityDatasName = new Array();
    CityDatasGD1 = new Array();
    CityDatasGD2 = new Array();

    <?$i = 0; foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?if ($arItem["PROPERTIES"]["YMAP_POINT"]["VALUE"]):?>
        <?$GEO = split(',', $arItem["PROPERTIES"]["YMAP_POINT"]["VALUE"]);?>
        CityDatasName[<?=$i?>] = "<h2><?=$arItem["NAME"]?></h2><?if($arItem["PREVIEW_PICTURE"]["ID"]):?><img class='map_shop_img' src='<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>' width='<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>' height='<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>' alt='<?=$arItem["NAME"]?>' title='<?=$arItem["NAME"]?>' /><?endif;?><div class='map_shop_info'><div class='map_shop_adress'><?=$arItem["PROPERTIES"]["ADDRESS"]["VALUE"]?></div><div class='map_shop_phone'><?=$arItem["PROPERTIES"]["PHONES"]["VALUE"]?></div><div class='map_shop_anounce'><?=str_replace("\r", "", str_replace("\n", "", $arItem["PREVIEW_TEXT"]));?></div><?if($arItem["PROPERTIES"]["WWW"]["VALUE"]):?><div class='map_shop_www'><a href='<?="http://".str_replace("http://", "", $arItem["PROPERTIES"]["WWW"]["VALUE"])?>' target='_blank'><?=$arItem["PROPERTIES"]["WWW"]["VALUE"]?></a><?endif?></div></div>" //'<?=$arItem["NAME"]?>';



        CityDatasGD2[<?=$i?>] = <?=$GEO[1]?>; CityDatasGD1[<?=$i?>] = <?=$GEO[0]?>;
        <?$i++;endif?>
    <?endforeach?>


    for (var key in CityDatasName)
    {
      myPlacemark[key] = new ymaps.Placemark([CityDatasGD1[key], CityDatasGD2[key]], {

          }, {
              iconImageHref: '<?=$arParams["ICON_FILE"]?>',
              iconImageSize: [<?=$arParams["ICON_SIZE"]?>],
              iconImageOffset: [<?=$arParams["ICON_OFFSET"]?>],
              openEmptyBalloon: true,
              iconContentSize: [24, 16],
              iconContentOffset: [-8, -10],
              openEmptyBalloon: true,
              hideIconOnBalloonOpen: false

          });
      myPlacemark[key].key = key;

      myPlacemark[key].events.add('balloonopen', getAddress);

      myMap.geoObjects.add(myPlacemark[key]);
    }

    function getAddress(e)
    {
      var obj = e.get('target');

      obj.properties.set('balloonContent', CityDatasName[obj.key]);
    }

    myMap.controls.add('zoomControl', { left: 5, top: 5 });

}

</script>

<div id="YMapsID"></div>
<div class="clear"></div>

<span class="title fL" style="color:#1b96ef;font-size: 14px;margin: 32px 0 15px;text-transform: uppercase;"><?=GetMessage("ITHIVE_OFFICES_LIST_TITLE")?>:</span>
	<div class="shop_search_result">
	  <div class="scrollable" style="right: 10px; top: 10px;">
      <table class="odd_grey_body" id="shop_search_result_table">
      <?$odd = true; foreach($arResult["ITEMS"] as $arItem):?>
       <tr class="result_item <?if ($odd) {$odd = false; echo "odd";} else $odd = true;?>">
       <?$GEO = split(',', $arItem["PROPERTIES"]["YMAP_POINT"]["VALUE"]);?>
      <td width="185" geo1="<?=$GEO[0]?>" geo2="<?=$GEO[1]?>" style="cursor:pointer"><?=$arItem["PROPERTIES"]["NAME_SHORT"]["VALUE"]?></td>
      </tr>
      <?endforeach;?>

      </table></div>
	</div>

<script>
$(".result_item td").click(function()
    {
      if ($(this).attr("geo1") && $(this).attr("geo2")) myMap.setZoom(10).setCenter([$(this).attr("geo1"),$(this).attr("geo2")]);
    });
</script>
