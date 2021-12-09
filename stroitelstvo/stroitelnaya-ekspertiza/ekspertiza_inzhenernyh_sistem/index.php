<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспертиза инженерных систем");
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
			<div class="newh3">Экспертиза инженерных систем</div> 
          
			<p align="justify" style="text-indent: 49.65pt;"> 
				<img src="/upload/medialibrary/6d8/systems.jpg" title="systems.jpg" border="0" alt="systems.jpg" width="568" height="306" />
			</p>

			<p>
				Экспертиза инженерных коммуникаций стоит на особых позициях в экспертной оценке строительства. Данный вид работ требует знаний 
				узкопрофильных специалистов для проведения исследований, говорит о серьёзности компании, которая занимается такими видами экспертиз. 
				Для этого необходим набор специального оборудования, умение его применения в самых разнообразных условиях при строительстве и 
				эксплуатации зданий и сооружений.
			</p>

			<p>
				Вопросы, задаваемые нашими Заказчиками, в большей степени касаются неудовлетворительной работы инженерных систем, выбора и оценки 
				оборудования для их функционирования, разбор и рекомендации в аварийных ситуациях.
			</p>

			<p>
				Чаще всего из экспертизы инженерных коммуникаций обращаются по обследованию систем вентиляции и кондиционирования.  
				Экспертами нашей компании не раз проводилась экспертиза вентиляции и кондиционирования как в торговых помещениях и офисных 
				зданиях, так и в квартирах и частных домостроениях. Для обследования систем вентиляции и кондиционирования используются специальные 
				<a href="/oborudovanie/" >приборы</a> для определения скорости воздушного потока и температуры воздуха.
			</p>

			<p>
				Также востребована экспертиза отопления и канализации. В данной экспертизе определяются работы в соответствии с проектом, материалы 
				в соответствии с проектом, проверяются все соединения и параметры функционирования систем.
			</p>

			<p>
				Проводя обследования инженерных систем, наши эксперты руководствуются положениями СНиП, ГОСТ, а именно: 
				<b>СНиП 2.04.05-91; СНиП 41-01-2003; СНиП3.05.04-85*; СНиП3.05.01-85; СНиП2.04.01-85*; ГОСТ21.101-97; ГОСТ21.604-82; ГОСТ21.601-79.</b>
			</p>

			<p>
				По результатам проведенной экспертизы инженерных систем Заказчик получает отчёт с описанием объекта, обнаруженных дефектов, 
				выводами и рекомендациями. Также к отчёту прикладываются Свидетельства СРО и документы эксперта, проводившего обследование (диплом, сертификаты и т.д.).
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