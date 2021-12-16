<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="inner_content inner fL w">
          <h3>Оборудование</h3>
          <p>
            Наша компания использует современное оборудование, как для частного, так и для корпоративного заказчика. Особенностью нашей деятельности является независимая 
            <a href="/stroitelnaya-ekspertiza/">экспертиза строительства</a> и работа по следующим направлениям:
          </p>
          <ul class="dotted " style="padding-left:10px;">
            <li>акустические, ультразвуковые и сейсмические измерения;</li>
            <li>контроль качества строительных материалов и прочности бетона;</li>
            <li>теплофизические измерения;</li>
            <li>измерение влажности изделий, материалов и сред;</li>
            <li>многопараметрический мониторинг объектов.</li>
          </ul>
          <p>
            Используемые нами специальные измерительные приборы проходят контроль, соответствуют техническим требованиям и имеют высокое качество. Каталог продукции пополняется 
            новыми приборами и имеет необходимую информацию по предложенной номенклатуре – фотографии, описания приборов.
          </p>
        </div>
        <div class="recommendations doc tools fL w">

			<? foreach($arResult["ITEMS"] as $arItem):

				//$file = CFile::ResizeImageGet($arItem["PROPERTIES"]['PHOTO']['VALUE'], array('width'=>202, 'height'=>242), BX_RESIZE_IMAGE_EXACT, true);
                $file = CFile::ResizeImageGet($arItem["PROPERTIES"]['PHOTO']['VALUE'], array('width'=>202, 'height'=>242), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>

				<div class="item fL"  style="margin-right:50px;">
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="preview fL item" style=" border: solid 2px #c8c8c8;border-radius: 8px;height:242px;padding:2px;display:block;width:202px">

					  <table style="border:none;width:100%;height:100%"><tr><td style="vertical-align:middle; text-align:center">
                        <?//if ($file['height'] < 242 && $file['width'] < 202) $sz = "height:242px"?>
                        <img style="width:auto;float:none;<?=$sz?>" src="<?=$file['src']?>" />
                      </td></tr></table>

					</a>
					<div class="title_area fL w">
					  <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="title"><?=$arItem["NAME"]?></a>
					</div>
				</div>

			<?endforeach;?>

            <script>
              $('.item').hover(function(){$(this).css('border-color', '#696969');}, function(){$(this).css('border-color', '#c8c8c8');});
          </script>

		</div>

		<div class="choosen margin fL w"> 
          <span class="title fL">Нас уже выбрали:</span>
          <div class="choosen_slider w fL">
            <div class="Vwidget">
              <a href="#" class="up"></a>
              <div class="VjCarouselLite">
                <ul>                

                  <?
                  CModule::IncludeModule("iblock");
                  $arSelect = Array("ID", "NAME", "PROPERTY_TIP", "PROPERTY_KOD", "PROPERTY_IMG", "PROPERTY_URL");
                  $res = CIBlockElement::GetList (
                     Array(),
                     Array("IBLOCK_ID" => 2),
                     false,
                     false,
                     $arSelect
                  );

                  $list_fields = array();

                  while($ar_fields = $res->GetNext())
                  {
                    $list_fields[] = $ar_fields;
                  }

                  foreach ($list_fields as $elem) 
                  {
                    $img_src = CFile::ResizeImageGet($elem[PROPERTY_IMG_VALUE], array('width'=>148, 'height'=>80), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    $elem['IMAGE'] = $img_src['src'];
                    ?> 
                    <li>
                      <a href="<?=$elem['PROPERTY_URL_VALUE']?>"><img src="<?=$elem['IMAGE']?>" alt=""></a>
                    </li>
                  <?
                  }                   
                  ?>  
                    
                </ul> 
              </div>
              <a href="#" class="down"></a>
            </div>
          </div>
        </div>

