<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспертиза кровли");
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
          <div class="newh3">Экспертиза кровли</div> 
          
          <p align="justify" style="text-indent: 49.65pt;"> 
           <img src="/upload/medialibrary/423/iqsnyxberikf.jpg" title="Экспертиза кровли" border="0" alt="кровля.jpg" width="568" height="306"  />
          </p>
          
          <p>
            Качество кровли, выполнение работ по ремонту верхней части зданий - 
            один из важных этапов в строительстве и капитальном ремонте зданий. Погодные явления могут способствовать промоканию 
            и протеканию кровельного материала, смонтированного с ненадлежащим качеством. Так, после снежной зимы, не исключено, 
            что &laquo;благодаря&raquo; некачественно выполненным работам, потолки и стены верхних этажей изменят свою внешность и 
            структуру. Пропитанный застоявшейся влагой строительный материал представляет собой отличную среду для образования плесени, 
            что сказывается негативно на здоровье находящихся внутри людей. Следовательно, крыша здания, смонтированная по всем нормативам 
            и из надлежащего материала - залог долговечной службы целого здания и здоровья людей.
          </p>

          <p>
            При сдаче дома в эксплуатацию, при проведении работ по капитальному ремонту кровель зданий, целесообразно провести экспертизу 
            кровли на предмет выявления возможных нарушений, чтобы избежать более затратных работ на ликвидацию возможных деформаций отдельных конструкций и всего строения в целом.
          </p>

          <p>
            <b>Экспертиза кровли </b>также желательна при покупке частного дома во избежание дополнительных затрат, при приобретении дома с кровлей ненадлежащего качества.
          </p>

          <p align="justify" style="text-indent: 49.65pt;">
            <img src="/upload/medialibrary/b3b/itbfigaqpznkgsafpasccpqz ttucbipkcrpl.jpg" title="экспертиза кровли, обследование кровли" border="0" alt="обследование кровли.jpg" width="563" height="302"  />
          </p>

          <p>
            Таким образом, качественно положенная и смонтированная кровля гарантирует долгую эксплуатацию всего здания.  Для разного климата предполагается использование определенного кровельного материала. 
          </p>

          <p>
            В равной степени значимости с выполнением кровельных работ стоит проектирование кровель, впоследствии работа специалистов призвана осуществить правильную укладку и крепление материалов. 
            Экспертная оценка позволяет выявить качество работы инженеров-проектировщиков и строительной бригады.
          </p>

          <p>
            <b>Экспертиза кровли </b>проводится не только для выявления отклонений от норм, но и в случае спорной оценочной стоимости проводимых кровельных работ. Проведение экспертизы в 
            данном направлении включает в себя сверку сметных данных, составленных с учетом территориальных климатических особенностей с фактически использованными материалами и объемами работ.
          </p>

          <p>
            Независимая экспертная оценка представляет собой объективное заключение о состоянии определенного объекта. Принцип оценки &ndash; это соблюдение в отношении человека его прав и 
            законности, предоставление развернутой информации об исследуемом объекте. Данные положения прописаны в Федеральном Законе.
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