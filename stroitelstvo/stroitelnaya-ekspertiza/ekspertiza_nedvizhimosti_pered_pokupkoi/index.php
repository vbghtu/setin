<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспертиза недвижимости перед покупкой");
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
			<div class="newh3">Экспертиза недвижимости перед покупкой</div> 
          
			<p align="justify" style="text-indent: 49.65pt;"> 
				<img src="/upload/medialibrary/b45/pered pokypkoi.jpg" title="pered pokypkoi.jpg" border="0" alt="pered pokypkoi.jpg" width="566" height="306"  />
			</p>

			<p>
				Одним из востребованных направлений нашей компании является Экспертиза (обследование) недвижимости перед покупкой.
			</p>

			<p>
				Если Вы собираетесь приобрести коттедж, квартиру, административное здание или складское помещение, и не уверены в его техническом состоянии, выполнены 
				ли работы согласно проекту, или Вы хотите понять, можно ли будет его реконструировать или надстроить ещё один или несколько этажей, или не уверены 
				в полноте документации по объекту, то мы рады Вам помочь по всем этим вопросам.
			</p>

			<p>
				Наша компания имеет опыт работы более 6 лет  на рынке строительных экспертиз. За это время мы провели более 50 обследований недвижимости перед покупкой 
				различной сложности, от квартир и коттеджей, до административных и складских зданий.
			</p>

			<p>
				Экспертиза недвижимости может быть проведена 2-мя способами:
			</p>

			<ol class="large_numbers">
        <li>
          <span class="large">1</span>
          <p>
            Устная консультация (от 12 000 рублей), срок исполнения  1-2 дня:
          </p>
          <ul class="dotted">
            <li>выезд эксперта на объект обследования</li>
            <li>ознакомление с документацией</li>
            <li>визуальный осмотр объекта, при необходимости инструментальное обследование с использованием специальных приборов  для измерения 
            различных параметров объекта (прочность и марка бетона, армирование, влажность древесины и т.д.)</li>
            <li>устная консультация Заказчика по объекту обследования, ответы на все вопросы Заказчика, выдача рекомендаций по устранению 
            выявленных дефектов и дальнейшей эксплуатации</li>
            <li>выдача Акта осмотра и Дефектной ведомости.</li>
          </ul>
        </li>  

        <li>
          <span class="large">2</span>
          <p>
            Выдача отчёта и сметы (устранение недоделок и ремонтно-восстановительные работы) – от 50 000 рублей, срок исполнения от 3-х дней:
          </p>
          <ul class="dotted">
            <li>выезд эксперта или экспертной группы на объект</li>
            <li>ознакомление с документацией</li>
            <li>фотофиксация выявленных дефектов</li>
            <li>инструментальное обследование</li>
            <li>составление Акта осмотра и дефектной ведомости</li>
            <li>разработка экспертного заключения.</li>
            <li>составление сметы на устранение недоделок и  ремонтно-восстановительные работы</li>
          </ul>
        </li>  
      </ol>
			
			<p>
				<b><i>В чём плюс Устной консультации?</i></b>
			</p>

			<p>
				За небольшие деньги и в короткий срок Вы получите общее понимание об объекте с выдачей рекомендаций от профессионала в области строительства. 
				Вы поймёте, нужно ли Вам покупать этот дом, не развалится ли он завтра? Или что нужно сделать,  сколько средств потратить, чтобы 
				эксплуатировать его на все 100% и не знать проблем.
			</p>

			<p>
				<b><i>В чём плюс  полноценной экспертизы с выдачей экспертного заключения и сметы?</i></b>
			</p>

			<p>
				Вы будете знать всё об объекте, который собираетесь приобрести, его техническое состояние, работоспособность всех узлов и систем, возможность 
				надстроить или перестроить дом или здание. А смета Вам поможет «сбить» цену у продавца, т.к. в совокупности Вы получите отчёт, который 
				обосновывает сумму в смете,  и продавец уже обязан будет это учитывать.
			</p>

			<p>
				Звоните по телефону <b>(495) 769-09-77</b>, и мы поможем Вам определиться с покупкой недвижимости.
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