<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспертиза стен");
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
			<div class="newh3">Экспертиза стен</div> 
          
			<p align="justify" style="text-indent: 49.65pt;"> 
				<img src="/upload/medialibrary/b8b/sten.jpg" title="sten.jpg" border="0" alt="sten.jpg" width="568" height="306"  />
			</p>

			<p>
				В каких случаях заказывают экспертизу стен? Чаще всего обследование стен происходит совместно с обследованием фундаментов 
				и перекрытий, для выяснения несущей способности стен при надстройке этажей или капитальном ремонте. Также у Заказчиков 
				возникают вопросы по качеству возведения стен (неровности, трещины и т.д.). По этим вопросам и многим другим эксперты компании 
				ТехЭкспертиза смогут Вам помочь,<span>  </span>проконсультировать, провести полномасштабную экспертизу. Консультация проводится 
				либо в <a href="/oral-consultations/" >устной форме</a>, либо составляется заключение с 
				фотоматериалами, описанием объекта и дефектов, выводы и рекомендации по дальнейшей эксплуатации.
			</p>

			<p>
				При обследовании стен для определения их технического состояния и соответствия нормативным параметрам нашими экспертами используется 
				специальное <a href="/oborudovanie/" >оборудование</a> на основе неразрушающих методов определения 
				прочностных характеристик материала. Допустим, если стена выполнена из железобетона, то мы определяем прочность бетона, глубину 
				заложения арматуры и её диаметр. Стены кирпичные проверяются на геометрию кладки: горизонтальность, толщину швов и качество их заполнения, 
				качество используемого кирпича и швов (марка, соответствие проекту); стены деревянные могут быть выстроены из брёвен и бруса, каркасные. 
				Именно в последнее время большое распространение получил каркас &ndash; экономичный вариант, в котором несущие элементы из дерева вместе 
				с утеплителем, гидроизоляционными и пароизоляционными мембранами создают высокоэффективную конструкцию стены, но и сравнительно много 
				допускается ошибок при устройстве таких стен.
			</p>

			<p>
				В настоящее время можно обнаружить предпосылки к разрушению конструкции на ранней стадии образования трещин, тем самым предотвратить их 
				разрушение. Кроме того, стены - не только несущие конструкции, но и ограждающие, сохраняющие комфортные условия пребывания человека в 
				помещении. Можно провести исследования на тепло- и гидроизоляцию, пароизоляцию конструкции.
			</p>

			<p>
				Для более детального обследования стен и их отдельных участков можно вырезать из конструкции стены несколько образцов 
				для последующего анализа в лабораторных условиях.
			</p>

			<p>
				Разумеется, все стены проверяются на вертикальность, состояние отделочных покрытий изнутри и снаружи, имеется возможность оценить 
				состояние защитных покрытий стен. Для этого мы обладаем необходимой базой приборов, профессионального оборудования, сотрудничаем со 
				специализированными строительными лабораториями, где возможно оценить состояние любых материалов стен. Все наши приборы сертифицированы, 
				проходят ежегодную поверку в РОСТЕСТе.
			</p>

			<p>
				Стоимость экспертизы стен от 20 000 рублей с выдачей отчёта, в зависимости от объёма обследуемого объекта и его месторасположения.
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