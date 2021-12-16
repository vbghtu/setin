<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экспертиза деревянных домов");
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
			<div class="newh3">Экспертиза деревянных домов</div> 
          
			<p align="justify" style="text-indent: 49.65pt;"> 
				<img src="/upload/medialibrary/be1/dom derevo.jpg" title="dom derevo.jpg" border="0" alt="dom derevo.jpg" width="568" height="306"  />
			</p>

			<p>
				Деревянные дома на сегодняшний день одни из самых востребованных на рынке строительства и продаж в нашей стране. Разнообразно исполнение этих 
				домов, конструктивно строятся из брёвен, бруса, пользуются спросом каркасные дома. Но каждый день, да да, именно каждый день в нашу 
				организацию звонят по поводу обследования деревянных домов, т.к. подрядчики некачественно возвели стены, перекрытия или кровлю. 
				И зачастую бывает, что в наших заключениях мы рекомендуем разобрать стены или стропильную систему, т.к. они собраны некачественно, 
				со значительными нарушениями как по геометрии, так и по несущим элементам, зачастую опасно находиться в таких строениях. 
				А причина ясна: при высоком спросе на загородную недвижимость некоторые строительные компании не располагают достаточным штатом 
				квалифицированных строителей, нет подготовленного инженерно-технического персонала.
			</p>

			<p>
				Не раз наша компания проводила обследования деревянных домов по определению суда, где в очередной раз мы доказывали, что состояние строения непригодно для проживания.
			</p>

			<p>
				Если Вы находитесь на данной странице, то видимо Вас интересует экспертиза деревянного дома, не медлите и позвоните нам, наши эксперты вас проконсультируют 
				по всем вопросам. И мы оперативно, в полном объёме проведём обследование дома, чтобы с помощью выданного Вам заключения Вы смогли уладить споры с 
				Подрядчиком в досудебном порядке; если это не случится, наше заключение будет решающим фактором для рассмотрения дела в суде. Нужно отметить, что все 
				наши заключения по строительным экспертизам имеют статус официальных, имеют полную юридическую силу и могут быть переданы в суд.
			</p>

			<p>
				Также Вы можете заказать смету на ремонтно-восстановительные работы, с расценками по смете, которую предоставил Вам Заказчик, или же по среднерыночным ценам. 
				Данная смета Вам поможет потребовать с Подрядчика конкретную сумму, а экспертное заключение даст объяснения в конкретном использовании материалов 
				и в необходимости производства определённых видов работ.
			</p>

			<p>
				Если же Вы хотите надстроить или построить ещё один дом, баню, рекомендуем Вам воспользоваться услугой <a href="/tehnadzor/" >технического надзора</a>,
				 чтобы у Вас не возникало проблем с качеством возведённого строения, чтобы избежать продолжительного по времени судебного разбирательства, экспертизы строительства.
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