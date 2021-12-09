<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?
if(!CModule::IncludeModule("iblock")){
     return;
}
global $arProps;
$rsElem = CIBlockElement::GetById(2833);
$arElem = $rsElem->GetNextElement();
$arProps = $arElem->GetProperties();


?>


<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<?php	$numpagex = (int) $_GET['PAGEN_1'];	if($APPLICATION->GetCurPage() == "/news/") {	?>
<title>Новости компании СтройЭкспертНадзор<?=(!empty($numpagex) ? " - страница " . $numpagex : "");?></title>
	<?php	} else {	?>
<title><?=$APPLICATION->ShowTitle();?></title> <?php	}	if(!empty($mypage)) {	?>
<meta name="yandex" content="noindex, follow"/>	<meta name="googlebot" content="index, follow"/>
    <?php	}	$APPLICATION->ShowMeta("description");	$APPLICATION->ShowProperty('prev');	$APPLICATION->ShowProperty('next');	?>
<!-- Картинка появляющаяся в социальных сетях, при отправке ссылки на сайт в сообщении или на стену -->
<meta property="og:image" content="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg">
<!-- init viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH;?>/img/favicon.ico" type="image/x-icon">
<!-- Icon For Apple Devices -->
<meta property="og:title" content="<?$APPLICATION->ShowTitle(false);?>"/>
<meta property="og:url" content="https://seitn.ru<?=$APPLICATION->GetCurUri();?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg" />
<meta property="og:description" content="<?$APPLICATION->ShowProperty('description');?>" />
<meta property="og:site_name" content="СтройЭкспертНадзор — технадзор и стойэкспертиза" />
<meta property="og:locale" content="ru" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg">
<link rel="apple-touch-icon-precomposed" href="<?=SITE_TEMPLATE_PATH;?>/img/logo.jpg">
<?php	$APPLICATION->ShowCSS();
$APPLICATION->ShowHeadStrings();
$APPLICATION->ShowHeadScripts();
$APPLICATION->ShowMeta('keywords');
?>
<meta name="yandex-verification" content="068e24a0719c4b51" />
<!-- stylesheets -->
<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/styles.css">

<meta name="google-site-verification" content="Bp93nCkNpVLnfQZATKrOJhlNIVL6oNEgRJYy7OpLg60" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
</head>
<body><index>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>

<header class="header">
<section class="headerTop">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_multi", 
	array(
		"ALLOW_MULTI_SELECT" => "Y",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"MENU_THEME" => "site",
		"COMPONENT_TEMPLATE" => "top_multi",
		"CHILD_MENU_TYPE" => "left"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>


<?$APPLICATION->IncludeComponent("bitrix:search.form","serch",Array(
                    "USE_SUGGEST" => "N",
                    "PAGE" => "#SITE_DIR#search",
                 )
            );    ?>

<div class="headerTopContacts">
    <span class="headerTopContactsWT">
         <?=$GLOBALS["arProps"]['work_time']["VALUE"]?>
    </span>
    <div class="headerTopContactsMail">
        <a href="email:<?=$GLOBALS["arProps"]['email']["VALUE"]?>">
            <?=$GLOBALS["arProps"]['email']["VALUE"]?>
        </a>
    </div>
    <div class="headerTopContactsTel">
        <p>Бесплатно по России и Крыму</p>
        <a href="tel: <?=$GLOBALS["arProps"]['phone']["VALUE"]?>">
            <?=$GLOBALS["arProps"]['phone']["VALUE"]?>
        </a>
    </div>

</div>
</section>
<section class="headerBottom">
    <picture class="headerBottomLogo">
        <img src="<?=CFile::GetPath($GLOBALS["arProps"]["logo"]["VALUE"])?>" alt="">
    </picture>
    <nav class="headerBottomMenu">
       <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_dop_multi", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "dop_top",
		"USE_EXT" => "Y",
		"MENU_THEME" => "site",
		"COMPONENT_TEMPLATE" => "top_dop_multi",
		"CHILD_MENU_TYPE" => "dop_menu"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
    </nav>

            <a class="headerBottomButton" href="#">
                Заказать звонок
            </a>
</section>
</header>

<!--
<header id="test">
    <picture class="headerBottomLogo">
        <img src="<?=CFile::GetPath($GLOBALS["arProps"]["logo"]["VALUE"])?>" alt="" width="263px;">
    </picture>
    <nav class="headerBottomMenu">
           <?$APPLICATION->IncludeComponent(
    	"bitrix:menu",
    	"top_dop_multi",
    	array(
    		"ALLOW_MULTI_SELECT" => "N",
    		"DELAY" => "N",
    		"MAX_LEVEL" => "2",
    		"MENU_CACHE_GET_VARS" => array(
    		),
    		"MENU_CACHE_TIME" => "3600",
    		"MENU_CACHE_TYPE" => "N",
    		"MENU_CACHE_USE_GROUPS" => "Y",
    		"ROOT_MENU_TYPE" => "dop_top",
    		"USE_EXT" => "Y",
    		"MENU_THEME" => "site",
    		"COMPONENT_TEMPLATE" => "top_dop_multi",
    		"CHILD_MENU_TYPE" => "dop_menu"
    	),
    	false,
    	array(
    		"ACTIVE_COMPONENT" => "Y"
    	)
    );?>
    </nav>
    <a class="headerBottomButton" href="#">Заказать звонок</a>
</header>
-->