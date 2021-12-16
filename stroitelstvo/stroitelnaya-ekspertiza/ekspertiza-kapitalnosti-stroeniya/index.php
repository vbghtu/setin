<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспертиза капитальности строения");
?>

<div id="content" class="main_content">
  <div class="common_wrapper">
    <div>
      <div class="sidebar fL">
        <ul class="menu no_list fL w">

          <?$APPLICATION->IncludeComponent(
            "bitrix:menu", 
            "left_main", 
            array(
              "ROOT_MENU_TYPE" => "left",
              "MENU_CACHE_TYPE" => "N",
              "MENU_CACHE_TIME" => "3600",
              "MENU_CACHE_USE_GROUPS" => "Y",
              "MENU_CACHE_GET_VARS" => array(
              ),
              "MAX_LEVEL" => "2",
              "CHILD_MENU_TYPE" => "left_dop",
              "USE_EXT" => "Y",
              "DELAY" => "N",
              "ALLOW_MULTI_SELECT" => "N"
              ),
              false
            );
          ?>

        </ul>

        <a href="#dialog2" class="submit_app fL" onclick="ga('send','event','click','order'); yaCounter27025170.reachGoal('order_click');">Оформить заявку</a>
        <span class="recommend fL">Рекомендательные письма:</span>
        
        <?$APPLICATION->IncludeComponent(
          "bitrix:main.include", 
          ".default", 
          array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => "/include/banner.php",
            "EDIT_TEMPLATE" => ""
          ),
        false
        );?>

      </div>

      <div class="main fR">
        <div class="bread w fL">
          <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "",
            Array(
              "START_FROM" => "0",
              "PATH" => "",
              "SITE_ID" => "s1"
            )
          );?>
        </div>
        <div class="inner inner_content fL w exp_ti">
			<div class="newh3">Экспертиза капитальности строения</div> 
          
			<p > 
        <div style="text-align:center;">
				 <img src="/upload/medialibrary/71b/10981876-big-building-construction.jpg" title="10981876-big-building-construction.jpg" border="0" alt="экспертиза капитальности здания" width="400" height="265" />
			   </div>
      </p>

			<p>
				<b>Что вам даст заключение по определению капитальности строения?</b>
			</p>

			<p>
				При получении заключения от независимой экспертно-строительной организации, Вы сможете с большей уверенностью отстаивать своё строение, если его хотят снести, 
				т.к. капитальное строение не так просто снести. А так же если всё таки его снесут, то Вам как владельцу капитального строения должны будут выплатить 
				сумму минимум 3 раза больше, чем если бы у Вас было не капитальное строение.
			</p>

			<p>
				В связи вступления в силу нового мэра Москвы Собянина С.С., ужесточились правила признания капитальности строения в г. Москве. Наша компания на сегодняшний 
				день провела более 15 подобных экспертиз, где определяли капитальность строения. Заключения, которые мы выдавали нашим заказчикам, направлялись либо в суды, 
				либо в Префектуры районов, что означает, что наши заключения полностью официальны и могут направляться в любые инстанции.
			</p>

			<p>
				Все эксперты, которые проводят обследования дипломированные специалисты, и с большим опытом работы в строительстве, соответственно знают всю «кухню» изнутри. 
				В данном случае наши специалисты ссылаются на "ГРАДОСТРОИТЕЛЬНЫЙ КОДЕКС РОССИЙСКОЙ ФЕДЕРАЦИИ" от 29.12.2004 N 190-ФЗ.
			</p>

			<p>
				В заключение будут фотоматериалы, где будет наглядно показаны отдельные конструктивные части строения и инженерия. 
				Так же специалисты изучают  документацию, которую представляет  заказчик.
			</p>

			<p>
				В чём плюс Устной консультации?
			</p>

			<p>
				За небольшие деньги и в короткий срок Вы получите общее понимание об объекте с выдачей рекомендаций от профессионала в области строительства. 
				Вы поймёте, нужно ли Вам покупать этот дом, не развалится ли он завтра? Или что нужно сделать,  сколько средств потратить, чтобы 
				эксплуатировать его на все 100% и не знать проблем.
			</p>

			<p>
				С объектами, по которым выполнялись экспертизы по Определению капитальности строений, Вы можете ознакомиться в разделе 
				<a href="/portfolio/" title="Наши работы" >НАШИ РАБОТЫ</a>
			</p>

			<p>
				Сроки проведения обследования на капитальность строения составляет от 3 до 10 рабочих дней.
			</p>

			<p>
				Стоимость – зависит от площади объекта и месторасположения. Средняя цена за данное обследование 60 000 рублей.
			</p>
          
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

      </div>

    </div>
  </div>

<div class="our_projects w">
  <div class="common_wrapper">
    <div>
      <div class="our_projects_wrapper fL w">
        <span class="title_projects fL">Выполненные работы:</span>
        <div class="projects_slider w fL">
          <div class="Vwidget">
            <a href="#" class="up_proj"></a>
            <div class="VjCarouselLite_proj">

              <ul class="works-list">

                      <?
              CModule::IncludeModule("iblock");
              $arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL");
              $res = CIBlockElement::GetList (
                 Array("RAND" => "ASC"),
                 Array("IBLOCK_ID" => 1, "!SECTION_ID" => 15),
                 false,
                 Array (),
                 $arSelect
              );
              while($ar_fields = $res->GetNext())
              {
                $list_fields_obj[] = $ar_fields;
              }

              //print_r($list_fields_obj);die();
              foreach ($list_fields_obj as $obj) 
              {
                
                $img_obj = CFile::ResizeImageGet($obj['PREVIEW_PICTURE'], array('width'=>207, 'height'=>180), BX_RESIZE_IMAGE_EXACT, true);
                $obj['IMAGE'] = $img_obj['src'];


                ?> 
                <li class="project_preview">
                    <a href="<?=$obj[DETAIL_PAGE_URL]?>">
                      <? if ( ! empty ($obj['IMAGE'] )): ?>
                      <img src="<?=$obj['IMAGE']?>" />
                    <?else: ?>
                      <img src="<?=SITE_TEMPLATE_PATH?>/images/about.jpg" width="207" height="180" />
                    <?endif;?>
                  </a>
                  <span class="title"></span>
                  <span class="anons"><?=$obj["NAME"];?></span>       
                </li>
              <?
              }                   
              ?>  

                  </ul>

            </div>
            <a href="#" class="down_proj"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>