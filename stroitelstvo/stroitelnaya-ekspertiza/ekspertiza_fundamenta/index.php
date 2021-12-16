<?

header("HTTP/1.1 301 Moved Permanently");
header("Location: http://seitn.ru/polezno/120/");


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспертиза фундамента");
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
			<div class="newh3">Экспертиза фундамента</div> 
          
			<p align="justify" style="text-indent: 49.65pt;"> 
				<img src="/upload/medialibrary/425/fundament.jpg" title="fundament.jpg" border="0" alt="fundament.jpg" width="568" height="306"  />
			</p>

			<p>
				Крепкий и прочный фундамент, безусловно, основополагающий фактор долгой и беспроблемной службы здания.
			</p>

			<p>
				<b>Экспертиза фундамента</b> поможет определить наличие скрытых дефектов, а также установить возникновение 
				причин их появления. Для того, чтобы без последствий надстроить здание или установить весомое оборудование, 
				также необходимо детальное обследование опоры здания, т.е. фундамента. Технические возможности позволяют 
				проводить экспертизу, не разрушая структуру фундамента, оставляя строение в первозданном виде. По окончании 
				проверки выдается экспертное заключение, которое может быть представлено как обоснованное доказательство, 
				имеющее полную юридическую силу.
			</p>

			<p>
				Приобретая участок с уже имеющимся фундаментом, его экспертиза поможет выбрать наиболее приемлемый материал для возведения сооружения.
			</p>

			<p>
				Экспертное исследование  фундаментов жилых и промышленных зданий заключается в следующем:
			</p>

			<ul>
				<li>исследование и заключение о фактическом состоянии фундамента;</li>
				<li>мониторинг строительной основы;</li>
				<li>исследования при предстоящей перепланировке или реконструкции здания;</li>
				<li>выявление дефектов после аварий, землетрясений и прочих внешних воздействий;</li>
				<li>анализ и выявление характеристик примененных материалов.</li>
			</ul>

			<p>
				Обычно исследование проводится поэтапно. Первоначальная предварительная экспертиза представляет общую картину состояния фундамента,  
				а детальная проверка выявляет первопричины возникновения дефектов. На первом этапе рассматривается и изучается документация об 
				инженерно-геологическом состоянии, проектные документы, осматривается внутренняя и наружная видимая поверхность фундамента. Второй этап 
				включает в себя анализ проб, определение прочности материалов. Тестирование проводится с использованием новых методов, которые сохраняют 
				целостность фундамента. Статистические расчеты конструкций здания позволяют определить нагрузку на фундамент. Рассчитывается и 
				возможное увеличение нагрузок, вызванных изменениями характеристик грунта и другими техническими условиями.
			</p>

			<p>
				По окончании обследования заказчику выдается полная информация о механических и физических свойствах грунта, о материалах конструкций 
				и о воздействии этих двух аспектов на фундамент. Информационная составляющая включает в себя рекомендации относительно эксплуатации 
				объекта в его существующем состоянии.
			</p>

			<p>
				Все приборы, при помощи которых проводится <b>экспертиза фундамента</b>, имеют сертификаты и свидетельства о поверке. Проводят поверку 
				квалифицированные специалисты, которые оценят риск возникновения возможных дефектов фундамента, что в свою очередь позволит сократить 
				расходы на ремонт и реконструкцию всего здания.
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