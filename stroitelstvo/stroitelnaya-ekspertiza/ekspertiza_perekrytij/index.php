<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспертиза перекрытий");
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
			<div class="newh3">Экспертиза перекрытий</div> 
          
			<p align="justify" style="text-indent: 49.65pt;"> 
				<img src="/upload/medialibrary/642/perekritiy.jpg" title="perekritiy.jpg" border="0" alt="perekritiy.jpg" width="568" height="306"  />
			</p>

			<p>
				Когда заказывают обследование перекрытий? Перекрытия выполняют из различных материалов: дерева, металла, железобетона (см. раздел Статья ПЕРЕКРЫТИЯ). 
				Различен и характер эксплуатации перекрытий, их состояние. Обычно перекрытия проверяются во время капитального ремонта или надстройки этажей, 
				а также при визуальных дефектах (трещины, ржавчина), чтобы охарактеризовать их техническое состояние и сделать на основе этого реальный расчёт 
				как несущей способности, так и других эксплуатационных показателей.
			</p>

			<p>
				Нашими экспертами весьма часто определяется качество перекрытий в новых домах, это могут быть как коттеджи или административные здания, так и 
				многоквартирные жилые дома. При необходимости для определения качества применяемых материалов (железобетонные перекрытия), экспертами используется 
				специальное оборудование, специальные приборы, при помощи которых можно выяснить прочность бетона и глубину заложения арматуры, её диаметр. 
				Достаточно часто конструкции, выполненные из металла, при ненадлежащей эксплуатации покрываются ржавчиной, коррозия глубоко проникает в структуру 
				металла, это может привести к частичной утрате несущей способности перекрытия. Сварные и болтовые соединения, чаще всего применяемые при сборке 
				стальных конструкций, подлежат тщательному осмотру и оценке. Деревянные перекрытия имеют свои особенности: нарушения технологии строительства 
				может привести к появлению плесени, загниванию несущих элементов перекрытия и, как следствие, к потере несущей способности, созданию недопустимых 
				условий эксплуатации помещения и всего здания в целом. Основной фактор, отрицательно влияющий на состояние деревянных перекрытий &ndash; недопустимая влажность.
			</p>

			<p>
				Наши специалисты могут досконально изучить и определить параметры перекрытий при помощи современных методов исследований, мы располагаем необходимой 
				базой приборов и оборудования для этого. Все приборы сертифицированы и проходят ежегодную поверку в РОСТЕСТе.
			</p>

			<p>
				Кроме несущей способности, перекрытия должны удовлетворять требованиям пожарной безопасности, соответствовать нормам по шумоизоляции, теплоизоляции, 
				в отдельных случаях - по гидроизоляции. При изменении функционального соответствия помещения и/или при перепланировке меняется и конструктивная 
				схема расчёта перекрытия, оно должно соответствовать изменившемся расчётным нагрузкам и функциональному назначению.
			</p>

			<p>
				В отчёте будет доступно показано техническое состояние перекрытия; при необходимости можно произвести расчёт его несущей способности, определить 
				допустимость и характер возможных нагрузок. Вы получите наши рекомендации по устранению выявленных нарушений.
			</p>

			<p>
				Стоимость обследования перекрытий с выдачей отчёта от 20 000 рублей, в зависимости от площади и месторасположения объекта исследования.
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