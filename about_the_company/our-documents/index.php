<?

header("HTTP/1.1 301 Moved Permanently");
header("Location: http://seitn.ru/our-documents/");
die;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши документы");

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
        
        <div class="inner_content fL w">
        	<div class="newh3">Наши документы</div>
		</div>

		<div class="recommendations doc fL w">	
        	<?$APPLICATION->IncludeComponent(
				"bitrix:catalog",
				"docs",
				Array(
					"AJAX_MODE" => "N",
					"SEF_MODE" => "Y",
					"IBLOCK_TYPE" => "objects",
					"IBLOCK_ID" => "9",
					"USE_FILTER" => "N",
					"USE_COMPARE" => "N",
					"SHOW_TOP_ELEMENTS" => "Y",
					"PAGE_ELEMENT_COUNT" => "30",
					"LINE_ELEMENT_COUNT" => "3",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_ORDER" => "asc",
					"LIST_PROPERTY_CODE" => array(),
					"INCLUDE_SUBSECTIONS" => "Y",
					"LIST_META_KEYWORDS" => "-",
					"LIST_META_DESCRIPTION" => "-",
					"LIST_BROWSER_TITLE" => "-",
					"DETAIL_PROPERTY_CODE" => array(),
					"DETAIL_META_KEYWORDS" => "-",
					"DETAIL_META_DESCRIPTION" => "-",
					"DETAIL_BROWSER_TITLE" => "-",
					"BASKET_URL" => "/personal/basket.php",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_ID_VARIABLE" => "id",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"SET_TITLE" => "Y",
					"SET_STATUS_404" => "N",
					"PRICE_CODE" => array(),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"PRICE_VAT_SHOW_VALUE" => "N",
					"LINK_IBLOCK_TYPE" => "",
					"LINK_IBLOCK_ID" => "",
					"LINK_PROPERTY_SID" => "",
					"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_TITLE" => "Товары",
					"PAGER_SHOW_ALWAYS" => "Y",
					"PAGER_TEMPLATE" => "",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "Y",
					"TOP_ELEMENT_COUNT" => "9",
					"TOP_LINE_ELEMENT_COUNT" => "3",
					"TOP_ELEMENT_SORT_FIELD" => "sort",
					"TOP_ELEMENT_SORT_ORDER" => "asc",
					"TOP_PROPERTY_CODE" => array(),
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"SEF_FOLDER" => "/about_the_company/our-documents/",
					"SEF_URL_TEMPLATES" => Array(
						"section" => "#SECTION_ID#/",
						"element" => "#SECTION_ID#/#ELEMENT_ID#/",
						"compare" => "compare.php?action=#ACTION_CODE#"
					),
					"VARIABLE_ALIASES" => Array(
						"section" => Array(),
						"element" => Array(),
						"compare" => Array(
							"ACTION_CODE" => "action"
						),
					)
				)
			);?> 
       
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