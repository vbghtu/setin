<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?$APPLICATION->ShowHead()?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/styles.css" />
</head>

<body onload='start()'>
<?$APPLICATION->ShowPanel();?> 
<div id="header" style="position: relative; height: 196px; width: 980px; margin: 0px auto 31px;"> 	 
  <div class="common_wrapper" style="position: fixed;" bxid_611874"="" src="/bitrix/images/fileman/htmledit2/php.gif" border="0">/images/top_bg.png) no-repeat center 0px; z-index: 950;&quot;&gt; 		 
    <div> 			 
      <div class="top_block fL w"> 				<a href="/" class="logo fL" ></a> 				<span class="slogan fL">Выявляем ошибки, 
          <br />
         предлагаем решения!</span> 				 
        <div class="top_info fL"> 					<span class="mono fL">многоканальный </span> 
          <br />
         					<span class="phone fL">+7 (499) <span> 					<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/bitrix/templates/techno/include_areas/header-telephone.php",
		"EDIT_TEMPLATE" => ""
	)
);?> 					</span></span> 					<a href="mailto:info@seitn.ru" class="mail fL" style="font-size:17px;color:red" > 					<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/bitrix/templates/techno/include_areas/header-email.php",
		"EDIT_TEMPLATE" => ""
	)
);?> 					 					</a> 				</div>
       				 
        <div class="last_info_head fR"> 					<span class="graph fR">Мы работаем: Пн. - Пт.: с <span class="bold">9<sup><small>00</small></sup></span> - до <span class="bold">19<sup><small>00</small></sup></span></span> 					<a href="#dialog" name="modal" class="order_call fR" style="border: 1px solid #097AEA;border-radius: 8px;" >Заказать звонок специалиста</a> 				</div>
       			</div>
     			<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"top",
	Array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array()
	)
);?> 			 		</div>
   		 
<!--End .wrapper-->
 	</div>
 	 
<!--End #wrapper-->
 </div>
